<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'mahasiswa_create',
            ],
            [
                'id'    => 18,
                'title' => 'mahasiswa_edit',
            ],
            [
                'id'    => 19,
                'title' => 'mahasiswa_show',
            ],
            [
                'id'    => 20,
                'title' => 'mahasiswa_delete',
            ],
            [
                'id'    => 21,
                'title' => 'mahasiswa_access',
            ],
            [
                'id'    => 22,
                'title' => 'mata_kuliah_create',
            ],
            [
                'id'    => 23,
                'title' => 'mata_kuliah_edit',
            ],
            [
                'id'    => 24,
                'title' => 'mata_kuliah_show',
            ],
            [
                'id'    => 25,
                'title' => 'mata_kuliah_delete',
            ],
            [
                'id'    => 26,
                'title' => 'mata_kuliah_access',
            ],
            [
                'id'    => 27,
                'title' => 'jurusan_create',
            ],
            [
                'id'    => 28,
                'title' => 'jurusan_edit',
            ],
            [
                'id'    => 29,
                'title' => 'jurusan_show',
            ],
            [
                'id'    => 30,
                'title' => 'jurusan_delete',
            ],
            [
                'id'    => 31,
                'title' => 'jurusan_access',
            ],
            [
                'id'    => 32,
                'title' => 'dosen_create',
            ],
            [
                'id'    => 33,
                'title' => 'dosen_edit',
            ],
            [
                'id'    => 34,
                'title' => 'dosen_show',
            ],
            [
                'id'    => 35,
                'title' => 'dosen_delete',
            ],
            [
                'id'    => 36,
                'title' => 'dosen_access',
            ],
            [
                'id'    => 37,
                'title' => 'report_access',
            ],
            [
                'id'    => 38,
                'title' => 'data_mahasiswa_history_create',
            ],
            [
                'id'    => 39,
                'title' => 'data_mahasiswa_history_edit',
            ],
            [
                'id'    => 40,
                'title' => 'data_mahasiswa_history_show',
            ],
            [
                'id'    => 41,
                'title' => 'data_mahasiswa_history_delete',
            ],
            [
                'id'    => 42,
                'title' => 'data_mahasiswa_history_access',
            ],
            [
                'id'    => 43,
                'title' => 'tentang_aplikasi_create',
            ],
            [
                'id'    => 44,
                'title' => 'tentang_aplikasi_edit',
            ],
            [
                'id'    => 45,
                'title' => 'tentang_aplikasi_show',
            ],
            [
                'id'    => 46,
                'title' => 'tentang_aplikasi_delete',
            ],
            [
                'id'    => 47,
                'title' => 'tentang_aplikasi_access',
            ],
            [
                'id'    => 48,
                'title' => 'data_mahasiswa_create',
            ],
            [
                'id'    => 49,
                'title' => 'data_mahasiswa_edit',
            ],
            [
                'id'    => 50,
                'title' => 'data_mahasiswa_show',
            ],
            [
                'id'    => 51,
                'title' => 'data_mahasiswa_delete',
            ],
            [
                'id'    => 52,
                'title' => 'data_mahasiswa_access',
            ],
            [
                'id'    => 53,
                'title' => 'data_dummy_create',
            ],
            [
                'id'    => 54,
                'title' => 'data_dummy_edit',
            ],
            [
                'id'    => 55,
                'title' => 'data_dummy_show',
            ],
            [
                'id'    => 56,
                'title' => 'data_dummy_delete',
            ],
            [
                'id'    => 57,
                'title' => 'data_dummy_access',
            ],
            [
                'id'    => 58,
                'title' => 'data_mahasiswa_on_going_create',
            ],
            [
                'id'    => 59,
                'title' => 'data_mahasiswa_on_going_edit',
            ],
            [
                'id'    => 60,
                'title' => 'data_mahasiswa_on_going_show',
            ],
            [
                'id'    => 61,
                'title' => 'data_mahasiswa_on_going_delete',
            ],
            [
                'id'    => 62,
                'title' => 'data_mahasiswa_on_going_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
