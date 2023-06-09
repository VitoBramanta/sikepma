<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $a = [
            'dataUser' => User::get()
        ];
        return view('user.tables', $a);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view('user.formuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedata = $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'role' => 'required|in:Admin,Staff',
            'password' => 'required|confirmed',
        ]);

        $validatedata['password'] = Hash::make($request->password);



        User::create($validatedata);


        return redirect()->route('user.index')->with('success', 'Data User Berhasil dimasukan');
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
        //
        $a = [



            'user' => User::where('id', $id)->first(),



        ];



        return view('user.edituser', $a);
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
        //
        $rules = [
            'username' => 'required',
            'nama' => 'required',
            'role' => 'required|in:admin,staff',
        ];

        if ($request->password) {


            $rules['password'] = 'required|confirmed';
            $rules['password_confirmation'] = 'required';
        }

        $validatedata = $request->validate($rules);

        unset($validatedata['password_confirmation']);

        if ($request->password) {
            $validatedata['password'] = Hash::make($request->password);
        }
        User::where('id', $id)->update($validatedata);



        return redirect()->route('user.index')->with('success', 'Data User Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::where('id', $id)->delete();



        return redirect()->route('user.index')->with('delete', 'User Berhasil dihapus');
    }
}
