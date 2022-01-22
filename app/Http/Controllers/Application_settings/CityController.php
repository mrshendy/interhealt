<?php


namespace App\Http\Controllers\Application_settings;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreCity;
use App\models\City;
use App\models\Countries;
use App\models\Government;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Citys=City::all();
    $Governmentes=Government::all();
    $Countries=Countries::all();
    return view('pages.Application_settings.city',compact('Citys','Governmentes','Countries'));

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
  public function store(StoreCity $request)
  {
    if(City::where('Name->ar',$request->Name_ar)->orwhere('Name->en',$request->Name_en)->exists())
    {
        return  redirect()->back()->withErrors([trans('city_trans.existes') ]);
    }
    try
    {
        $validated = $request->validated();
        $Cityes=new City();
        $Cityes->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
        $Cityes->Id_country=$request->Id_country;
        $Cityes->Id_government=$request->Id_Governmentes;
        $Cityes->notes=$request->notes;
        $Cityes->user_add=(Auth::user()->id);
        $Cityes->save();
        Alert::success( '', trans('City_trans.savesuccess'));
        return redirect()->route('city.index');

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
  public function update(StoreCity $request)
  {
    try
    {
    $validated = $request->validated();
    $Cityes= City::findorFail($request->id);
    $Cityes->update([
        $Cityes->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar],
        $Cityes->Id_country=$request->Id_country,
        $Cityes->Id_government=$request->Id_Governmentes,
        $Cityes->notes=$request->notes,
        $Cityes->user_add=(Auth::user()->id),
    ]);
    Alert::success( '', trans('City_trans.savesuccess'));
    return redirect()->route('city.index');

    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    try
    {

      $Citys= City::findorFail($request->id)->delete();
      Alert::success( '', trans('City_trans.savesuccess'));
      return redirect()->route('city.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }


  public function getGovernment($id)
  {
      $Governmentes = Government::where("Id_country", $id)->pluck("Name", "id");
      return json_encode($Governmentes);
  }



}

?>
