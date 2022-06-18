<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DataMahasiswaOnGoing extends Model implements HasMedia
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'data_mahasiswa_on_goings';

    protected $appends = [
        'data_mahasiswa',
    ];

    protected $orderable = [
        'id',
        'nama',
        'hasil_prediksi',
    ];

    protected $filterable = [
        'id',
        'nama',
        'hasil_prediksi',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'hasil_prediksi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDataMahasiswaAttribute()
    {
        return $this->getMedia('data_mahasiswa_on_going_data_mahasiswa')->map(function ($item) {
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
