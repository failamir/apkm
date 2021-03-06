<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MataKuliah extends Model implements HasMedia
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'mata_kuliahs';

    protected $appends = [
        'data_mtk',
    ];

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

    public function getDataMtkAttribute()
    {
        return $this->getMedia('mata_kuliah_data_mtk')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
