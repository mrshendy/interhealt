<?php

namespace App\Http\Controllers\Provider;
use App\Http\Controllers\Controller;
use Alert;
use App\Http\Requests\storeProvider;
use App\models\Provider;
use App\models\Provider_Category;
use App\models\User_type ;
use App\models\Specialtiy;
use App\models\Area;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ProviderController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {   
    $user_types=User_type::all();
    $Areaes=Area::all();
    $Specialtiys=Specialtiy::all();
    $provider_categorys=provider_category::all();
    return view('pages.Provider.provider',compact('provider_categorys','user_types','Areaes','Specialtiys'));

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
  public function store(storeProvider $request)
  {


    if(Provider::where('phone1',$request->phone1)->orwhere('phone2',$request->phone2)->exists())
    {
        return  redirect()->back()->withErrors([trans('provider_trans.existes') ]);
    }
    try
    {
        $validated = $request->validated();
        $Provider=new Provider();
        $Provider->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
        $Provider->phone1=$request->phone1;
        $Provider->phone2=$request->phone2;
        $Provider->email=$request->email;
        $Provider->address=$request->address;
        $Provider->lat=$request->lat;
        $Provider->long=$request->long;
        $Provider->id_type=$request->id_type;
        $Provider->id_specialty=$request->id_specialty;
        $Provider->id_area=$request->id_area;
        $Provider->id_category=$request->id_provider_category;
        $Provider->notes=$request->notes;
        $Provider->line_number=$request->line_number;
        $Provider->user_add=(Auth::user()->id);
        $Provider->save();
        Alert::success( '', trans('service_type_trans.savesuccess'));
        return redirect()->route('service_type.index');

    }catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
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
