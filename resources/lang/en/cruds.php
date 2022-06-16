<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'mahasiswa' => [
        'title'          => 'List Mahasiswa',
        'title_singular' => 'List Mahasiswa',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'nama'                => 'Nama',
            'nama_helper'         => ' ',
            'angkatan'            => 'Angkatan',
            'angkatan_helper'     => ' ',
            'email'               => 'Email',
            'email_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'id_mahasiswa'        => 'ID Mahasiswa',
            'id_mahasiswa_helper' => ' ',
            'jurusan'             => 'Jurusan',
            'jurusan_helper'      => ' ',
            'no_hp'               => 'No Hp',
            'no_hp_helper'        => ' ',
        ],
    ],
    'mataKuliah' => [
        'title'          => 'List Mata Kuliah',
        'title_singular' => 'List Mata Kuliah',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nama_mtk'          => 'Nama Mtk',
            'nama_mtk_helper'   => ' ',
            'jumlah_sks'        => 'Jumlah SKS',
            'jumlah_sks_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'id_mtk'            => 'ID Mata Kuliah',
            'id_mtk_helper'     => ' ',
            'jurusan'           => 'Jurusan',
            'jurusan_helper'    => ' ',
        ],
    ],
    'jurusan' => [
        'title'          => 'Jurusan',
        'title_singular' => 'Jurusan',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'id_jurusan'          => 'ID Jurusan',
            'id_jurusan_helper'   => ' ',
            'nama_jurusan'        => 'Nama Jurusan',
            'nama_jurusan_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'dosen' => [
        'title'          => 'List Dosen',
        'title_singular' => 'List Dosen',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'id_dosen'          => 'ID Dosen',
            'id_dosen_helper'   => ' ',
            'nama_dosen'        => 'Nama Dosen',
            'nama_dosen_helper' => ' ',
            'jurusan'           => 'Jurusan',
            'jurusan_helper'    => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'no_hp'             => 'No Hp',
            'no_hp_helper'      => ' ',
        ],
    ],
    'uploadDataMahasiswaOnGoing' => [
        'title'          => 'Upload Data Mahasiswa On Going',
        'title_singular' => 'Upload Data Mahasiswa On Going',
    ],
    'report' => [
        'title'          => 'Report',
        'title_singular' => 'Report',
    ],
    'dataMahasiswaHistory' => [
        'title'          => 'Data Mahasiswa History',
        'title_singular' => 'Data Mahasiswa History',
    ],
    'dataMahasiswaOnGoing' => [
        'title'          => 'Data Mahasiswa On Going',
        'title_singular' => 'Data Mahasiswa On Going',
    ],
    'uploadDataMahasiswaHistory' => [
        'title'          => 'Upload Data Mahasiswa History',
        'title_singular' => 'Upload Data Mahasiswa History',
    ],
    'tentangAplikasi' => [
        'title'          => 'Tentang Aplikasi',
        'title_singular' => 'Tentang Aplikasi',
    ],
    'dataMahasiswa' => [
        'title'          => 'Data Mahasiswa',
        'title_singular' => 'Data Mahasiswa',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'nama'                  => 'Nama',
            'nama_helper'           => ' ',
            'data_mahasiswa'        => 'Data Mahasiswa',
            'data_mahasiswa_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
];
