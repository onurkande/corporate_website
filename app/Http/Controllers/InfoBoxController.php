<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\InfoBox;
use Illuminate\Http\Request;

class InfoBoxController extends Controller
{
    function index()
    {
        $record = InfoBox::first();
        return view('dynamic.info-box',compact('record'));
    }

    function update(Request $request)
    {
        $infoBox = InfoBox::first();
        if (!$infoBox) {
            $infoBox = new InfoBox();
        }

        if ($request->hasFile('image')) {
            $imageNames = [];
            
            // Get existing images if any
            if ($infoBox->images) {
                $imageNames = json_decode($infoBox->images);
            }
            
            // Add new images
            foreach($request->file('image') as $imageFile) {
                $imageName = time() . '_' . $imageFile->getClientOriginalName();
                $imageFile->move(public_path('admin/infoBoxImage'), $imageName);
                $imageNames[] = $imageName;
            }
            
            $infoBox->images = json_encode($imageNames);
        }


        $infoBox->title = $request->title;
        $infoBox->save();

        return redirect()->back()->with('success', 'Info Box başarıyla güncellendi!');
    }

    public function deleteFile($index)
    {
        $infoBox = InfoBox::first();
        if ($infoBox) {
            $images = json_decode($infoBox->images);
            $oldPath = public_path('admin/infoBoxImage/' . $images[$index]);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            unset($images[$index]);
            $infoBox->images = json_encode($images);
            $infoBox->save();
        }
        return redirect()->back()->with('delete', 'Resim başarıyla silindi!');
    }

    function allDelete()
    {
        $infoBox = InfoBox::first();
        if($infoBox->images)
        {
            $images = json_decode($infoBox->images);
            foreach($images as $image)
            {
                $path = (public_path('admin/infoBoxImage/'.$image));
                if(file_exists($path))
                {
                    unlink($path);
                }
            }
        }
        $infoBox->delete();
        return redirect('dashboard/dynamic-edit/info-box')->with('delete',"Info Box silindi");
    }

    public function view()
    {
        $infoBox = InfoBox::first();
        return $infoBox;
    }
}
