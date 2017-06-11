<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','body','user_id','category_id','photo_id'];
    protected $conten;

    /**
     * @return mixed
     */
    public function getConten()
    {
        $attr = $this->getAttributes();
        if(is_array($attr)){
            foreach ($attr as $key => $atr){
                if($key == "created_at" && $this->created_at){
                    $this->conten[$key] = $this->created_at->diffForHumans();
                }
                elseif($key == "updated_at" && $this->updated_at)
                {
                    $this->conten[$key] = $this->updated_at->diffForHumans();
                }elseif($key == "photo_id" && is_object($this->photo)){
                    $this->conten[$key] = $atr;
                }
                elseif($key == "user_id" && is_object($this->user))
                {
                    $this->conten[$key] = $this->user->name;
                }
                elseif($key == "category_id" /*&& is_object($this->category)*/){
                    $this->conten[$key] = $atr;
                }else
                {
                    $this->conten[$key] = $atr;
                }
            }
        }
       // $this->conten = $this->getAttributes();
        return $this->conten;
    }


    public function getTitleAttribute($value){
     //  $this->attributes['title'] = "sasa";
        return $value;
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    /*public function getAttributes(){
       // dd($this->attributes);
       // dd($this->created_at);
       // $this->attributes['created_at'] = "sasasa";//= $this->created_at->diffForHumans();
        //
       // return $this->attributes;
    }*/
    /*
    public function getCreatedAtAttribute($value){
        return $value;
      // $dC = new Carbon($value);
        //$this->se
       // dd($this->id);
        //$this->setAttribute('created_at',time());
        //return $dC->diffForHumans();
    }*/
}
