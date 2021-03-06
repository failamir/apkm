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

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'nama',
        'data_history.nama',
        'mata_kuliah.nama_mtk',
        'hasil_prediksi',
        'lulus',
        'tidak_lulus',
        'active',
        'observers',
        'accuracy',
        'recall_lulus',
        'recall_tidak_lulus',
        'precision_tidak_lulus',
        'precision_lulus',
        'prediksi_tidak_lulus',
    ];

    protected $filterable = [
        'id',
        'nama',
        'data_history.nama',
        'mata_kuliah.nama_mtk',
        'hasil_prediksi',
        'lulus',
        'tidak_lulus',
        'active',
        'observers',
        'accuracy',
        'recall_lulus',
        'recall_tidak_lulus',
        'precision_tidak_lulus',
        'precision_lulus',
        'prediksi_tidak_lulus',
    ];

    protected $fillable = [
        'nama',
        'data_history_id',
        'mata_kuliah_id',
        'hasil_prediksi',
        'lulus',
        'tidak_lulus',
        'active',
        'observers',
        'accuracy',
        'recall_lulus',
        'recall_tidak_lulus',
        'precision_tidak_lulus',
        'precision_lulus',
        'prediksi_tidak_lulus',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function dataHistory()
    {
        return $this->belongsTo(DataMahasiswa::class);
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

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
