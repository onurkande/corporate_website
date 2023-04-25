<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Footer extends Component
{
    public $infoRecord;
    public $tagRecord;
    public $imageRecord;
    public $title4Record;
    public function render()
    {
        $this->infoRecord=app('App\Http\Controllers\FooterController')->infohasRecord();
        $this->tagRecord=app('App\Http\Controllers\FooterController')->taghasRecord();
        $this->imageRecord=app('App\Http\Controllers\FooterController')->imagehasRecord();
        $this->title4Record=app('App\Http\Controllers\FooterController')->title4hasRecord();
        return view('livewire.footer',['infoRecord'=>$this->infoRecord ,'tagRecord'=>$this->tagRecord , 'imageRecord'=>$this->imageRecord , 'title4Record'=>$this->title4Record]);
    }
}
