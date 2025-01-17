<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;

class UsersController extends Controller
{
    public function index(){
        if (auth()->user()->role == 1) {
            $user = User::get();
        } else {
            $user = User::whereId(auth()->user()->id)->get();
        }
        
        return view('back.user.index',[
            'users'=> $user
        ]);
    }

    public function store(UserRequest $request){

        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'role'=>'required'
        ],[
            'name'=>'Nama Tidak Boleh Kosong',
            'email'=>'Email Tidak Boleh Kosong',
            'password'=>'Password Tidak Boleh Kosong',
            'role'=>'Role TIdak Boleh Kosong'
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], 
            'role' => $data['role']   
        ]);

        return back()->with('success','User Baru Telah Ditambahkan');
    }

    public function update(UserUpdateRequest $request, $id){

        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'nullable',
            'role'=>'required'
        ],[
            'nama'=>'Nama Tidak Boleh Kosong',
            'email'=>'Email Tidak Boleh Kosong',
            'role'=>'Role Tidak Boleh Kosong'
        ]);

        if($data['password'] != ''){
            $data['password'] = bcrypt($data['password']);
            User::find($id)->update($data);
        } else{
            User::find($id)->update([
                'name'=> $request->name,
                'email'=> $request->email,
                'role'=> $request->role
            ]);
        }


        return back()->with('success','Data Telah Berhasil Diperbahrui');
    }
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return back()->with('hapus','Data User Telah Berhasil Di Hapus');
    }
}
