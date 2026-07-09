<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
 
    public function index()
    {
        $customers = Customer::latest()->paginate(10);

        return view('pelanggan.index', compact('customers'));
    }

   
    public function create()
    {
        return view('pelanggan.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'nullable|email|unique:customers,email',
            'no_hp'  => 'required|string|max:15',
            'alamat' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Customer::create($request->all());

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

  
    public function show(Customer $customer)
    {
        return view('pelanggan.show', compact('customer'));
    }

 
    public function edit(Customer $customer)
    {
        return view('pelanggan.edit', compact('customer'));
    }

 
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'nullable|email|unique:customers,email,' . $customer->id,
            'no_hp'  => 'required|string|max:15',
            'alamat' => 'required|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $customer->update($request->all());

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

  
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus.');
    }
}