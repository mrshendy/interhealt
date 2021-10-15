<?php
namespace App\Http\Controllers\Country;
use App\Http\Controllers\Controller;
use Alert;
use App\Http\Requests\StoreCountry;
use App\models\Countries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CountriesController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Countries=Countries::all();
    return view('pages.Country.Countries',compact('Countries'));

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
  public function store(StoreCountry $request)
  {
    if(Countries::where('Name->ar',$request->Name_ar)->orwhere('Name->en',$request->Name_en)->exists())
    {
        return  redirect()->back()->withErrors([trans('Country_trans.existes') ]);
    }
    try
    {
        $validated = $request->validated();
        $Country=new Countries();
        $Country->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
        $Country->notes=$request->notes;
        $Country->user_add=(Auth::user()->id);
        $Country->save();
        Alert::success( '', trans('Country_trans.savesuccess'));
        return redirect()->route('countries.index');

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
  public function update(StoreCountry $request)
  {
        try
        {
        $validated = $request->validated();
        $Country= Countries::findorFail($request->id);
        $Country->update([
            $Country->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar],
            $Country->notes=$request->notes,
            $Country->user_add=(Auth::user()->id),
        ]);
        Alert::success( '', trans('Country_trans.savesuccess'));
        return redirect()->route('countries.index');

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

      $Country= Countries::findorFail($request->id)->delete();
        Alert::success( '', trans('Country_trans.savesuccess'));
        return redirect()->route('countries.index');

    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>
