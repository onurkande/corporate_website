<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutRow;

class AboutRowController extends Controller
{
    function index()
    {
        $record = app('App\Http\Controllers\AboutRowController')->hasRecord(); // başka bir fonksiyonu bir fonksiyonun içinde çagırdık
        return view('/dynamic/about-row', ['record' => $record]);
    }

    function view()
    {
        $record = app('App\Http\Controllers\AboutRowController')->hasRecord(); // başka bir fonksiyonu bir fonksiyonun içinde çagırdık
        return $record;
    }

    function store()
    {
        $aboutrows = new AboutRow;

        $title = request()->input('title');
        $content = request()->input('content');
        $icon = request()->input('icon');
        $header = request()->input('header');
        $paragraph = request()->input('paragraph');

        $icon = json_encode($icon, JSON_UNESCAPED_UNICODE);
        $aboutrows->icon = $icon;

        $header = json_encode($header, JSON_UNESCAPED_UNICODE);
        $aboutrows->header = $header;

        $paragraph = json_encode($paragraph, JSON_UNESCAPED_UNICODE);
        $aboutrows->paragraph = $paragraph;

        $aboutrows->title = $title;
        $aboutrows->content = $content;
        $aboutrows->save();

        return redirect('dashboard/dynamic-edit/about-row')->with('store',"About Row eklendi");
    }

    function update($id)
    {
        // Var olan AboutRow kaydını bul
        $aboutrows = AboutRow::find($id);
    
        // Eğer kayıt bulunamazsa, hata mesajı ile geri dön
        if (!$aboutrows) {
            return redirect('dashboard/dynamic-edit/about-row')->with('delete', "About Row bulunamadı");
        }
    
        // Formdan gelen verileri al
        $title = request()->input('title');
        $content = request()->input('content');
        $icon = request()->input('icon');
        $header = request()->input('header');
        $paragraph = request()->input('paragraph');
    
        // Verileri JSON formatına dönüştür
        $icon = json_encode($icon, JSON_UNESCAPED_UNICODE);
        $header = json_encode($header, JSON_UNESCAPED_UNICODE);
        $paragraph = json_encode($paragraph, JSON_UNESCAPED_UNICODE);
    
        // Kayıt verilerini güncelle
        $aboutrows->title = $title;
        $aboutrows->content = $content;
        $aboutrows->icon = $icon;
        $aboutrows->header = $header;
        $aboutrows->paragraph = $paragraph;
    
        // Güncellenmiş kaydı veritabanına kaydet
        $aboutrows->save();
    
        // Başarı mesajı ile yönlendir
        return redirect('dashboard/dynamic-edit/about-row')->with('update', "About Row güncellendi");
    }
    

    function hasRecord()
    {
        $aboutrows = AboutRow::latest()->first();
        if ($aboutrows) {
            return $aboutrows;
        } else {
            return $aboutrows;
        }
    }

    function delete($id)
    {
        $aboutrows = AboutRow::first();
        $header = json_decode($aboutrows->header, TRUE);
        $paragraph = json_decode($aboutrows->paragraph, TRUE);
        $icon = json_decode($aboutrows->icon, TRUE);

        $index = array_search($id, $header);

        if($header[$index] && $paragraph[$index] && $icon[$index])
        {
            unset($header[$index]);
            unset($paragraph[$index]);
            unset($icon[$index]);
            
            $aboutrows->header = json_encode(array_values($header), JSON_UNESCAPED_UNICODE);
            $aboutrows->paragraph = json_encode(array_values($paragraph), JSON_UNESCAPED_UNICODE);
            $aboutrows->icon = json_encode(array_values($icon), JSON_UNESCAPED_UNICODE);

            $aboutrows->save();

            return redirect('dashboard/dynamic-edit/about-row')->with('delete', "rows silindi");
        } 
        else
        {
            return redirect('dashboard/dynamic-edit/about-row')->with('delete', "Değer dizide bulunamadı.");
        }

    }

    function allDelete($id)
    {
        $aboutrows = AboutRow::find($id);
        $aboutrows->delete();
        return redirect('dashboard/dynamic-edit/about-row')->with('delete', "About Row silindi");
    }
}