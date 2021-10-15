<?php

namespace App\Http\Controllers\Provider;
use App\Http\Controllers\Controller;
use Alert;
use App\Http\Requests\storeProvider;
use App\models\Provider_Category;
use App\models\User_type ;
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
    $provider_categorys=provider_category::all();
    return view('pages.provider.provider',compact('provider_categorys','user_types'));

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
  public function store(Request $request)
  {

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
