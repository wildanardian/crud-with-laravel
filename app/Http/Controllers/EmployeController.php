<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class EmployeController extends Controller
{
    public function index(){
        $employe = DB::table('employee')->get();
        return view('employe.index', compact('employe'));
    }

    public function create(){
        $locationCode = DB::table('location')->pluck("code");
        return view('employe.create', compact('locationCode'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:employee',
            'birth' => 'required'
        ]);

        // dd($request->all());
        $query = DB::table('employee')->insert(
            ['name' => $request["name"], 'code' => $request["code"], 'birth' => $request["birth"]]
        );

        return redirect('/employe')->with('success', 'Employee baru berhasil disimpan');
    }

    public function edit($id){
        $locationCode = DB::table('location')->pluck("code");
        $employe = DB::table('employee')->where('id',$id)->first();
        return view('employe.edit', compact('employe','locationCode'));
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'birth' => 'required'
        ]);

        $query = DB::table('employee')->where('id',$id)->update([
            'name' => $request['name'],
            'code' => $request['code'],
            'birth' => $request['birth']
        ]);

        return redirect('/employe')->with('success', 'berhasil update employee');
    }

    public function destroy($id){
        DB::table('employee')->where('id', $id)->delete();
        return redirect('/employe')->with('success', 'employee berhasil dihapus');
    }

    public function search(){
        $births = DB::table('employee')->pluck('birth');
        foreach($births as $key => $birth){
            $birthDate = Carbon::parse($birth)->age;
            if($birthDate > '25'){
                $employe = DB::table('employee')->where('birth',$birth)->get();
            }
        }
        return view('employe.index', compact('employe'));
    }
}
