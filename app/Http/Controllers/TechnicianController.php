<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{


    public function index()
    {

        $technicians = Technician::latest()->paginate(10);


        return view('teknisi.index', compact('technicians'));

    }


    public function create()
    {

        return view('teknisi.create');

    }


    public function store(Request $request)
    {

        $request->validate([

            'nama' => 'required',

            'no_hp' => 'required',

            'spesialisasi' => 'required',

            'status' => 'required'

        ]);



        Technician::create([

            'nama' => $request->nama,

            'email' => $request->email,

            'no_hp' => $request->no_hp,

            'alamat' => $request->alamat,

            'spesialisasi' => $request->spesialisasi,

            'status' => $request->status,

        ]);



        return redirect()
            ->route('teknisi.index')
            ->with('success','Data teknisi berhasil ditambahkan.');

    }


    public function edit(Technician $teknisi)
    {

        return view('teknisi.edit', compact('teknisi'));

    }


    public function update(Request $request, Technician $teknisi)
    {

        $request->validate([

            'nama' => 'required',

            'no_hp' => 'required',

            'spesialisasi' => 'required',

            'status' => 'required'

        ]);



        $teknisi->update([

            'nama' => $request->nama,

            'email' => $request->email,

            'no_hp' => $request->no_hp,

            'alamat' => $request->alamat,

            'spesialisasi' => $request->spesialisasi,

            'status' => $request->status,

        ]);



        return redirect()
            ->route('teknisi.index')
            ->with('success','Data teknisi berhasil diperbarui.');

    }


    public function destroy(Technician $teknisi)
    {

        $teknisi->delete();


        return redirect()
            ->route('teknisi.index')
            ->with('success','Data teknisi berhasil dihapus.');

    }

}