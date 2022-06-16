<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'mahasiswas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'id_mahasiswa',
        'nama',
        'jurusan.nama_jurusan',
        'angkatan',
        'email',
        'no_hp',
    ];

    protected $filterable = [
        'id',
        'id_mahasiswa',
        'nama',
        'jurusan.nama_jurusan',
        'angkatan',
        'email',
        'no_hp',
    ];

    protected $fillable = [
        'id_mahasiswa',
        'nama',
        'jurusan_id',
        'angkatan',
        'email',
        'no_hp',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
