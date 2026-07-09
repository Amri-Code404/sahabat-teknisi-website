<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Service;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
 
    public function index()
    {
        $payments = Payment::with([
            'service.customer',
            'service.technician'
        ])->latest()->paginate(10);

        return view('pembayaran.index', compact('payments'));
    }

   
    public function create()
    {
        $services = Service::with('customer')
            ->where('status', 'selesai')
            ->doesntHave('payment')
            ->get();

        return view('pembayaran.create', compact('services'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'jumlah' => 'required|numeric|min:0',
            'metode' => 'required|in:Cash,Transfer,QRIS',
            'tanggal_bayar' => 'required|date',
            'status' => 'required|in:belum_lunas,lunas',
            'keterangan' => 'nullable|string',
        ]);

        Payment::create($request->all());

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

 
    public function show(Payment $pembayaran)
    {
        return view('pembayaran.show', compact('pembayaran'));
    }

 
    public function edit(Payment $pembayaran)
    {
        $services = Service::with('customer')->get();

        return view('pembayaran.edit', compact(
            'pembayaran',
            'services'
        ));
    }


    public function update(Request $request, Payment $pembayaran)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'jumlah' => 'required|numeric|min:0',
            'metode' => 'required|in:Cash,Transfer,QRIS',
            'tanggal_bayar' => 'required|date',
            'status' => 'required|in:belum_lunas,lunas',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran->update($request->all());

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil diperbarui.');
    }

   
    public function destroy(Payment $pembayaran)
    {
        $pembayaran->delete();

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }
}
