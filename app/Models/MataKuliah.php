<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataKuliah extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'mata_kuliahs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'id_mtk',
        'nama_mtk',
        'jurusan.nama_jurusan',
        'jumlah_sks',
    ];

    protected $filterable = [
        'id',
        'id_mtk',
        'nama_mtk',
        'jurusan.nama_jurusan',
        'jumlah_sks',
    ];

    protected $fillable = [
        'id_mtk',
        'nama_mtk',
        'jurusan_id',
        'jumlah_sks',
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
