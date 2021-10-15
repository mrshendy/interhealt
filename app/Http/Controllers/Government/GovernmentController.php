<?php


namespace App\Http\Controllers\Government;
use App\Http\Controllers\Controller;
use Alert;
use App\Http\Requests\StoreGovernment;
use App\models\Countries;
use App\models\Government ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class GovernmentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Countries=Countries::all();
    $Governmentes=Government::all();
  return view('pages.Government.Government',compact('Governmentes','Countries'));
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
  public function store(StoreGovernment $request)
  {
    if(Government::where('Name->ar',$request->Name_ar)->orwhere('Name->en',$request->Name_en)->exists())
    {
        return  redirect()->back()->withErrors([trans('Government_trans.existes') ]);
    }
    try
    {
        $validated = $request->validated();
        $Governmentes=new Government();
        $Governmentes->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
        $Governmentes->Id_country=$request->Id_country;
        $Governmentes->notes=$request->notes;
        $Governmentes->user_add=(Auth::user()->id);
        $Governmentes->save();
        Alert::success( '', trans('Government_trans.savesuccess'));
        return redirect()->route('government.index');

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
  public function update(StoreGovernment $request)
  {
    try
    {
    $validated = $request->validated();
    $Governmentes= Government::findorFail($request->id);
    $Governmentes->update([
        $Governmentes->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar],
        $Governmentes->Id_country=$request->Id_country,
        $Governmentes->notes=$request->notes,
        $Governmentes->user_add=(Auth::user()->id),
    ]);
    Alert::success( '', trans('Government_trans.savesuccess'));
    return redirect()->route('government.index');

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

      $Governmentes= Government::findorFail($request->id)->delete();
      Alert::success( '', trans('Government_trans.savesuccess'));
      return redirect()->route('government.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>
