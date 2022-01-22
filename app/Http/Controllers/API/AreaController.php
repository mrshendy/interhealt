<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\models\Area;
use Illuminate\Http\Request;


class Areacontroller extends Controller
{
  
    use ApiresponseTrait;
    public function index()
    {
        $Area=Area::select('id','Name->'. app()->getlocale(). ' as Area_Name')->get();
        return $this->apiresponse($Area,'ok',200);
    }
    public function show(Request $request)
    {
        $Area=Area::where('id_city',$request->id_city)->select('id','id_city','Name->'. app()->getlocale(). ' as Area_Name')->get();
        return $this->apiresponse($Area,'ok',200);
    }
  
    public function store(Request $request)
    {
       
       
         
            $Area=new Area();
            $Area->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
            $Area->notes=$request->notes;
            $Area->user_add=$request->user_add;
            $Area->save();
            $Area=Area::select('id','Name->'. app()->getlocale(). ' as Area_Name')->get();
            return $this->apiresponse($Area,'ok',200);
  
    }
  
}
