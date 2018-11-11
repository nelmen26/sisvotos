<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;

use SIS\Http\Requests;
use SIS\Http\Requests\UserStoreRequest;
use SIS\Http\Requests\UserUpdateRequest;
use SIS\Http\Requests\UserPasswordRequest;

use SIS\User;
use Toastr;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users.index');
    }

    public function apiUsers()
    {
        $users = User::orderBy('nombre','ASC')->get();
        return Datatables::of($users)
                            ->editColumn('nickname', function($user){
                                return $user->nickname .' <br><span class="label label-primary">'.$user->rol.'</span>';
                            })
                            ->addColumn('action','users.partials.acciones')
                            ->rawColumns(['action','nickname'])
                            ->toJson();
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->all());

        Toastr::success('User creado con exito','Correcto!');

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->fill($request->all());
        if($request->password){
            $user->fill([
                'password'=>$request->password
            ])->save();
        }
        $user->save();
        Toastr::info('User actualizado con exito','Actualizado!');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Toastr::error('Usuario eliminado correctamente','Eliminado!');
        return back();
    }

    public function perfil()
    {
        $user = auth()->user();
        return view('users.perfil',compact('user'));
    }

    public function updatepassword(UserPasswordRequest $request, User $user)
    {
        $user->password=$request->password;
        $user->save();
        Toastr::info('Su contraseña fue cambiado satisfactoriamente','Password!');
        return back();
    }
}
