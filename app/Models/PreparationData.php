<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PreparationData extends Model implements HasMedia
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'preparation_datas';

    protected $appends = [
        'data_log',
        'data_nilai',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'nama',
        'data_hasil',
        'mata_kuliah.nama_mtk',
    ];

    protected $filterable = [
        'id',
        'nama',
        'data_hasil',
        'mata_kuliah.nama_mtk',
    ];

    protected $fillable = [
        'nama',
        'data_hasil',
        'mata_kuliah_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDataLogAttribute()
    {
        return $this->getMedia('preparation_data_data_log')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getDataNilaiAttribute()
    {
        return $this->getMedia('preparation_data_data_nilai')->map(function ($item) {
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
