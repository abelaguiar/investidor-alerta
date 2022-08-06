<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, User $user)
    {
        $request = $request->all();
        $request['role_id'] = Role::ADMINISTRATOR;

        $user->create($request);

        flash('Salvo com sucesso!')->success();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id
        ]);

        if ($request->input('password')) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $user->fill(['password' => bcrypt($request->input('password'))]);
        }

        $user->save();

        flash('Atualizado com sucesso!')->success();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        flash('Excluído com sucesso!')->success();

        return back();
    }

    public function requestAuthorization()
    {
        $users = User::where('role_id', Role::VISITOR)
            ->where('authorized', false)
            ->paginate(10);

        return view('users.request-authorization', compact('users'));
    }

    public function authorizeUser(User $user)
    {
        $user->authorized = !$user->authorized;
        $user->save();

        User::notificationAuthorized();

        flash('Usuário autorizado com sucesso!')->success();

        return back();   
    }

    public function profile()
    {
        $user = auth()->user();

        return view('users.profile', compact('user'));
    }

    public function profileUpdate(UserUpdateRequest $request)
    {
        $user = auth()->user();

        $user->fill([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if ($request->picture_profile) {
            
            $validator = Validator::make($request->all(), [
                'picture_profile' => 'required|image',
            ]);
            
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            
            $user->addPictureProfile($request->picture_profile);

            $user->fill(['picture_profile' => $user->picture_profile]);
        }

        if ($request->password) {
            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $user->fill(['password' => bcrypt($request->password)]);
        }

        $user->save();

        flash('Atualizado com sucesso!')->success();

        return view('users.profile', compact('user'));
    }
}
