<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DataPreparation extends Model implements HasMedia
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'data_preparations';

    protected $appends = [
        'data_log',
        'data_nilai',
        'data_hasil',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'nama',
        'akses_file',
        'akses_video',
        'akses_forum',
        'kuis_1',
        'kuis_2',
        'tugas_1',
        'tugas_2',
        'nilai_akhir',
        'status_1',
        'status_2',
        'status_3',
    ];

    protected $filterable = [
        'id',
        'nama',
        'akses_file',
        'akses_video',
        'akses_forum',
        'kuis_1',
        'kuis_2',
        'tugas_1',
        'tugas_2',
        'nilai_akhir',
        'status_1',
        'status_2',
        'status_3',
        'temp_nilai',
        'temp_log',
    ];

    protected $fillable = [
        'nama',
        'akses_file',
        'akses_video',
        'akses_forum',
        'kuis_1',
        'kuis_2',
        'tugas_1',
        'tugas_2',
        'nilai_akhir',
        'status_1',
        'status_2',
        'status_3',
        'temp_log',
        'temp_nilai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDataLogAttribute()
    {
        return $this->getMedia('data_preparation_data_log')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getDataHasilAttribute()
    {
        return $this->getMedia('data_preparation_data_hasil')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getDataNilaiAttribute()
    {
        return $this->getMedia('data_preparation_data_nilai')->map(function ($item) {
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
