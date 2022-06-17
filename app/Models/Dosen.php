<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dosen extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public const TITLE_RADIO = [
        [
            'label' => 'S1',
            'value' => 'S1',
        ],
        [
            'label' => 'S2',
            'value' => 'S2',
        ],
        [
            'label' => 'S3',
            'value' => 'S3',
        ],
    ];

    public $table = 'dosens';

    protected $appends = [
        'title_label',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'id_dosen',
        'nama_dosen',
        'title',
        'email',
        'no_hp',
    ];

    protected $filterable = [
        'id',
        'id_dosen',
        'nama_dosen',
        'jurusan.nama_jurusan',
        'title',
        'email',
        'no_hp',
    ];

    protected $fillable = [
        'id_dosen',
        'nama_dosen',
        'title',
        'email',
        'no_hp',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jurusan()
    {
        return $this->belongsToMany(Jurusan::class);
    }

    public function getTitleLabelAttribute()
    {
        return collect(static::TITLE_RADIO)->firstWhere('value', $this->title)['label'] ?? '';
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
