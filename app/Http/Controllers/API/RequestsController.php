<?php 

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\models\Requests;
use App\models\Attachments;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;


class RequestsController extends Controller 
{
  use ApiresponseTrait;

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
    if(Requests::where('Patient_name',$request->Patient_name)->orwhere('sender_id',$request->sender_id)->orwhere('created_at',$request->created_at)->exists())
    {
        return $this->apiresponse_Saved_successfully('The request already exists',201);
    }
        $credentials = $request->only('Patient_name', 'sender_id','date_of_birth','phone_number', 
                                      'email','gender', 'notes',);
        //valid credential
        $validator = Validator::make($credentials, [

            'Patient_name' => 'required|string|min:5|max:255',
            'email' => 'required|email',
            'sender_id' => 'required|string|min:1|max:50',
            'date_of_birth' => 'required|string|min:1|max:50',
            'notes' => 'required|string|min:4|max:255',
            'gender' => 'required|string|min:1|max:1',
            'phone_number' => 'required|string|min:11|max:11'

        ]);
       
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        try {
        $Request=new Requests();
        $Request->Patient_name=$request->Patient_name;
        $Request->phone_number=$request->phone_number;
        $Request->email=$request->email;
        $Request->sender_id=$request->sender_id;
        $Request->date_of_birth=$request->date_of_birth;
        $Request->notes=$request->notes;
        $Request->gender=$request->gender;
        $Request->save();

        if($request->hasFile('file'))
        {
            $Request_id=Requests::latest()->first()->id;
            $files= $request->file('file');
            $file_name=$files->getClientOriginalName();
            $attachments=new Attachments();
            $attachments->Name_file= $file_name;
            $attachments->Api_name= "api from new request";
            $attachments->Id_from_action=  $Request_id;
            $attachments->user_add=$request->sender_id;
            $attachments->save();

            $files_name=$request->file->getClientOriginalName();
            $request->file->move(public_path('Attachments/'.$Request_id),$files_name);
        }
        return $this->apiresponse_Saved_successfully('Saved successfully',200);
    } catch (JWTException $e) {
        return $credentials;
            return response()->json([
                    'success' => false,
                    'message' => 'Could not create token.',
                ], 500);
        }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>