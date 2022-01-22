<?php
namespace App\Http\Controllers\Application_settings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreService_type;
use App\models\Service_type;
use App\models\User_type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Service_typeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

    $Service_type=Service_type::all();
    return view('pages.Application_settings.service_type',compact('Service_type'));

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
  public function store(StoreService_type $request)
  {
    if(Service_type::where('Name->ar',$request->Name_ar)->orwhere('Name->en',$request->Name_en)->exists())
    {
        return  redirect()->back()->withErrors([trans('service_type_trans.existes') ]);
    }
    try
    {
        $validated = $request->validated();
        $Service_type=new Service_type();
        $Service_type->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
        $Service_type->notes=$request->notes;
        $Service_type->user_add=(Auth::user()->id);
        $Service_type->save();
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
  public function update(StoreService_type $request)
  {
    if(Service_type::where('Name->ar',$request->Name_ar)->orwhere('Name->en',$request->Name_en)->exists())
    {
        return  redirect()->back()->withErrors([trans('service_type_trans.existes') ]);
    }
        try
        {
        $validated = $request->validated();
        $Service_type= Service_type::findorFail($request->id);
        $Service_type->update([
            $Service_type->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar],
            $Service_type->notes=$request->notes,
            $Service_type->user_add=(Auth::user()->id),
        ]);
        Alert::success( '', trans('service_type_trans.savesuccess'));
        return redirect()->route('service_type.index');

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

      $service_type= service_type::findorFail($request->id)->delete();
      Alert::success( '', trans('service_type_trans.savesuccess'));
      return redirect()->route('service_type.index');

    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>
