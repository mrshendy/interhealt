<?php


namespace App\Http\Controllers\provider_attachments;
use App\Http\Controllers\Controller;
use App\models\Provider;
use App\models\provider_attachments;
use App\Http\Requests\storeprovider_attachments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class provider_attachmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Provider=new Provider();
        $Provider_id=Provider::where('user_add', Auth::user()->id)->latest()->first()->id; 
        $provider_attachments=provider_attachments::where('id_provider',$Provider_id)->get();
        return view('pages.provider_attachments.provider_attachments',compact('provider_attachments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeprovider_attachments $request)
    {
        
    if(provider_attachments::where('Name_file',$request->Name_file)->orwhere('id_provider',14)->exists())
    {
        return  redirect()->back()->withErrors([trans('provider_trans.existes') ]);
    }
    try
    {
        $validated = $request->validated();
        $provider_attachments=new provider_attachments();
        $Provider=new Provider();
        $Provider_id=Provider::where('user_add', Auth::user()->id)->latest()->first()->id;
        $provider_attachments->Name_file=$request->Name_file;
        $provider_attachments->id_provider=$Provider_id;
        $provider_attachments->id_type_file=$request->id_type_file;
        $provider_attachments->Id_from_action='تم اضافة من شاشة انشاء مقدم خدمة';
        $provider_attachments->user_add=(Auth::user()->id);
     
        //get file from form
        $file=$request->file('file_provider');
        //create name
        $time=Carbon::now();
        $derctoriy=$Provider_id.'/'.date_format($time,'Y').'/'.date_format($time,'m');
        $file_name_f=date_format($time,'h').date_format($time,'s').rand(1,9).'.'.$file->extension(); 
        Storage::disk('public')->putFileAs($derctoriy,$file,$file_name_f);
         // add database
         $provider_attachments->path=$derctoriy.'/'.$file_name_f;
  
         $provider_attachments->save();
         Alert::success( '', trans('provider_trans.savesuccess'));
       
        $provider_attachments=provider_attachments::where('id_provider',$Provider_id)->get();
        return view('pages.provider_attachments.provider_attachments',compact('provider_attachments'));

    }catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\provider_attachments  $provider_attachments
     * @return \Illuminate\Http\Response
     */
    public function show(Request $provider_attachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\provider_attachments  $provider_attachments
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $provider_attachments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\provider_attachments  $provider_attachments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Request $provider_attachments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\provider_attachments  $provider_attachments
     * @return \Illuminate\Http\Response
     */
    public function destroy(provider_attachments $provider_attachments)
    {
        //
    }
}
