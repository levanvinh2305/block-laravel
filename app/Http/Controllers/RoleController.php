<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class RoleController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function user_index(){
        $roles = role::all();
        return view('role.role_list', compact('roles'));

    }
    public function create(){
        $roles = role::all();
        return view('role.role_add');

    }
     public function store(Request $rq){
         $roles = $this->role->create([
             'name'=>$rq->name,
             'display_name'=>$rq->display_name,
         ]);
         return redirect()->route('role_list');

     }

     public function user_show_edit(Request $rq,$id){
        $roles = role::find($id);
        return view('role.role_edit',compact('roles'));
    }

    public function edit_user(Request $rq, $id){
        // dd($id); die;
        $role = role::find($id);
        $role->name = $rq->post('name');
        $role->display_name = $rq->post('display_name');
        $role->save();
        return redirect()->route('role_list');
    }
    public function delete(Request $rq, $id){
        $role = role::where('id', $id);
        $role->delete();
        return redirect()->route('role_list');
    }
}
