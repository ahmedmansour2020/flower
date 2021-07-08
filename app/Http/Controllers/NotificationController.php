<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public static function add_notification($user_id,$content,$url){
        $new=new Notification();
        $new->user_id = $user_id;
        $new->content = $content;
        $new->url = $url;
        $new->save();
    }
    public function getNotifications(Request $request){
        $user=Auth::user();
        $n=Notification::where('user_id',$user->id)->orderBy('id','desc')->orderBy('status','asc')->limit(10)->get();
        $count=count(Notification::where('user_id',$user->id)->where('status',0)->get());
        return response()->json([
            'success'=>true,
            'notifications'=>$n,
            'count'=>$count
        ]);
    }
    public function read_notifications(Request $request){
        $id=request('id');
        $no=Notification::find($id);
        $no->status=1;
        $no->save();

        return response()->json([
            'success'=>true,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
