<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    function index()
    {
        $record = Team::first();
        return view('dynamic.team',compact('record'));
    }

    function update(Request $request)
    {
        $record = Team::first();
        if (!$record) {
            $record = new Team();
        }

        if ($request->hasFile('images')) {
            $imageNames = [];
            
            // Get existing images if any
            if ($record->images) {
                $imageNames = json_decode($record->images);
            }
            
            // Add new images
            foreach($request->file('images') as $imageFile) {
                $imageName = time() . '_' . $imageFile->getClientOriginalName();
                $imageFile->move(public_path('admin/teamImage'), $imageName);
                $imageNames[] = $imageName;
            }
            
            $record->images = json_encode($imageNames);
        }

        if($request->names){
            $record->names = json_encode($request->names);
        }
        if($request->tasks){
            $record->tasks = json_encode($request->tasks);
        }
        $record->title = $request->title;
        $record->content = $request->content;
        $record->save();

        return redirect()->back()->with('store', 'Team başarıyla güncellendi!');
    }
    
    function delete($index)
    {
        $record = Team::first();
        if ($record) {
            $images = json_decode($record->images, true);
            $names = json_decode($record->names, true);
            $tasks = json_decode($record->tasks, true);

            if (isset($images[$index]) && isset($names[$index]) && isset($tasks[$index])) {

                $oldPath = public_path('admin/teamImage/' . $images[$index]);
                if(file_exists($oldPath))
                {
                    unlink($oldPath);
                }

                unset($images[$index]);
                unset($names[$index]);
                unset($tasks[$index]);

                $record->images = json_encode(array_values($images));
                $record->names = json_encode(array_values($names));
                $record->tasks = json_encode(array_values($tasks));
                $record->save();
            }
        }
        return redirect()->back()->with('delete', 'Team başarıyla silindi!');
    }

    function allDelete()
    {
        $record = Team::first();
        if($record->images)
        {
            $images = json_decode($record->images);
            foreach($images as $image)
            {
                $path = (public_path('admin/teamImage/'.$image));
                if(file_exists($path))
                {
                    unlink($path);
                }
            }
        }
        $record->delete();
        return redirect('dashboard/dynamic-edit/team')->with('delete',"Team silindi");
    }

    public function view()
    {
        $record = Team::first();
        return $record;
    }
}
