<?php

namespace App\Http\Controllers\Application_settings;
use App\Http\Controllers\Controller;
use App\models\Specialtiy;
use App\Http\Requests\StoreSpecialtiy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SpecialtiyController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $Specialties=Specialtiy::all();
    return view('pages.Application_settings.specialty',compact('Specialties'));

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
  public function store(StoreSpecialtiy $request)
  {
      if(Specialtiy::where('Name->ar',$request->Name_ar)->orwhere('Name->en',$request->Name_en)->exists())
      {
          return  redirect()->back()->withErrors([trans('specialty_trans.existes') ]);
      }
      try
      {
          $validated = $request->validated();
          $Specialtiy=new Specialtiy();
          $Specialtiy->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
          $Specialtiy->notes=$request->notes;
          $Specialtiy->user_add=(Auth::user()->id);
          $Specialtiy->save();
          Alert::success( '', trans('specialty_trans.savesuccess'));
          return redirect()->route('specialtiy.index');

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
  public function update(StoreSpecialtiy $request)
  {
        try
        {
        $validated = $request->validated();
        $Specialtiy= Specialtiy::findorFail($request->id);
        $Specialtiy->update([
            $Specialtiy->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar],
            $Specialtiy->notes=$request->notes,
            $Specialtiy->user_add=(Auth::user()->id),
        ]);
        Alert::success( '', trans('specialty_trans.savesuccess'));
        return redirect()->route('specialtiy.index');

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

      $Specialtiy= Specialtiy::findorFail($request->id)->delete();
      Alert::success( '', trans('specialty_trans.savesuccess'));
      return redirect()->route('specialtiy.index');

    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>
