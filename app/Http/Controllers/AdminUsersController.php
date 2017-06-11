<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function getRoles(){
        return  Role::pluck('name',"id")->all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->getRoles();
       //$roles = Role::pluck('name',"id")->all();
    /*$a = ['a' =>1,'b'=> 2, 'c'=>3,'d' => 4];
    $b = ['e' =>5, 'f' => 6,'j' =>7];
        $c = $a+$b;
        dd($c);*/
   // dd($roles);
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
       // dd( $request);
        $input = $request->all();
        if($file = $request->file('photo_id')){
            //
            //return 'photo exits';

            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            if($photo = Photo::create(['file'=>$name])) {
                $input['photo_id'] = $photo->id;
            }
        }
        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect(route('users.index'));//$request->all();
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
        $user = User::find($id);

        $user->allRoles = $this->getRoles();
       //return $user->role;
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        if(!trim($request->password)){
            $input = $request->except('password');
        }else{
            $input = $request->all();
        }
        $user = User::findOrFail($id);

        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file' => $name]);
            $input["photo_id"] = $photo->id;
        }
        $input['password'] = bcrypt(trim($request->password));
       // dd($input);

       // trim($request->password) ? $input['password'] = bcrypt(trim($request->password)) : $input['password'] = $user->password;
        $user->update($input);
        return redirect(route('users.index'));
     // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if(is_object($user)){
            Session::flash('deleted_user',"User #".$id." has been delleted");
            if($user->photo) {
                if(file_exists(public_path() . $user->photo->file)) {
                    unlink(public_path() . $user->photo->file);
                }
                $user->photo->delete();
            }
            $user->delete();
        }

        return redirect(route('users.index'));
    }
}
