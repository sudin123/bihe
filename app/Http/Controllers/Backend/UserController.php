<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Role;
use App\User;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    protected $user;
    protected $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->role->all();
        $users = $this->user->paginate(10);
        $data = [
            'users' => $users,
            'roles' => $roles,
            'user'  => Auth::user()
        ];
        return view('backend.users.index')->with($data);
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
    public function store(UserRequest $request)
    {
        if($request->password == $request->c_password){
            $this->user->create($request->all());
            return redirect()->back();
        }else{
            \Session::flash('message','Passwords do not match each other');
            return redirect()->back();
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
        $user = $this->user->find($id);
        $roles = $user->roles;
        $rolesArray = [];
        foreach ($roles as $key => $roles) {
            $rolesArray[] = $roles->role;
        }
        $data = [
            'user' => $user,
            'roles' => $rolesArray
        ];
        return view('backend.users.edit')->with($data);

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
       $user = $this->user->find($id);
       $user->update($request->all());
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->delete();
        return redirect()->back();
    }

    public function assignRoles(Request $request, $id){
        $user = $this->user->find($id);
        $user->roles()->sync($request->roles);
        return redirect()->back();
    }

}
