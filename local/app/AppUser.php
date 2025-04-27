<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Mail;
use Auth;
use Twilio;
use Config;

class AppUser extends Authenticatable
{
   protected $table = 'app_user';

   public function signup($data)
   {
      $setting = User::find(1);

      if($setting->verify_type == 3 || $setting->verify_type == 0)
      {
         AppUser::where('email',$data['email'])->where('status',0)->delete();

         $count = AppUser::where('email',$data['email'])->where('status',1)->count();

         $codeSent = 1;
      }
      else
      {
         AppUser::where('phone',$data['phone'])->where('status',0)->delete();

         $count = AppUser::where('phone',$data['phone'])->where('status',1)->count();

         $codeSent = 2;
      }

     if($count == 0)
     {
       if(isset($data['rcode']))
       {
         $chkCode = AppUser::where('rcode',$data['rcode'])->first();

         if(!isset($chkCode->id))
         {
            return ['msg' => 'error','error' => 'Opps! This referral code is not valid.'];
            exit;
         }
       }
       else
       {
         $chkCode = 0;
       }

        $add                = new AppUser;
        $add->name          = $data['name'];
        $add->email         = $data['email'];
        $add->phone         = $data['phone'];
        $add->password      = $data['password'];
        $add->country       = $data['country'];
        $add->status        = $setting->verify_type == 0 ? 1 : 0;

        if(isset($chkCode->id))
        {
            $user           = User::find(1);
            $add->wallet    = $user->point_use;
            $up             = AppUser::find($chkCode->id);
            $up->wallet     = $up->wallet + $user->point_who; 
            $up->save();
        }

        $add->save();

        if($setting->verify_type != 0)
        {
            $otp = $this->sendVerifyCode($add,$setting);
        }
        else
        {
            $otp = 0;
        }

        return ['msg' => 'done','user' => $add,'otp' => $otp,'codeSent' => $codeSent];
     }
     else
     {
        return ['msg' => 'error','error' => 'Opps! This email is already exists.'];
     }
   }

   public function sendVerifyCode($res,$setting)
   {
     $otp = rand(11111,99999);

     if($setting->verify_type == 1)
     {
        Twilio::message("+".$res->country.$res->phone,"Hi ".$res->name.", Your verify code of your mobile number is ".$otp);
     }
     elseif($setting->verify_type == 2)
     {
        app('App\Http\Controllers\Controller')->sendSms($res->country.$res->phone,"Your verify code of your mobile number is ".$otp);
     }
     elseif($setting->verify_type == 3)
     {
        Mail::send('email',['res' => $res,'otp' => $otp], function($message) use($res)
        {     
            $message->to($res->email)->subject("Verify Your Email");                        
        });  
     }

     return $otp;
   }

   public function login($data)
   {
     $setting = User::find(1);

     if($setting->verify_type == 3 || $setting->verify_type == 0)
     {
        $chk = AppUser::where('email',$data['email'])->where('password',$data['password'])->where('status',1)->first();
     }
     else
     {
        $chk = AppUser::where('phone',$data['phone'])->where('password',$data['password'])->where('status',1)->first();
     }

     if(isset($chk->id))
     {
        return ['msg' => 'done','user' => $chk];
     }
     else
     {
        return ['msg' => 'Opps! Invalid login details'];
     }
   }

   public function forgot($data)
    {
        $res = AppUser::where('email',$data['email'])->first();

        if(isset($res->id))
        {
            $otp = rand(1111,9999);

            $res->vcode = $otp;
            $res->save();

            Mail::send('email',['res' => $res], function($message) use($res)
            {     
               $message->to($res->email)->subject("Verify Your Email");
                        
            });

            $return = ['msg' => 'done','user_id' => $res->id];
        }
        else
        {
            $return = ['msg' => 'error','error' => 'Sorry! This email is not registered with us.'];
        }

        return $return;
    }

    public function verify($data)
    {
        $res = AppUser::where('id',$data['user_id'])->where('vcode',$data['otp'])->first();

        if(isset($res->id))
        {
            $res->status = 1;
            $res->save();

            $return = ['msg' => 'done','user_id' => $res->id];
        }
        else
        {
            $return = ['msg' => 'error','error' => 'Sorry! OTP not match.'];
        }

        return $return;
    }

    public function updatePassword($data)
    {
        $res = AppUser::where('id',$data['user_id'])->first();

        if(isset($res->id))
        {
            $res->password = $data['password'];
            $res->save();

            $return = ['msg' => 'done','user_id' => $res->id];
        }
        else
        {
            $return = ['msg' => 'error','error' => 'Sorry! Something went wrong.'];
        }

        return $return;
    }

    public function countOrder($id)
    {
        return Order::where('user_id',$id)->where('status','>',0)->count();
    }

    public function getAll()
    {
        return AppUser::orderBy('id','DESC')->get();
    }

    public function updateInfo($data)
    {
      $count = AppUser::where('id','!=',$_GET['id'])->where('email',$data['email'])->count();

      if($count == 0)
      {
            $add                = AppUser::find($_GET['id']);
            $add->name          = $data['name'];
            $add->email         = $data['email'];
            $add->phone         = $data['phone'];
            $add->whatsapp_no   = isset($data['whatsapp_no']) ? $data['whatsapp_no'] : null;
            
            if(isset($data['password']))
            {
                $add->password  = $data['password'];
            }

            $add->save();

             return ['msg' => 'done','user_id' => $add->id];
        }
        else
        {
            return ['msg' => 'error','error' => 'Opps! This email is already exists.'];
        }
    }

    public function totalOrder($id)
    {
        return Order::where('user_id',$id)->where('status',$id)->count();
    }

    public function getLastOrder($id)
   {
     $res = Order::where('store_id',Auth::guard('store')->user()->id)->where('user_id',$id)->orderBy('id','DESC')->first();

     return isset($res->id) ? date('d-M-Y h:i:A',strtotime($res->created_at)) : null;
   }

   public function getTotalOrder($id)
   {
     return Order::where('store_id',Auth::guard('store')->user()->id)->where('user_id',$id)->count();
   }
}
