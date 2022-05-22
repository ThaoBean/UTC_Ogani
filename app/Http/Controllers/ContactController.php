<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clientPages.contact');
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
        $this->validate($request, [
            'fullName' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'message' => 'required',
        ],[
            'fullName.required' => 'Full name is required!',
            'email.required' => 'Email is required!',
            'email.email' => 'Email is invalid!',
            'phone.required' => 'Phone number is required!',
            'phone.numeric' => 'Phone number is invalid!',
            'phone.digits' => 'Phone number is invalid!',
            'message.required' => 'Message is required!',
        ]);

        $newMess = new Contact();
        $newMess->full_name = $request->fullName;
        $newMess->email = $request->email;
        $newMess->phone_number = $request->phone;
        $newMess->message = $request->message;
        $newMess->isRead = false;
        if($newMess->save()){
            $success = 'Send message success';
            return back()->with(['success' => $success]);
        }else{
            $failed = 'Your message has not been sent';
            return back()->with(['failed' => $failed]);
        }

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
