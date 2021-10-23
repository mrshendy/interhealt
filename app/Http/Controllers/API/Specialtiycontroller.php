<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\models\Specialtiy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class Specialtiycontroller extends Controller
{
  
    use ApiresponseTrait;
    public function index()
    {
        $Specialtiy=Specialtiy::select('id','Name->'. app()->getlocale(). ' as Specialtiy_Name')->get();
        return $this->apiresponse($Specialtiy,'ok',200);
    }
    public function show(Request $request)
    {
        $Specialtiy=Specialtiy::select('id','Name->'. app()->getlocale(). ' as Specialtiy_Name')->find($request ->id);
        return $this->apiresponse($Specialtiy,'ok',200);
    }
  
    public function store(Request $request)
    {
       
       
         
            $Specialtiy=new Specialtiy();
            $Specialtiy->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
            $Specialtiy->Servicetype_id=$request->Servicetype_id;
            $Specialtiy->notes=$request->notes;
            $Specialtiy->user_add=$request->user_add;
            $Specialtiy->save();
            $Specialtiy=Specialtiy::select('id','Name->'. app()->getlocale(). ' as Specialtiy_Name')->get();
            return $this->apiresponse($Specialtiy,'ok',200);
  
    }
  
}
