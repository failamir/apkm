<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DataUpload extends Model implements HasMedia
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'data_uploads';

    protected $appends = [
        'data_excel',
    ];

    protected $orderable = [
        'id',
        'nama_data',
    ];

    protected $filterable = [
        'id',
        'nama_data',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_data',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDataExcelAttribute()
    {
        return $this->getMedia('data_upload_data_excel')->map(function ($item) {
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
