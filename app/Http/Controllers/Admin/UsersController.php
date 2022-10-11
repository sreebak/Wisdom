<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Exception;
use Gate;
use Auth;



class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with("roles")->get();
        return view('admin.users.index')->with('users',$users);
    }

    public function create()
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.users.index'));
        }

        $role = Role::all();
        return view('admin.users.new')->with([
            'roles'=>$role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.users.index'));
        }
        $role = Role::all();

        return view('admin.users.edit')->with([
            'user'=>$user,
            'roles'=>$role
        ]);
    }

    public function changepass()
    {
        return view('admin.users.changepassword');
    }

    public function savepass(Request $request)
    {
        request()->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);

        $user = User::find(Auth::user()->id);

        $user->password = Hash::make($request->password);
        if($user->save()) {
            $request->session()->flash("Success","Password has bas been updated");
        }
        else {
            $request->session()->flash("Error","Password updation is failed");
        }
        return view('admin.users.changepassword');

    }

    public function store(Request $request, User $user) 
    {
        if(Gate::denies('create-data')) {
            return redirect(route('admin.users.index'));
        }

        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            
            if($user) {
                $user->roles()->sync($request->roles);
                $request->session()->flash("Success",$user->name. " has bas been added");
                return redirect()->route('admin.users.index');
            }
            else {
                $request->session()->flash("Error","There was an error in adding the user");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.users.create');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(Gate::denies('edit-data')) {
            return redirect(route('admin.users.index'));
        }

        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        try {
            $user->roles()->sync($request->roles);

            $user->name = $request->name;
            $user->email = $request->email;
            if($user->save()) {
                $request->session()->flash("Success",$user->name. " has bas been updated");
                return redirect()->route('admin.users.index');
            }
            else {
                $request->session()->flash("Error","There was an error updating the user");
            }
        }
        catch(Exception $ex) {
            $request->session()->flash("Error",$ex->getMessage());
        }

       return redirect()->route('admin.users.edit',$user->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if(Gate::denies('delete-data')) {
            return redirect(route('admin.users.index'));
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    public function status_change(Request $request)
    {
        if(Gate::denies('delete-data')) {
            return redirect(route('admin.users.index'));
        }

        try {
            $user = User::find($request->id);
            $user->status = $request->status;
            if($user->save()) {
                return "Success";
            }
            else {
                return "Failed";
            }
        }
        catch (Exception $ex) {
            return "Failed";
        } 
    }
}
