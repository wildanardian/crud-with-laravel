<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LocationController extends Controller
{
    public function index(){
        $location = DB::table('location')->get();
        return view('form.index', compact('location'));
    }

    public function create(){
        return view('form.create');
    }

    public function store(Request $request){
        $request->validate([
            'code' => 'required|unique:location',
            'name' => 'required'
        ]);

        $query = DB::table('location')->insert(
            ['code' => $request["code"], 'name' => $request["name"]]
        );

        return redirect('/location')->with('success', 'Location baru berhasil disimpan');
    }

    public function edit($id){
        $location = DB::table('location')->where('id',$id)->first();
        return view('form.edit', compact('location'));
    }

    public function update($id, Request $request){
        $request->validate([
            'code' => 'required',
            'name' => 'required'
        ]);

        $query = DB::table('location')->where('id',$id)->update([
            'code' => $request['code'],
            'name' => $request['name']
        ]);

        return redirect('/location')->with('success', 'berhasil update location');
    }

    public function destroy($id){
        DB::table('location')->where('id', $id)->delete();
        return redirect('/location')->with('success', 'location berhasil dihapus');
    }
}
