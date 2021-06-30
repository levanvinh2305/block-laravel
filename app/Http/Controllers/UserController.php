<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use DB;
class UserController extends Controller
{
    // use HasRoles;
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function user_index(){
        $users = user::all();
        return view('user.user_list', compact('users'));
    }

    public function create(){
        $roles = role::all();
        return view('user.user_add', compact('roles'));
    }

     public function store(Request $rq){
        $validatedData = $rq->validate([
            'email' => 'required|unique:users|max:255'
        ]);

        $users = $this->user->create([
            'name'=>$rq->name,
            'email'=>$rq->email,
            'password'=>$rq->password,
        ]);
        $users->roles()->attach($rq->roles);
        return redirect()->route('user_list');
     }

     public function user_show_edit(Request $rq,$id){
        $user = user::find($id);
        $roles = role::all();
        $userRoles = collect($user->roles)->map(function($item){
            return $item['id'];
        })->toArray();
        return view('user.user_edit',compact('user', 'roles', 'userRoles'));
    }

    public function edit_user(Request $rq, $id){
        // dd($id); die;
        $user = user::find($id);
        $user->name = $rq->post('name');
        $user->email = $rq->post('email');
        $user->password = $rq->post('password');
        $user->save();
        return redirect()->route('user_list');
    }
    public function delete(Request $rq, $id){
        $user = user::where('id', $id);
        $user->delete();
        return redirect()->route('user_list');
    }


}
