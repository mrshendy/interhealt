<?php


namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\models\User_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class User_typecontroller extends Controller
{
    use ApiresponseTrait;
    public function index()
    {
        $User_type=User_type::select('id','type_name->'. app()->getlocale(). ' as User_Type')->get();
        return $this->apiresponse($User_type,'ok',200);
    }
    public function show(Request $request)
    {
        $User_type=User_type::select('id','type_name->'. app()->getlocale(). ' as User_Type')->find($request ->id);
        return $this->apiresponse($User_type,'ok',200);
    }
  
    public function store(Request $request)
    {
       
       
         
            $User_type=new User_type();
            $User_type->type_name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
            $User_type->notes=$request->notes;
            $User_type->user_add=$request->user_add;
            $User_type->save();
            $User_type=User_type::select('id','type_name->'. app()->getlocale(). ' as User_Type')->get();
            return $this->apiresponse($User_type,'ok',200);
  
    }
}
