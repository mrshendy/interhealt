<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\models\conversion_purpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class conversion_purposecontroller extends Controller
{
  
    use ApiresponseTrait;
    public function index()
    {
        $conversion_purpose=conversion_purpose::select('id','Name->'. app()->getlocale(). ' as conversion_purpose_Name')->get();
        return $this->apiresponse($conversion_purpose,'ok',200);
    }
    public function show(Request $request)
    {
        $conversion_purpose=conversion_purpose::select('id','Name->'. app()->getlocale(). ' as conversion_purpose_Name')->find($request ->id);
        return $this->apiresponse($conversion_purpose,'ok',200);
    }
  
    public function store(Request $request)
    {
       
       
         
            $conversion_purpose=new conversion_purpose();
            $conversion_purpose->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
            $conversion_purpose->user_add=$request->user_add;
            $conversion_purpose->save();
            $conversion_purpose=conversion_purpose::select('id','Name->'. app()->getlocale(). ' as conversion_purpose_Name')->get();
            return $this->apiresponse($conversion_purpose,'ok',200);
  
    }
  
}
