<?php


namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\models\Join_request;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;


class Join_requestcontroller extends Controller
{
    use ApiresponseTrait;
    public function index()
    {
        $Join_request=Join_request::select('id','Name')->get();
        return $this->apiresponse($Join_request,'ok',200);
    }
    public function show(Request $request)
    {
        $Join_request=Join_request::select('id','Name->'. app()->getlocale(). ' as Join_request_Name')->find($request ->id);
        return $this->apiresponse($Join_request,'ok',200);
    }
  
    public function store(Request $request)
    {
       
       
        if(Join_request::where('email',$request->email)->orwhere('phone',$request->phone)->exists())
        {
            return $this->apiresponse_Saved_successfully('The request already exists',201);
        }
            $credentials = $request->only('Name', 'phone','email','user_type_id', 
                                          'Specialization_id','Address', 'lat',
                                           'long' , 'Agree_to_the_terms');
            //valid credential
            $validator = Validator::make($credentials, [

                'Name' => 'required|string|min:5|max:255',
                'email' => 'required|email',
                'user_type_id' => 'required|string|min:1|max:50',
                'Specialization_id' => 'required|string|min:1|max:50',
                'Address' => 'required|string|min:4|max:255',
                'lat' => 'required|string|min:2|max:255',
                'long' => 'required|string|min:2|max:255',
                'Agree_to_the_terms' => 'required|string|min:1|max:50',
                'phone' => 'required|string|min:11|max:11'

            ]);
           
            //Send failed response if request is not valid
            if ($validator->fails()) {
                return response()->json(['error' => $validator->messages()], 200);
            }
            try {
            $Join_request=new Join_request();
            $Join_request->Name=$request->Name;
            $Join_request->phone=$request->phone;
            $Join_request->email=$request->email;
            $Join_request->user_type_id=$request->user_type_id;
            $Join_request->Specialization_id=$request->Specialization_id;
            $Join_request->Address=$request->Address;
            $Join_request->lat=$request->lat;
            $Join_request->long=$request->long;
            $Join_request->Agree_to_the_terms=$request->Agree_to_the_terms;
            $Join_request->save();
            return $this->apiresponse_Saved_successfully('Saved successfully',200);
        } catch (JWTException $e) {
            return $credentials;
                return response()->json([
                        'success' => false,
                        'message' => 'Could not create token.',
                    ], 500);
            }
  
    }
  
}
