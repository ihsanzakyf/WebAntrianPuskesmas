<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'alamat',
        'nomor_telepon',
        'tanggal_antri',
        'waktu_id',
        'id_poli',
        'id_pegawai',
        'created_at',
        'updated_at'
    ];

    protected $table = 'pasien';
    protected $primaryKey = 'id';


    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id_poli');
    }

    public function waktu(): BelongsTo
    {
        return $this->belongsTo(Waktu::class, 'waktu_id', 'waktu_id');
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
