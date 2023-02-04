<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    function index()
    {
        $record=app('App\Http\Controllers\TeamController')->hasRecord();   // başka bir fonksiyonu bir fonksiyonun içinde çagırdık
        return view('/dynamic/team',['record'=>$record]);
    }

    function view()
    {
        $record=app('App\Http\Controllers\TeamController')->hasRecord();   // başka bir fonksiyonu bir fonksiyonun içinde çagırdık
        return $record;
    }

    function store()
    {
        $title=request()->input('title');
        $content=request()->input('content');
        $image=request()->file('image');
        $name=request()->input('name');
        $task=request()->input('task');

        $image_path = $image->storeAs('public/images/team', request()->file('image')->getClientOriginalName());

        if($image != null or $name != null or $task != null)
        {
            $employee=[
                "$name"=>[
                    'image' => 'team/'.request()->file('image')->getClientOriginalName(),
                    "name" => $name,
                    "task" => $task
                ]
            ];

            $employee=json_encode($employee,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $employee = null;
        }
        


        $team = new Team;

        $team->title = $title;
        $team->content = $content;
        $team->employee = $employee;
 
        $team->save();
    }

    function update()
    {
        $title=request()->input('title');
        $content=request()->input('content');
        $image=request()->file('image');
        $name=request()->input('name');
        $task=request()->input('task');
        $oldImage = request()->input('oldImage');

        $allEmployee = [$name, $image, $task];
        if($image != null or $name != null or $task != null)
        {
            $employeeCount = count($name);
            $index = 0;
            $employee = [];
            while($index < $employeeCount){
                $employee[$name[$index]] = [
                    "name" => $name[$index],
                    "image" => isset($image[$index]) ? 'team/'.request()->file('image')[$index]->getClientOriginalName() : $oldImage[$index],
                    "task" => $task[$index]
                ];
                if(isset($image[$index])) $image[$index]->storeAs('public/images/team', request()->file('image')[$index]->getClientOriginalName());
                $index++;
            }
            $employee=json_encode($employee,JSON_UNESCAPED_UNICODE);
        
        }
        else
        {
            $employee = null;
        }
        


        $team = new Team;
        $team = $team::find(1);

        $team->title = $title;
        $team->content = $content;
        $team->employee = $employee;
 
        $team->save();
    }

    function hasRecord()
    {
        $team = new Team;
        $team = $team::find(1);
        if($team)
        {
            return $team;   
        }
        else
        {
            return $team;
        }
    }

    function delete()
    {
        $team = new Team;
        $team = Team::find(1);
        $employee=json_decode($team->employee, TRUE);
        if(array_key_exists(request()->all()["name"],$employee))
        {
            unset($employee[request()->all()["name"]]);
            // dd($employee);

            $employee=json_encode($employee,JSON_UNESCAPED_UNICODE);
            $team->employee = $employee;
     
            $team->save();

        }
        else
        {
            echo "Key does not exist!";
        }
        
    }
}
