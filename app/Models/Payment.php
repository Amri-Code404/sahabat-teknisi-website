<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'service_id',
        'jumlah',
        'metode',
        'tanggal_bayar',
        'status',
        'keterangan',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
