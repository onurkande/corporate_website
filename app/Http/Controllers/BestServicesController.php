<?php

namespace App\Http\Controllers;

use App\Models\BestServices;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BestServicesController extends Controller
{
    function index()
    {
        $record = BestServicesController::hasRecord();
        // $record=app('App\Http\Controllers\BestServicesController')->hasRecord();
        return view('dynamic.best-services', ['record' => $record]);
    }

    public static function view()
    {
        $record = BestServicesController::hasRecord(); // başka bir fonksiyonu bir fonksiyonun içinde çagırdık
        return $record;
    }

    function store()
    {
        $title = request()->input('title');
        $content = request()->input('content');
        $header = request()->input('header');
        $image = request()->file('image');
        $button = request()->input('button');

        $image_path = $image->storeAs('public/images/team', request()->file('image')->getClientOriginalName());

        if ($header != null or $image != null) {
            $rows = [
                "$header" => [
                    "header" => $header,
                    'image' => 'bestServices/' . request()->file('image')->getClientOriginalName()
                ]
            ];

            $rows = json_encode($rows, JSON_UNESCAPED_UNICODE);

            // dd($rows);

        } else {
            $rows = null;
        }

        $bestservices = new BestServices;
        $bestservices->title = $title;
        $bestservices->content = $content;
        $bestservices->rows = $rows;
        $bestservices->button = $button;

        $bestservices->save();

        return redirect('dashboard/dynamic-edit/best-services');


    }

    function update()
    {
        $title = request()->input('title');
        $content = request()->input('content');
        $header = request()->input('header');
        $image = request()->file('image');
        $button = request()->input('button');
        $oldImage = request()->input('oldImage');
        $radioImage = request()->input('radiobutton');
        //dd($image);

        $updatedImage = '';

        $allrows = [$header, $image];
        if ($header != null or $image != null) {
            $rowsCount = count($header);
            $index = 0;
            $rows = [];
            while ($index < $rowsCount) {
                // $updateImage = isset($image[$index]) ? 'bestServices/' . request()->file('image')[$index]->getClientOriginalName() : $oldImage[$index];
                // $updateImage = isset($radioImage) ? ltrim($radioImage,'/storage/images/') : $updateImage;
                //dd($updateImage);

                //dd($image[$index]);
                if ($image != null) {
                    if ($image[$index] != null) {
                        $updatedImage = 'bestServices/' . $image[$index]->getClientOriginalName();
                        $image[$index]->storeAs('public/images/bestServices', $image[$index]->getClientOriginalName());
                    }
                } elseif ($radioImage != null) {
                    if ($radioImage[$index] != null) {
                        $updatedImage = ltrim($radioImage[$index], '/storage/images/');
                    }
                } else {
                    $updatedImage = $oldImage[$index];
                }

                $rows[$header[$index]] = [
                    "header" => $header[$index],
                    "image" => $updatedImage
                ];
                $index++;
            }
            $rows = json_encode($rows, JSON_UNESCAPED_UNICODE);
        } else {
            $employee = null;
        }


        $bestservices = BestServices::latest()->first();

        $bestservices->title = $title;
        $bestservices->content = $content;
        $bestservices->rows = $rows;
        $bestservices->button = $button;

        $bestservices->save();

        return redirect('dashboard/dynamic-edit/best-services');
    }

    public static function hasRecord()
    {

        $bestservices = BestServices::latest()->first();
        if ($bestservices) {
            return $bestservices;
        } else {
            return $bestservices;
        }
    }

    public function delete()
    {

        $bestservices = BestServices::latest()->first();
        $rows = json_decode($bestservices->rows, TRUE);
        if (array_key_exists(request()->all()["header"], $rows)) {
            unset($rows[request()->all()["header"]]);
            // dd($rows);

            $rows = json_encode($rows, JSON_UNESCAPED_UNICODE);
            $bestservices->rows = $rows;

            $bestservices->save();

        } else {
            echo "Key does not exist!";
        }
    }
}