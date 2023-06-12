<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Models\crud_opatration;


class crud_controller extends Controller
{
    public function index()
    {
        $user = crud_opatration::get();
        return view("index", ['user' => $user]);
    }

    public function create()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        // form data validate ==============
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'images' => 'required|image:jpeg,jpg,png,gif'
        ]);
        //check address already have or not
        $checkaddress = crud_opatration::where('address', $request->address)->first();
        if (isset($checkaddress)) {
            //if address already set out database then show an errors
            return back()->with('error', 'This email address has already used');
        } else {
            //if address already not set out database then continue....
            // form image data validate =========
        $imageName = time() . '.' . $request->images->extension();
        $request->images->move(public_path('images'), $imageName);

        // make object ==============
        $user = new crud_opatration;
        $user->images = $imageName;
        $user->name = $request->name;
        $user->address = $request->address;
        // and save ==================
        $user->save();
        return back()->withSuccess("New user data was added!");
        }

    }

    public function edit($id)
    {
        $edit = crud_opatration::where('id', $id)->first();
        return view("edit", ['edited_user' => $edit]);
    }

    public function update(Request $request, $id)
    {
        // form data validate ==============
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'images' => 'nullable|image:jpeg,jpg,png,gif'
        ]);
        $user = crud_opatration::where('id', $id)->first();
        if (isset($request->images)) {
            // form image data validate =========
            $imageName = time() . '.' . $request->images->extension();
            $request->images->move(public_path('images'), $imageName);
            $user->images = $imageName;
        }

        // make object ==============

        $user->name = $request->name;
        $user->address = $request->address;
        // and save ==================
        $user->save();
        return back()->withSuccess("New user data was updated!");
    }

    public function delete($id)
    {
        $deletedUser = crud_opatration::where('id', $id)->first();
        $deletedUser->delete();
        return back()->withSuccess("New user data was deleted!");
    }
}
