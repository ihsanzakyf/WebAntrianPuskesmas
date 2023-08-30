<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pegawai',
        'nama',
        'jabatan',
        'nomor_telepon'
    ];

    protected $table = 'pegawai';

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Antrian::class, 'id_pegawai', 'id_pegawai');
    }
}
