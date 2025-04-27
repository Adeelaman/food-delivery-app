<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class Welcome extends Authenticatable
{
    protected $table = "welcome";

     /*
    |--------------------------------------
    |Add/Update Data
    |--------------------------------------
    */
    public function addNew($data,$type)
    {
        $add                = $type === 'add' ? new Welcome : Welcome::find($type);
        $add->title         = isset($data['title']) ? $data['title'] : null;
        $add->text          = isset($data['text']) ? $data['text'] : null;
        $add->sort_no       = isset($data['sort_no']) ? $data['sort_no'] : 0;
        $add->status        = isset($data['status']) ? $data['status'] : 0;

        if(isset($data['img']))
        {
            $filename   = time().rand(111,699).'.' .$data['img']->getClientOriginalExtension(); 
            $data['img']->move("upload/welcome/", $filename);   
            $add->img = $filename;   
        }

        $add->save();
    }

    /*
    |--------------------------------------
    |Get all data from db
    |--------------------------------------
    */
    public function getAll($type = "all")
    {
        return Welcome::where(function($query) use($type){

        if($type !== "all")
        {
            $query->where('status',0);
        }

        })->orderBy('sort_no','ASC')->get();
    }

    public function getAppData($type)
    {
        $data = [];

        foreach($this->getAll($type) as $row)
        {
            $data[] = [

            'img'       => Asset('upload/welcome/'.$row->img),
            'title'     => $row->title,
            'text'      => $row->text

            ];
        }

        return $data;
    }
}
