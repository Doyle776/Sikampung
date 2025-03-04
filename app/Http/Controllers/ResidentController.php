<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    // Menampilkan semua data residents
    public function index()
    {
        $residents = Resident::all();
        return view('pages.resident.index', compact('residents'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('pages.resident.create');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => ['required', 'string', 'size:16', 'unique:residents,nik'],
            'name' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'in:male,female'],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'string', 'max:150'],
            'address' => ['required', 'string'],
            'religion' => ['nullable', 'in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu'],
            'marital_status' => ['required', 'in:single,married,divorce,widowed'],
            'occupation' => ['nullable', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:16', 'unique:residents,phone'],
            'status' => ['required', 'in:active,moved,deceased'],
        ]);

               
        

        Resident::create($validatedData);

        return redirect('/resident')->with('success', 'Data berhasil disimpan!');


    }

    // Menampilkan form edit berdasarkan ID
    public function edit($id)
    {
        $resident = Resident::findOrFail($id);
        return view('pages.resident.edit',[ 'resident' => $resident]);
    }

    // Memperbarui data berdasarkan ID
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nik' => ['required', 'string', 'size:16', "unique:residents,nik,$id"],
            'name' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'in:male,female'],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'string', 'max:150'],
            'address' => ['required', 'string'],
            'religion' => ['nullable', 'string', 'max:50'],
            'marital_status' => ['required', 'in:single,married,divorce,widowed'],
            'occupation' => ['nullable', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:16', "unique:residents,phone,$id"],
            'status' => ['required', 'in:active,moved,deceased'],
        ]);

        $resident = Resident::findOrFail($id);
        $resident->update($validated);

        return redirect()->route('resident.index')->with('success', 'Data berhasil diperbarui!');
    }

    

    // Menghapus data berdasarkan ID
    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->delete();

        return redirect()->route('resident.index')->with('success', 'Berhasil menghapus data');
    }


    
}
