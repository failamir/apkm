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
            'no_hp'               => 'No HP',
            'no_hp_helper'        => ' ',
        ],
    ],
    'mataKuliah' => [
        'title'          => 'List Mata Kuliah',
        'title_singular' => 'List Mata Kuliah',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nama_mtk'          => 'Nama Mata Kuliah',
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
        'title'          => 'List Jurusan',
        'title_singular' => 'List Jurusan',
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
            'no_hp'             => 'No HP',
            'no_hp_helper'      => ' ',
        ],
    ],
    'report' => [
        'title'          => 'Report',
        'title_singular' => 'Report',
    ],
    'dataMahasiswaHistory' => [
        'title'          => 'Proses Mahasiswa History',
        'title_singular' => 'Proses Mahasiswa History',
    ],
    'tentangAplikasi' => [
        'title'          => 'Tentang Aplikasi',
        'title_singular' => 'Tentang Aplikasi',
    ],
    'dataMahasiswa' => [
        'title'          => 'Proses Mahasiswa History',
        'title_singular' => 'Proses Mahasiswa History',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'nama'                         => 'Nama',
            'nama_helper'                  => ' ',
            'data_mahasiswa'               => 'Data Mahasiswa',
            'data_mahasiswa_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'batas_nilai'                  => 'Batas Nilai Akhir Kelulusan',
            'batas_nilai_helper'           => ' ',
            'lulus'                        => 'Lulus',
            'lulus_helper'                 => ' ',
            'tidaklulus'                   => 'Tidaklulus',
            'tidaklulus_helper'            => ' ',
            'active'                       => 'Active',
            'active_helper'                => ' ',
            'observers'                    => 'Observers',
            'observers_helper'             => ' ',
            'accuracy'                     => 'Accuracy',
            'accuracy_helper'              => ' ',
            'recall_lulus'                 => 'Recall Lulus',
            'recall_lulus_helper'          => ' ',
            'recall_tidak_lulus'           => 'Recall Tidak Lulus',
            'recall_tidak_lulus_helper'    => ' ',
            'precision_tidak_lulus'        => 'Precision Tidak Lulus',
            'precision_tidak_lulus_helper' => ' ',
            'precision_lulus'              => 'Precision Lulus',
            'precision_lulus_helper'       => ' ',
            'mata_kuliah'                  => 'Mata Kuliah',
            'mata_kuliah_helper'           => ' ',
        ],
    ],
    'dataMahasiswaOnGoing' => [
        'title'          => 'Proses Mahasiswa Ongoing',
        'title_singular' => 'Proses Mahasiswa Ongoing',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'nama'                         => 'Nama',
            'nama_helper'                  => ' ',
            'data_mahasiswa'               => 'Data Mahasiswa',
            'data_mahasiswa_helper'        => ' ',
            'hasil_prediksi'               => 'Hasil Prediksi',
            'hasil_prediksi_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'data_history'                 => 'Data History Sebelumnya',
            'data_history_helper'          => ' ',
            'lulus'                        => 'Lulus',
            'lulus_helper'                 => ' ',
            'tidak_lulus'                  => 'Tidak Lulus',
            'tidak_lulus_helper'           => ' ',
            'active'                       => 'Active',
            'active_helper'                => ' ',
            'observers'                    => 'Observers',
            'observers_helper'             => ' ',
            'accuracy'                     => 'Accuracy',
            'accuracy_helper'              => ' ',
            'recall_lulus'                 => 'Recall Lulus',
            'recall_lulus_helper'          => ' ',
            'recall_tidak_lulus'           => 'Recall Tidak Lulus',
            'recall_tidak_lulus_helper'    => ' ',
            'precision_tidak_lulus'        => 'Precision Tidak Lulus',
            'precision_tidak_lulus_helper' => ' ',
            'precision_lulus'              => 'Precision Lulus',
            'precision_lulus_helper'       => ' ',
            'mata_kuliah'                  => 'Mata Kuliah',
            'mata_kuliah_helper'           => ' ',
        ],
    ],
    'listKampu' => [
        'title'          => 'List Kampus',
        'title_singular' => 'List Kampu',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'id_kampus'          => 'Id Kampus',
            'id_kampus_helper'   => ' ',
            'nama_kampus'        => 'Nama Kampus',
            'nama_kampus_helper' => ' ',
            'deskripsi'          => 'Deskripsi',
            'deskripsi_helper'   => ' ',
            'alamat'             => 'Alamat',
            'alamat_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'dataMaster' => [
        'title'          => 'Data Master',
        'title_singular' => 'Data Master',
    ],
    'reportMahasiswaOngoing' => [
        'title'          => 'Report Mahasiswa Ongoing',
        'title_singular' => 'Report Mahasiswa Ongoing',
    ],
    'reportMahasiswaHistory' => [
        'title'          => 'Report Mahasiswa History',
        'title_singular' => 'Report Mahasiswa History',
    ],
];
