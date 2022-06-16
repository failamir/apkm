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

    // Upload Data Mahasiswa On Going
    Route::apiResource('upload-data-mahasiswa-on-goings', 'UploadDataMahasiswaOnGoingApiController', ['only' => ['index']]);

    // Data Mahasiswa History
    Route::apiResource('data-mahasiswa-histories', 'DataMahasiswaHistoryApiController', ['only' => ['index']]);

    // Data Mahasiswa On Going
    Route::apiResource('data-mahasiswa-on-goings', 'DataMahasiswaOnGoingApiController', ['only' => ['index']]);

    // Upload Data Mahasiswa History
    Route::apiResource('upload-data-mahasiswa-histories', 'UploadDataMahasiswaHistoryApiController', ['only' => ['index']]);

    // Tentang Aplikasi
    Route::apiResource('tentang-aplikasis', 'TentangAplikasiApiController', ['only' => ['index']]);

    // Data Upload
    Route::post('data-uploads/media', 'DataUploadApiController@storeMedia')->name('data-uploads.storeMedia');
    Route::resource('data-uploads', 'DataUploadApiController');
});
