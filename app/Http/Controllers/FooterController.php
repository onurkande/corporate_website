<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $record = Footer::first();
        return view('dynamic.footer', compact('record'));
    }

    public function update(Request $request)
    {
        $footer = Footer::first();
        if (!$footer) {
            $footer = new Footer();
        }

        if ($request->hasFile('logo')) {
            if ($footer->logo) {
                $oldPath = public_path('admin/footerImage/' . $footer->logo);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $logoFile = $request->file('logo');
            $logoName = time() . '_' . $logoFile->getClientOriginalName();
            $logoFile->move(public_path('admin/footerImage'), $logoName);
            
            $footer->logo = $logoName;
        }

        $footer->description = $request->description;
        
        // Contact Items ve Icons için
        $contactItems = array_filter($request->contact_items ?? []);
        $icons = array_filter($request->icons ?? []);
        
        if (count($contactItems) === count($icons)) {
            $footer->contact_items = $contactItems;
            $footer->icons = $icons;
        }

        // Tags için
        $footer->tags = array_filter($request->tags ?? []);

        // Instagram fotoğrafları için
        if ($request->hasFile('instagram_photos')) 
        {
            $instagramPhotos = [];
            
            // Eski fotoğrafları sil
            if ($footer->instagram_photos) 
            {
                foreach ($footer->instagram_photos as $photo) 
                {
                    $oldPath = public_path('admin/footerImage/' . $photo);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }
            
            // Yeni fotoğrafları yükle
            foreach ($request->file('instagram_photos') as $photo) {
                $extension = $photo->getClientOriginalName();
                $fileName = time() . '_' . $extension;
                $photo->move(public_path('admin/footerImage'), $fileName);
                $instagramPhotos[] = $fileName;
            }
            
            $footer->instagram_photos = $instagramPhotos;
        }

        $footer->copyright_text = $request->copyright_text;
        $footer->save();

        return redirect()->back()->with('success', 'Footer başarıyla güncellendi!');
    }

    public function deleteContactItem($index)
    {
        $footer = Footer::first();
        if ($footer) {
            $contactItems = $footer->contact_items;
            $icons = $footer->icons;

            if (isset($contactItems[$index]) && isset($icons[$index])) {
                unset($contactItems[$index]);
                unset($icons[$index]);

                $footer->contact_items = array_values($contactItems);
                $footer->icons = array_values($icons);
                $footer->save();
            }
        }
        return redirect()->back()->with('delete', 'İletişim öğesi başarıyla silindi!');
    }

    public function deleteTag($index)
    {
        $footer = Footer::first();
        if ($footer) {
            $tags = $footer->tags;
            if (isset($tags[$index])) {
                unset($tags[$index]);
                $footer->tags = array_values($tags);
                $footer->save();
            }
        }
        return redirect()->back()->with('delete', 'Etiket başarıyla silindi!');
    }

    public function deletePhoto($index)
    {
        $footer = Footer::first();
        if ($footer) {
            $photos = $footer->instagram_photos;
            if (isset($photos[$index])) {
                // Fotoğrafı dosya sisteminden sil
                $oldPath = public_path('admin/footerImage/' . $photos[$index]);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }

                // Fotoğrafı diziden sil
                unset($photos[$index]);
                $footer->instagram_photos = array_values($photos);
                $footer->save();
            }
        }
        return redirect()->back()->with('delete', 'Fotoğraf başarıyla silindi!');
    }

    public function view()
    {
        $footer = Footer::first();
        return $footer;
    }
}
