<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\models\Countries;
use Illuminate\Http\Request;


class Countriescontroller extends Controller
{
  
    use ApiresponseTrait;
    public function index()
    {
        $Countries=Countries::select('id','Name->'. app()->getlocale(). ' as Countries_Name')->get();
        return $this->apiresponse($Countries,'ok',200);
    }
    public function show(Request $request)
    {
        $Countries=Countries::select('id','Name->'. app()->getlocale(). ' as Countries_Name')->find($request ->id);
        return $this->apiresponse($Countries,'ok',200);
    }
  
    public function store(Request $request)
    {
       
       
         
            $Countries=new Countries();
            $Countries->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
            $Countries->notes=$request->notes;
            $Countries->user_add=$request->user_add;
            $Countries->save();
            $Countries=Countries::select('id','Name->'. app()->getlocale(). ' as Countries_Name')->get();
            return $this->apiresponse($Countries,'ok',200);
  
    }
  
}
