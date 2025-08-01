<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Auth;
class Cate extends Authenticatable
{
    protected $table = "cate";
  
    /*
    |--------------------------------
    |Create/Update user
    |--------------------------------
    */

    public function addNew($data,$type)
    {
        $a                  = isset($data['lid']) ? array_combine($data['lid'], $data['l_name']) : [];
        $add                = $type === 'add' ? new Cate : Cate::find($type);
        $add->name          = isset($data['name']) ? $data['name'] : null;
        $add->status        = isset($data['status']) ? $data['status'] : null;
        $add->sort_no       = isset($data['sort_no']) ? $data['sort_no'] : 0;
        $add->color         = isset($data['color']) ? $data['color'] : '#000000';
        $add->s_data        = serialize($a);

        if(isset($data['img']))
        {
            $filename   = time().rand(111,699).'.' .$data['img']->getClientOriginalExtension(); 
            $data['img']->move("upload/cate/", $filename);   
            $add->img = $filename;   
        }

        $add->save();
    }

    /*
    |--------------------------------------
    |Get all data from db
    |--------------------------------------
    */
    public function getAll($status = "all",$ids = [])
    {
        return Cate::where(function($query) use($status,$ids){

            if($status !== "all")
            {
                $query->where('status',$status);
            }

            if(is_array($ids) && count($ids) > 0)
            {
                $query->whereIn('id',$ids);
            }

        })->orderBy('sort_no','ASC')->get();
    }

    public function getSData($data,$id,$field)
    {
        $data = unserialize($data);

        return isset($data[$id]) ? $data[$id] : null;
    }

    public function getAppData($ids = [])
    {
        $data = [];

        foreach($this->getAll(0,$ids) as $row)
        {
            $data[] = [

            'id'    => $row->id,
            'name'  => $this->getLang($row->id)['name'],
            'img'   => Asset("upload/cate/".$row->img),
            'color' => $row->color

            ];
        }

        return $data;
    }

    public function getLang($id)
    {
        $lang = new Language;
        $lid  = $lang->getLang();
        $data = Cate::find($id);

        if($lid == 0)
        {
            return ['name' => $data->name];
        }
        else
        {
            $data = unserialize($data->s_data);

            return ['name' => isset($data[$lid]) ? $data[$lid] : null];
        }
    }
}
