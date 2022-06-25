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
    Route::post('mata-kuliahs/media', 'MataKuliahApiController@storeMedia')->name('mata-kuliahs.storeMedia');
    Route::resource('mata-kuliahs', 'MataKuliahApiController');

    // Jurusan
    Route::resource('jurusans', 'JurusanApiController');

    // Dosen
    Route::resource('dosens', 'DosenApiController');

    // Tentang Aplikasi
    Route::apiResource('tentang-aplikasis', 'TentangAplikasiApiController', ['only' => ['index']]);

    // Data Mahasiswa
    Route::post('data-mahasiswas/media', 'DataMahasiswaApiController@storeMedia')->name('data-mahasiswas.storeMedia');
    Route::resource('data-mahasiswas', 'DataMahasiswaApiController');

    // Data Mahasiswa On Going
    Route::post('data-mahasiswa-on-goings/media', 'DataMahasiswaOnGoingApiController@storeMedia')->name('data-mahasiswa-on-goings.storeMedia');
    Route::resource('data-mahasiswa-on-goings', 'DataMahasiswaOnGoingApiController');

    // Report Mahasiswa Ongoing
    Route::apiResource('report-mahasiswa-ongoings', 'ReportMahasiswaOngoingApiController', ['only' => ['index']]);

    // Report Mahasiswa History
    Route::apiResource('report-mahasiswa-histories', 'ReportMahasiswaHistoryApiController', ['only' => ['index']]);

    // Data Preparation
    Route::post('data-preparations/media', 'DataPreparationApiController@storeMedia')->name('data-preparations.storeMedia');
    Route::resource('data-preparations', 'DataPreparationApiController');

    // Kampus
    Route::resource('kampus', 'KampusApiController');
});
