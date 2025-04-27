<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Auth;
class UserLocation extends Authenticatable
{
    protected $table = "user_location";
  
   public function addNew()
   {
     if(isset($_GET['temp_user_id']))
     {
         UserLocation::where('user_id',$_GET['temp_user_id'])->delete();

         $add            = new UserLocation;
         $add->user_id   = $_GET['temp_user_id'];
         $add->lat       = $_GET['lat'];
         $add->lng       = $_GET['lng'];
         $add->save();
     }
   }

   public function getAll()
   {
        $data = [];

        foreach(UserLocation::get() as $row)
        {
            $data[] = [$row->lat,$row->lng];
        }

        return $data;
   }
}
