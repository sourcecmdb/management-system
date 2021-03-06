<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as baseModel;
use EloquentFilter\Filterable;

class Resident extends baseModel
{
    use Filterable;

	protected $fillable=['name','relationship','sex','nation','birthday','culture','face','marriage','identity','hobby','id_number','unit','present_address','phone','tag','other'];
    
    public function information()
    {
    	return $this->belongsTo('App\Models\Information');
    }

    public $culture_map=[
    	1=>'小学以下',
    	2=>'小学',
    	3=>'初中',
    	4=>'高中',
    	5=>'大专',
    	6=>'大学',
    	7=>'大学以上'
    ];

    public $face_map=[
    	1=>'中共党员',
    	2=>'群众',
    	3=>'共青团',
    	4=>'农工党',
    	5=>'其他'
    ];

    public $marriage_map=[
    	1=>'已婚',
    	2=>'未婚',
    	3=>'离异',
    	4=>'丧偶'
    ];

    public $identity_map=[
    	1=>'在职',
    	2=>'退休',
    	3=>'学生',
    	4=>'学龄前'
    ];


    public function setCultureAttribute($value)
    {
    	$number=array_search($value,$this->culture_map);
    	$this->attributes['culture']=$number;
    }

    public function getCultureAttribute($value)
    {
    	$str=$this->culture_map[$value];
    	return $str;
    }

    public function setFaceAttribute($value)
    {
    	$number=array_search($value,$this->face_map);
    	$this->attributes['face']=$number;
    }

    public function getFaceAttribute($value)
    {
    	$str=$this->face_map[$value];
    	return $str;
    }

    public function setMarriageAttribute($value)
    {
    	$number=array_search($value,$this->marriage_map);
    	$this->attributes['marriage']=$number;
    }

    public function getMarriageAttribute($value)
    {
    	$str=$this->marriage_map[$value];
    	return $str;
    }

    public function setIdentityAttribute($value)
    {
    	$number=array_search($value,$this->identity_map);
    	$this->attributes['identity']=$number;
    }

    public function getIdentityAttribute($value)
    {
    	$str=$this->identity_map[$value];
    	return $str;
    }

    public function getSexAttribute($value)
    {
    	if($value==0)
    	{
    		return '女';
    	}else{
    		return '男';
    	}
    }

    public function setSexAttribute($value)
    {
        if($value=='男'){

            $this->attributes['sex']=1;
        }else if($value=='女'){
            $this->attributes['sex']=0;
        }else{
            $this->attributes['sex']=$value;
        }
    }
  
}
