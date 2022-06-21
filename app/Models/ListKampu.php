<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListKampu extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'list_kampus';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'id_kampus',
        'nama_kampus',
        'deskripsi',
        'alamat',
    ];

    protected $filterable = [
        'id',
        'id_kampus',
        'nama_kampus',
        'deskripsi',
        'alamat',
    ];

    protected $fillable = [
        'id_kampus',
        'nama_kampus',
        'deskripsi',
        'alamat',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
