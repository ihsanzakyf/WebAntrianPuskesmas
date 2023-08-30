<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Waktu extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'waktu_id',
        'waktu_antri'
    ];

    protected $table = 'waktu';
    protected $primaryKey = 'waktu_id';

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id_poli');
    }
}
