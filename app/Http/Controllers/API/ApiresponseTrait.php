<?php

namespace App\Http\Controllers\API;

trait ApiresponseTrait
{


    public function apiresponse($Data=null,$message=null,$status=null)
    {

      if($Data)
      {
        $array =[
            'Data'=>$Data,
            'message'=>$message,
            'status'=>$status
      ];
        return response($array,$status);
      }else
      {
        $array =[
            'Data'=>'Null',
            'message'=>'The Data Not Found',
            'status'=>401
      ];
        return response($array,$status);
      }


    }
    public function apiresponse_Saved_successfully($message=null,$status=null)
    {

      if($status)
      {
        $array =[
          'message'=>$message,
          'status'=>$status
        ];
         return response($array,$status);
      }else 
      {
        $array =[
          'message'=>'Error No Status',
          'status'=>404
        ];
         return response($array,$status);
      }
     
    }

}
?>
