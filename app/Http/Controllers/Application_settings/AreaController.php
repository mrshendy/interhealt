<?php



namespace App\Http\Controllers\Application_settings;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreArea;
use App\models\City;
use App\models\Countries;
use App\models\Government;
use App\models\Area;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AreaController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $city=City::all();
    $Governmentes=Government::all();
    $Countries=Countries::all();
    $Areaes=Area::all();
    return view('pages.Application_settings.area',compact('Areaes','Governmentes','Countries','city'));

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
  public function store(StoreArea $request)
  {
    if(Area::where('Name->ar',$request->Name_ar)->orwhere('Name->en',$request->Name_en)->exists())
    {
        return  redirect()->back()->withErrors([trans('Area_trans.existes') ]);
    }
    try
    {
        $validated = $request->validated();
        $Areaes=new Area();
        $Areaes->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
        $Areaes->Id_country=$request->Id_country;
        $Areaes->Id_government=$request->Id_Governmentes;
        $Areaes->id_city=$request->id_city;
        $Areaes->notes=$request->notes;
        $Areaes->user_add=(Auth::user()->id);
        $Areaes->save();
        Alert::success( '', trans('Area_trans.savesuccess'));
        return redirect()->route('area.index');

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
  public function update(StoreArea $request)
  {
    try
    {
    $validated = $request->validated();
    $Areaes= Area::findorFail($request->id);
    $Areaes->update([
        $Areaes->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar],
        $Areaes->Id_country=$request->Id_country,
        $Areaes->Id_government=$request->Id_Governmentes,
        $Areaes->id_city=$request->id_city,
        $Areaes->notes=$request->notes,
        $Areaes->user_add=(Auth::user()->id),
    ]);
    Alert::success( '', trans('Area_trans.savesuccess'));
    return redirect()->route('area.index');

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

      $Areas= Area::findorFail($request->id)->delete();
      Alert::success( '', trans('Area_trans.savesuccess'));
    return redirect()->route('area.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }



  public function getcity($id)
  {
      $city = city::where("Id_government", $id)->pluck("Name", "id");
      return json_encode($city);
  }


}

?>
