<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use function bcrypt;
use function compact;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function view;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::all();


        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::lists('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        $input=$request->all();
        $input['password']=bcrypt($request->password);
        $input['is_active']=0;
        $user=User::create($input);

        if ($file=$request->file('path')){

            $name=time().random_int(1,9).'.'.$file->getClientOriginalExtension();
            $file->move('images/users',$name);

            $photo=new Photo();
            $photo->path=$name;
            $photo->save();

//            $input['photo_id']=$photo->id;

            $photo->user()->save($user);
        }

      return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles=Role::lists('name','id');
        $user=User::find($id);

        return view('admin.users.edit',compact('user','roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        //
        $user=User::find($id);
        $input=$request->all();
        $input['password']=bcrypt($request->password);

        if ($file=$request->file('path')){

            $name=time().random_int(1,9).'.'.$file->getClientOriginalExtension();
            $file->move('images/users',$name);


                $photo=new Photo();
                $photo->path=$name;
                $photo->save();


          $input['photo_id']=$photo->id;


        }
        $user->update($input);

        return redirect('admin/users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
