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

    protected $orderable = [
        'id',
    ];

    protected $filterable = [
        'id',
    ];

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

    protected $fillable = [
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

    public function getDataHasilAttribute()
    {
        return $this->getMedia('preparation_data_data_hasil')->map(function ($item) {
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
