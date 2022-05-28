<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use File;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clientPages.login');
    }

    public function login(Request $request){
        $credentials = array('email'=>$request->email, 'password'=>$request->password);
        if(Auth::attempt($credentials)){
            return redirect('/');
        }
        else{
            return redirect()->back()->with('message', 'Login fail');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myProfile()
    {
        $user = Auth::user();
        return view('clientPages.my_profile')->with([
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'avatar' => 'required|mimes:jpeg,png,jpg|max:2048'
        ],[
            'name.required' => 'Username is required!',
            'avatar.required' => 'Enter one image for this profile.',
            'avatar.mimes' => 'The image must have the extension jpge, png, jpg',
            'avatar.max' => 'Photos up to 2048MB in size'
        ]);
        $user = Auth::user();
        $u = new User();
        if ($request->hasFile('avatar')){
            $image_path = public_path("storage/images/".$user->avatar);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $image = $request->file('avatar');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/images');
            $image->move($destinationPath, $image_name);
            $user->avatar = $image_name;
        }
        $user->name = $request->name;
        $user->save();
        return redirect('/my-profile');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect('/');
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

    public function getAllUsers(){
        $users = User::all();
        return view('adminPages.users.list-user')->with('users', $users);
    }
}
