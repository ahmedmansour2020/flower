<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Role;
use App\Models\ToMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mail = "all";
        if (isset($_GET['mail-messages'])) {
            $mail = "new";
        }
        $title=$mail=="all"?'البريد الوارد':'الرسائل الجديدة';
        $buyer = Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
        $admin = Role::where('name', 'مسئول')->orWhere('name', 'admin')->first();
        $user = Auth::user();
        $from = "";
        if ($user->role_id == $buyer->id) {
            $from = "buyer";
        }
        if ($user->role_id == $admin->id) {
            $from = "admin";
        }
        if ($user->role_id == null) {
            return redirect()->back();
        }
        if (request()->ajax()) {
            $items = ToMessage::leftJoin('messages', 'messages.id', 'to_messages.message_id')->leftJoin('users', 'users.id', 'messages.from')
                ->where('to_messages.to', $user->id)
                ->select('users.name', 'message_id', 'to_messages.id', 'to_messages.status', DB::raw('date(to_messages.created_at) as date'), DB::raw('time(to_messages.created_at) as time'), 'subject')
                ->orderBy('to_messages.id', 'desc')
            ;
            if ($mail == 'new') {
                $items->where('to_messages.status', 0);
            }
            $items = $items->get();
            return datatables()->of($items)->addIndexColumn()->make(true);
        }
        return view('admin/show/mail-messages', compact('title', 'from', 'mail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "كتابة رسالة جديدة";
        $buyer = Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
        $admin = Role::where('name', 'مسئول')->orWhere('name', 'admin')->first();
        $user = Auth::user();
        $from = "";
        if ($user->role_id == $buyer->id) {
            $from = "buyer";
        }
        if ($user->role_id == $admin->id) {
            $from = "admin";
        }
        if ($user->role_id == null) {
            return redirect()->back();
        }
        $users = User::where('id', '<>', $user->id)->get();
        return view('admin/show/writing-messages', compact('title', 'from', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $message = new Message();
        $message->subject = $request->subject;
        $message->content = $request->content;
        $message->from = $user->id;
        if ($request->file) {
            $file_extension = $request->file->getClientOriginalExtension();
            $file_name = "message-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->file->move($path, $file_name);
            $message->file = $file_name;
        }
        $message->save();
        if ($request->to == "all") {
            $users = User::where('id', '<>', $user->id)->get();
            foreach ($users as $item) {
                $to = new ToMessage();
                $to->to = $item->id;
                $to->message_id = $message->id;
                $to->save();
            }

        } elseif ($request->to == "all_buyers") {
            $buyer = Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
            $users = User::where('role_id', $buyer->id)->where('id', '<>', $user->id)->get();
            foreach ($users as $item) {
                $to = new ToMessage();
                $to->to = $item->id;
                $to->message_id = $message->id;
                $to->save();
            }

        } elseif ($request->to == "all_users") {
            $users = User::whereNull('role_id')->where('id', '<>', $user->id)->get();
            foreach ($users as $item) {
                $to = new ToMessage();
                $to->to = $item->id;
                $to->message_id = $message->id;
                $to->save();
            }

        } else {
            $to = new ToMessage();
            $to->to = $request->to;
            $to->message_id = $message->id;
            $to->save();
        }
        return redirect()->back()->with('success', 'تم إرسال الرسالة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title="تفاصيل الرسالة";
        $buyer = Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
        $admin = Role::where('name', 'مسئول')->orWhere('name', 'admin')->first();
        $user = Auth::user();
        $from = "";
        if ($user->role_id == $buyer->id) {
            $from = "buyer";
        }
        if ($user->role_id == $admin->id) {
            $from = "admin";
        }
        if ($user->role_id == null) {
            return redirect()->back();
        }$user=Auth::user();
        $message=Message::leftJoin('users','users.id','from')->leftJoin('to_messages','to_messages.message_id','messages.id')
        ->where('to_messages.id',$id)->where('to_messages.to',$user->id)
        ->select('messages.*','users.name as from')
        ->firstOrFail();

        if($message->file!=null){
            $message->file=asset('uploaded/' . $message->file);
        }
        $update=ToMessage::find($id);
        if($update->status==0){
            $update->status=1;
            $update->save();
        }
        return view('admin/show/view-mail', compact('title', 'from', 'message'));

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
    public function destroy(Request $request)
    {
        $id=request('id');
        ToMessage::find($id)->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
