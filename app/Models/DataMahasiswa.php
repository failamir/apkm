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
        'batas_nilai',
        'lulus',
        'tidaklulus',
        'active',
        'observers',
        'accuracy',
        'recall_lulus',
        'recall_tidak_lulus',
        'precision_tidak_lulus',
        'precision_lulus',
    ];

    protected $filterable = [
        'id',
        'nama',
        'batas_nilai',
        'lulus',
        'tidaklulus',
        'active',
        'observers',
        'accuracy',
        'recall_lulus',
        'recall_tidak_lulus',
        'precision_tidak_lulus',
        'precision_lulus',
    ];

    protected $fillable = [
        'nama',
        'batas_nilai',
        'lulus',
        'tidaklulus',
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
