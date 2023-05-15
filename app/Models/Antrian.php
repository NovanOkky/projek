<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Antrian extends Model
{
    use HasFactory;

    protected $table = 'antrians';

    protected $fillable = [
        'nama',
        'no_antrian',
        'poli',
        'tanggal_antrian',
    ];

    public static function buatNomorAntrian(string $poli)
    {
        $tanggal = date('Y-m-d');
        $nomor_antrian = DB::table('antrians')
            ->where('poli', $poli)
            ->where('tanggal_antrian', $tanggal)
            ->max('no_antrian') + 1;

        self::create([
            'poli' => $poli,
            'tanggal_antrian' => $tanggal,
            'no_antrian' => $nomor_antrian,
        ]);

        return $nomor_antrian;
    }

    public static function resetNomorAntrian()
    {
        $tanggal = date('Y-m-d');
        DB::table('antrians')
            ->where('tanggal_antrian', '<', $tanggal)
            ->delete();
    }
}
