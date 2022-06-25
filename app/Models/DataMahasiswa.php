<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DataMahasiswa extends Model implements HasMedia
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'data_mahasiswas';

    protected $appends = [
        'data_mahasiswa',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'nama',
        'mata_kuliah.nama_mtk',
        'batas_nilai',
        'lulus',
        'tidak_lulus',
        'active',
        'observers',
        'accuracy',
        'recall_lulus',
        'recall_tidak_lulus',
        'precision_tidak_lulus',
        'precision_lulus',
        'location',
    ];

    protected $filterable = [
        'id',
        'nama',
        'mata_kuliah.nama_mtk',
        'batas_nilai',
        'lulus',
        'tidak_lulus',
        'active',
        'observers',
        'accuracy',
        'recall_lulus',
        'recall_tidak_lulus',
        'precision_tidak_lulus',
        'precision_lulus',
        'location',
    ];

    protected $fillable = [
        'nama',
        'mata_kuliah_id',
        'batas_nilai',
        'lulus',
        'tidak_lulus',
        'active',
        'observers',
        'accuracy',
        'recall_lulus',
        'recall_tidak_lulus',
        'precision_tidak_lulus',
        'precision_lulus',
        'location',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDataMahasiswaAttribute()
    {
        return $this->getMedia('data_mahasiswa_data_mahasiswa')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
