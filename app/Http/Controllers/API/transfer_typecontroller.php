<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\models\transfer_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class transfer_typecontroller extends Controller
{
  
    use ApiresponseTrait;
    public function index()
    {
        $transfer_type=transfer_type::select('id','Name->'. app()->getlocale(). ' as transfer_type_Name')->get();
        return $this->apiresponse($transfer_type,'ok',200);
    }
    public function show(Request $request)
    {
        $transfer_type=transfer_type::select('id','Name->'. app()->getlocale(). ' as transfer_type_Name')->find($request ->id);
        return $this->apiresponse($transfer_type,'ok',200);
    }
  
    public function store(Request $request)
    {
       
       
         
            $transfer_type=new transfer_type();
            $transfer_type->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
            $transfer_type->user_add=$request->user_add;
            $transfer_type->save();
            $transfer_type=transfer_type::select('id','Name->'. app()->getlocale(). ' as transfer_type_Name')->get();
            return $this->apiresponse($transfer_type,'ok',200);
  
    }
  
}
