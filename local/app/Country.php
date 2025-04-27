<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Auth;
class Country extends Authenticatable
{
    protected $table = "country";
  
    /*
    |--------------------------------
    |Create/Update user
    |--------------------------------
    */

    public function addNew($data,$type)
    {
        $a                  = isset($data['lid']) ? array_combine($data['lid'], $data['l_name']) : [];
        $add                = $type === 'add' ? new Country : Country::find($type);
        $add->name          = isset($data['name']) ? $data['name'] : null;
        $add->status        = isset($data['status']) ? $data['status'] : 0;
        $add->code          = isset($data['code']) ? $data['code'] : 0;
        $add->s_data        = serialize($a);
        $add->save();
    }

    /*
    |--------------------------------------
    |Get all data from db
    |--------------------------------------
    */
    public function getAll($status = "all")
    {
        return Country::where(function($query) use($status){

        if($status !== "all")
        {
            $query->where('status',$status);
        }

        })->orderBy('name','ASC')->get();
    }

    public function getSData($data,$id,$field)
    {
        $data = unserialize($data);

        return isset($data[$id]) ? $data[$id] : null;
    }

    public function getAppData()
    {
        $data = [];

        foreach($this->getAll(0) as $row)
        {
            $data[] = [

            'id'    => $row->id,
            'name'  => $this->getLang($row->id)['name'],
            'code'  => $row->code

            ];
        }

        return $data;
    }

    public function getLang($id)
    {
        $lang = new Language;
        $lid  = $lang->getLang();
        $data = Country::find($id);

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
