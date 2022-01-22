<?php 

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\models\details_request;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;


class details_RequestController extends Controller 
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
    
    if(details_request::where('id_request',$request->id_request)->exists())
    {
        return $this->apiresponse_Saved_successfully('The request already exists',201);
    }
        $credentials = $request->only
        (
             'id_request',
             'id_Transfer_type',
             'id_specialty',
             'id_conversion_purpose', 
             'Request_execution_date',
             'convert_to_type',
             'user_add',
        );
        //valid credential
        $validator = Validator::make($credentials, [

            'id_request' => 'required|string|min:1|max:255',
            'id_Transfer_type' => 'required|string|min:1|max:255',
            'id_specialty' =>'required|string|min:1|max:255',
            'id_conversion_purpose' => 'required|string|min:1|max:255',
            'Request_execution_date' => 'required|string|min:4|max:255',
            'convert_to_type' => 'required|string|min:1|max:1',
            'user_add' =>'required|string|min:1|max:255',

        ]);
       
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        try {
        $details_Requests=new details_request();
        $details_Requests->id_request=$request->id_request;
        $details_Requests->id_Transfer_type=$request->id_Transfer_type;
        $details_Requests->id_specialty=$request->id_specialty;
        $details_Requests->id_conversion_purpose=$request->id_conversion_purpose;
        $details_Requests->Request_execution_date=$request->Request_execution_date;
        $details_Requests->convert_to_type=$request->convert_to_type;
        $details_Requests->Id_country=$request->Id_country;
        $details_Requests->Id_government=$request->Id_government;
        $details_Requests->id_city=$request->id_city;
        $details_Requests->id_Area=$request->id_Area;
        $details_Requests->id_service_provider_group=$request->id_service_provider_group;
        $details_Requests->user_add=$request->user_add;
        $details_Requests->save();
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