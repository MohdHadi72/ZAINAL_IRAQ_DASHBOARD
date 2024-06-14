<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
class ProfileController extends Controller
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
        return view('profile.profile');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $user = Auth()->user();
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $avatarName = time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('avatars'), $avatarName);
        $user->avatar = $avatarName;
        // Auth()->user()->update(['avatar'=>$avatarName]);
        
        return redirect('/home')->with('success', 'Avatar updated successfully.');
    }
}