<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Customer;
use App\Models\Technician;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with(['customer', 'technician'])->latest()->paginate(10);
        return view('servis.index', compact('services'));
    }

    public function create()
    {
        $customers = Customer::where('status', 'aktif')->get();
        $technicians = Technician::where('status', 'aktif')->get();
        return view('servis.create', compact('customers', 'technicians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'technician_id' => 'nullable|exists:technicians,id',
            'jenis_layanan' => 'required|string',
            'keluhan' => 'required|string',
            'biaya' => 'required|numeric|min:0',
            'status' => 'required|in:pending,proses,selesai,batal',
        ]);

        Service::create($request->all());

        return redirect()->route('servis.index')->with('success', 'Data servis berhasil dibuat!');
    }

    public function destroy(Service $servis)
    {

        $servis->delete();


        return redirect()
            ->route('servis.index')
            ->with('success', 'Data Services berhasil dihapus.');
    }

    public function edit(Service $servis)
    {
        $customers = Customer::where('status', 'aktif')->get();
        $technicians = Technician::where('status', 'aktif')->get();

        return view('servis.edit', compact(
            'servis',
            'customers',
            'technicians'
        ));
    }

    public function update(Request $request, Service $servis)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'technician_id' => 'nullable|exists:technicians,id',
            'jenis_layanan' => 'required|string|max:255',
            'keluhan' => 'required|string',
            'biaya' => 'required|numeric|min:0',
            'status' => 'required|in:pending,proses,selesai,batal',
        ]);

        $servis->update($request->all());

        return redirect()
            ->route('servis.index')
            ->with('success', 'Data servis berhasil diperbarui.');
    }

    public function show(Service $servis)
    {
        return view('servis.show', compact('servis'));
    }


}
