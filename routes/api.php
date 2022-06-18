<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Dashboard
    Route::get('dashboard', 'DashboardApiController@index')->name('dashboard');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::resource('users', 'UsersApiController');

    // Mahasiswa
    Route::resource('mahasiswas', 'MahasiswaApiController');

    // Mata Kuliah
    Route::resource('mata-kuliahs', 'MataKuliahApiController');

    // Jurusan
    Route::resource('jurusans', 'JurusanApiController');

    // Dosen
    Route::resource('dosens', 'DosenApiController');

    // Data Mahasiswa History
    Route::apiResource('data-mahasiswa-histories', 'DataMahasiswaHistoryApiController', ['only' => ['index']]);

    // Tentang Aplikasi
    Route::apiResource('tentang-aplikasis', 'TentangAplikasiApiController', ['only' => ['index']]);

    // Data Mahasiswa
    Route::post('data-mahasiswas/media', 'DataMahasiswaApiController@storeMedia')->name('data-mahasiswas.storeMedia');
    Route::resource('data-mahasiswas', 'DataMahasiswaApiController');
    Route::get('data-mahasiswas/{dataMahasiswa}/proses', 'DataMahasiswaApiController@proses')->name('data-mahasiswas.proses');

    // Data Dummy
    Route::resource('data-dummies', 'DataDummyApiController');

    // Data Mahasiswa On Going
    Route::get('data-mahasiswas-on-goings/{dataMahasiswa}/proses', 'DataMahasiswaOnGoingApiController@proses')->name('data-mahasiswas-on-goings.proses');
    Route::post('data-mahasiswa-on-goings/media', 'DataMahasiswaOnGoingApiController@storeMedia')->name('data-mahasiswa-on-goings.storeMedia');
    Route::resource('data-mahasiswa-on-goings', 'DataMahasiswaOnGoingApiController');
    
});
