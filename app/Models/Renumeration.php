<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renumeration extends Model
{
    use HasFactory;
    protected $fillable = [
        'j_laporan',
        'user_id',
        'id_jabatan',
        'penilaian',
        'bonus_retensi',
        'upah_lembur',
        'jam_lembur_total',
        'gaji_pokok',
        'jasa_produksi',
        'triwulan'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
