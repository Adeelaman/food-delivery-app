<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Auth;
use Excel;
class Item extends Authenticatable
{
    protected $table = "item";
    
    /*
    |--------------------------------
    |Create/Update user
    |--------------------------------
    */

    public function addNew($data,$type)
    {
        if(isset($_GET['store_id']) && isset($data['new_cate_name']))
        {
            $cate               = new Category;
            $cate->store_id     = $_GET['store_id'];
            $cate->name         = $data['new_cate_name'];
            $cate->save();
            $cate_id            = $cate->id;
        }
        else
        {
            $cate_id            = $data['category_id'];
        }

        $a                      = isset($data['lid']) ? array_combine($data['lid'], $data['l_name']) : [];
        $b                      = isset($data['lid']) ? array_combine($data['lid'], $data['l_desc']) : [];
        $add                    = $type === 'add' ? new Item : Item::find($type);
        $add->store_id          = isset($_GET['store_id']) ? $_GET['store_id'] : Auth::guard('store')->user()->id;
        $add->category_id       = $cate_id;
        $add->name              = isset($data['name']) ? $data['name'] : null;
        $add->description       = isset($data['description']) ? $data['description'] : null;
        $add->small_price       = isset($data['small_price']) ? $data['small_price'] : null;
        $add->medium_price      = isset($data['medium_price']) ? $data['medium_price'] : null;
        $add->large_price       = isset($data['large_price']) ? $data['large_price'] : null;
        $add->status            = isset($data['status']) ? $data['status'] : 0;
        $add->sort_no           = isset($data['sort_no']) ? $data['sort_no'] : 0;
        $add->unit1             = isset($data['unit1']) ? $data['unit1'] : null;
        $add->unit2             = isset($data['unit2']) ? $data['unit2'] : null;
        $add->unit3             = isset($data['unit3']) ? $data['unit3'] : null;
        $add->mrp               = isset($data['mrp']) ? $data['mrp'] : 0;
        $add->inv               = isset($data['inv']) ? $data['inv'] : 0;
        $add->food_type         = isset($data['food_type']) ? $data['food_type'] : 0;
        $add->s_data            = serialize([$a,$b]);


        if(isset($data['img']))
        {
            $filename   = time().rand(111,699).'.' .$data['img']->getClientOriginalExtension(); 
            $data['img']->move("upload/item/", $filename);   
            $add->img = $filename;   
        }

        $add->save();

        if($type !== "add")
        {
            Cart::where('item_id',$add->id)->delete();
        }

        return $add;
    }

    /*
    |--------------------------------------
    |Get all data from db
    |--------------------------------------
    */
    public function getAll()
    {
        return Item::where(function($query){

                    if(isset($_GET['q']) && $_GET['q'] != "")
                    {
                      $query->whereRaw("LOWER(item.name) LIKE ? ",[trim(strtolower('%'.$_GET['q'])).'%']);
                    }

                   })->join('category','item.category_id','=','category.id')
                   ->select('item.*','category.name as cate')
                   ->where('item.store_id',Auth::guard('store')->user()->id)
                   ->orderBy('item.id','DESC')
                   ->get();
    }

    public function getSData($data,$id,$field)
    {
        $data = unserialize($data);

        return isset($data[$field][$id]) ? $data[$field][$id] : null;
    }

    public function getLang($id)
    {
        $lang = new Language;
        $lid  = $lang->getLang();
        $data = Item::find($id);

        if($lid == 0)
        {
            return ['name' => $data->name,'desc' => $data->description];
        }
        else
        {
            $data = unserialize($data->s_data);

            return ['name' => $data[0][$lid],'desc' => $data[1][$lid]];
        }
    }

    public function editItem($data)
    {
        $res  = Item::find($data['id']);
        $data = $data['data'];

        if(isset($data['s_price']))
        {
            $res->small_price = $data['s_price'];
        }

        if(isset($data['m_price']))
        {
            $res->medium_price = $data['m_price'];
        }

        if(isset($data['l_price']))
        {
            $res->large_price = $data['l_price'];
        }

        $res->save();

        return true;
    }

    public function getStock($id)
    {
        $add = Inv::where('item_id',$id)->where('type',0)->sum('qty');
        $min = Inv::where('item_id',$id)->where('type',1)->sum('qty');

        return $add - $min;
    }

    public function addImage($data)
    {
        $add = Item::find($_GET['item_id']);

        if(isset($data['file']))
        {
            $filename   = time().rand(111,699).'.' .$data['file']->getClientOriginalExtension(); 
            $data['file']->move("upload/item/", $filename);   
            $add->img = $filename;   
        }

        $add->save();
    }

    public function getRandomItem()
    {
        $res    =  Item::take(8)->inRandomOrder()->get();

        $data   = [];

        foreach($res as $row)
        {
            $data[] = [

            'id'        => $row->id,
            'name'      => $this->getLang($row->id,$_GET['lid'])['name'],
            'store_id'  => $row->store_id,
            'img'       => Asset('upload/item/'.$row->img)   

            ];
        }

        return $data; 
    }
}
