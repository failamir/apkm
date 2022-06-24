<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPreparation extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'data_preparations';

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
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
