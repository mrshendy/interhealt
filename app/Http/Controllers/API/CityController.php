<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\models\City;
use Illuminate\Http\Request;


class Citycontroller extends Controller
{
  
    use ApiresponseTrait;
    public function index()
    {
        $City=City::select('id','Name->'. app()->getlocale(). ' as City_Name')->get();
        return $this->apiresponse($City,'ok',200);
    }
    public function show(Request $request)
    {
        $City=City::where('Id_government',$request->Id_government)->select('id','Id_government','Name->'. app()->getlocale(). ' as City_Name')->get();
        return $this->apiresponse($City,'ok',200);
    }
  
    public function store(Request $request)
    {
       
       
         
            $City=new City();
            $City->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
            $City->notes=$request->notes;
            $City->user_add=$request->user_add;
            $City->save();
            $City=City::select('id','Name->'. app()->getlocale(). ' as City_Name')->get();
            return $this->apiresponse($City,'ok',200);
  
    }
  
}
