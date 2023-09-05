<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function UserProfile(string $user_id)
    {
        // dd($user_id);
        $user = User::find($user_id);
        return view('profile.profile' , compact('user'));
    }
    public function ProfileUpdate(Request $request , string $user_id)
    {
        $user = User::find($user_id);
        $user->update($request->all());
        $user->save();
        // return redirect()->route('user.profile',$user->id , compact('user'));
        return view('profile.profile' , compact('user'));

    }
}
