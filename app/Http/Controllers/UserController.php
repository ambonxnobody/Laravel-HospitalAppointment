<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pages.Admin.User.Index', [
            'title' => 'User',
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Admin.User.Create', [
            'title' => 'Tambah User',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'address' => 'nullable',
            'role' => 'required',
            'gender' => 'required',
        ]);

        $validatedData['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; //password
        $validatedData['remember_token'] = Str::random(20);

        User::query()->create($validatedData);

        Alert::toast('User Berhasil Ditambahkan!', 'success');

        return redirect('/user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if ($user->role == 'admin') {
            abort(403);
        }

        return view('Pages.Admin.User.Edit', [
            'title' => 'Ubah User',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->role == 'admin') {
            abort(403);
        }

        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required',
            'address' => 'nullable',
            'role' => 'required',
            'gender' => 'required',
            'password' => 'nullable',
        ]);

        $validatedData['password'] = Hash::make($request['password']);

        User::query()->where('id', $user->id)->update($validatedData);

        Alert::toast('User Berhasil Diubah!', 'success');

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->role == 'admin') {
            abort(403);
        }

        User::destroy($user->id);

        Alert::toast('User Berhasil Dihapus!', 'success');

        return redirect('/user');
    }
}
