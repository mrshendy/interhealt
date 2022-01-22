<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\models\Government;
use Illuminate\Http\Request;


class Governmentcontroller extends Controller
{
  
    use ApiresponseTrait;
    public function index()
    {
        $Government=Government::select('id','Name->'. app()->getlocale(). ' as Government_Name')->get();
        return $this->apiresponse($Government,'ok',200);
    }
    public function show(Request $request)
    {
       $Government=Government::where('Id_country',$request->Id_country)->select('id','Id_country','Name->'. app()->getlocale(). ' as Government_Name')->get();
        return $this->apiresponse($Government,'ok',200);
    }
  
    public function store(Request $request)
    {
       
       
         
            $Government=new Government();
            $Government->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
            $Government->notes=$request->notes;
            $Government->user_add=$request->user_add;
            $Government->save();
            $Government=Government::select('id','Name->'. app()->getlocale(). ' as Government_Name')->get();
            return $this->apiresponse($Government,'ok',200);
  
    }
  
}
