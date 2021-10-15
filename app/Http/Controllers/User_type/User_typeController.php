<?php
namespace App\Http\Controllers\User_type;
use App\Http\Controllers\Controller;
use App\models\User_type;
use App\Http\Requests\StoreUser_types;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class User_typeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $user_types=User_type::all();
    return view('pages.User_type.User_type',compact('user_types'));
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
  public function store(StoreUser_types $request)
  {
      if(User_type::where('type_name->ar',$request->Name_ar)->orwhere('type_name->en',$request->Name_en)->exists())
      {
          return  redirect()->back()->withErrors([trans('user_type_trans.existes') ]);
      }
      try
      {
        $validated = $request->validated();
        $user_type=new User_type();
        $user_type->type_name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
        $user_type->notes=$request->notes;
        $user_type->user_add=(Auth::user()->id);
        $user_type->save();
        Alert::success( '', trans('user_type_trans.savesuccess'));
        return redirect()->route('User_type.index');

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
  public function update(StoreUser_types $request)
  {
    try
      {
        $validated = $request->validated();
        $user_type= User_type::findorFail($request->id);
        $user_type->update([
            $user_type->type_name=['en'=>$request->Name_en,'ar'=>$request->Name_ar],
            $user_type->notes=$request->notes,
            $user_type->user_add=(Auth::user()->id),
        ]);
        Alert::success( '', trans('user_type_trans.savesuccess'));
        return redirect()->route('User_type.index');

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

      $user_type= User_type::findorFail($request->id)->delete();
      Alert::success( '', trans('user_type_trans.savesuccess'));
      return redirect()->route('User_type.index');

    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>
