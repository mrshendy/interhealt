<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Resources\SpecialtiyResource;
use App\models\Specialtiy;
use Illuminate\Http\Request;

class Specialtiycontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    use ApiresponseTrait;
    public function index()
    {
        $Specialtiy=Specialtiy::select('id','Name->ar as Name_AR')->get();
        return $this->apiresponse($Specialtiy,'ok',200);
    }
    public function show($id)
    {

        $Specialtiy=new  SpecialtiyResource(Specialtiy::find($id)) ;
        return $this->apiresponse($Specialtiy,'ok',200);
    }
    public function store(Request $request)
    {
        
       return $request;

    }

}
