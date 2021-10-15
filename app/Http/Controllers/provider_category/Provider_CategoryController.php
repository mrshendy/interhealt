<?php

namespace App\Http\Controllers\Provider_Category;
use App\Http\Controllers\Controller;
use Alert;
use App\Http\Requests\storeProvider_category;
use App\models\Provider_Category;
use App\models\User_type ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class Provider_CategoryController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $user_types=User_type::all();
    $provider_categorys=provider_category::all();
    return view('pages.provider_category.provider_category',compact('provider_categorys','user_types'));
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
  public function store(storeProvider_category $request)
  {
    if(Provider_Category::where('Name->ar',$request->Name_ar)->orwhere('Name->en',$request->Name_en)->exists())
    {
        return  redirect()->back()->withErrors([trans('Provider_Category_trans.existes') ]);
    }
    try
    {
        $validated = $request->validated();
        $Provider_Categorys=new Provider_Category();
        $Provider_Categorys->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar];
        $Provider_Categorys->id_type=$request->Id_user_type;
        $Provider_Categorys->notes=$request->notes;
        $Provider_Categorys->User_add=(Auth::user()->id);
        $Provider_Categorys->save();
        Alert::success( '', trans('Provider_Category_trans.savesuccess'));
        return redirect()->route('provider_Category.index');

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
  public function update(Request $request)
  {
    try
    {

        $Provider_Categorys= Provider_Category::findorFail($request->id);
        $Provider_Categorys->update([
        $Provider_Categorys->Name=['en'=>$request->Name_en,'ar'=>$request->Name_ar],
        $Provider_Categorys->id_type=$request->Id_user_type,
        $Provider_Categorys->notes=$request->notes,
        $Provider_Categorys->User_add=(Auth::user()->id),
    ]);
    Alert::success( '', trans('Provider_Category_trans.savesuccess'));
    return redirect()->route('provider_Category.index');

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

      $provider_Categorys= provider_Category::findorFail($request->id)->delete();
      Alert::success( '', trans('provider_Category_trans.savesuccess'));
      return redirect()->route('provider_Category.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>
