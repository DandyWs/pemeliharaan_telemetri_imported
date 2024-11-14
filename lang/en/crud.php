<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'role' => 'Role',
            'password' => 'Password',
        ],
    ],

    'pemeriksaans' => [
        'name' => 'Pemeriksaans',
        'index_title' => 'Pemeriksaans List',
        'new_title' => 'New Pemeriksaan',
        'create_title' => 'Create Pemeriksaan',
        'edit_title' => 'Edit Pemeriksaan',
        'show_title' => 'Show Pemeriksaan',
        'inputs' => [
            'hasilPemeriksaan' => 'Hasil Pemeriksaan',
            'catatan' => 'Catatan',
            'pemeliharaan_id' => 'Pemeliharaan',
            'user_id' => 'User',
            'komponen_id' => 'Komponen',
            'setting_id' => 'Setting',
        ],
    ],

    'pemeliharaans' => [
        'name' => 'Pemeliharaans',
        'index_title' => 'Pemeliharaans List',
        'new_title' => 'New Pemeliharaan',
        'create_title' => 'Create Pemeliharaan',
        'edit_title' => 'Edit Pemeliharaan',
        'show_title' => 'Show Pemeliharaan',
        'inputs' => [
            'tanggalPemeliharan' => 'Tanggal Pemeliharan',
            'waktuMulaiPemeliharan' => 'Waktu Mulai Pemeliharan',
            'user_id' => 'User',
            'peralatan_telemetri_id' => 'Peralatan Telemetri',
        ],
    ],

    'jenis_peralatans' => [
        'name' => 'Jenis Peralatans',
        'index_title' => 'JenisPeralatans List',
        'new_title' => 'New Jenis peralatan',
        'create_title' => 'Create JenisPeralatan',
        'edit_title' => 'Edit JenisPeralatan',
        'show_title' => 'Show JenisPeralatan',
        'inputs' => [
            'namaJenisAlat' => 'Nama Jenis Alat',
        ],
    ],

    'peralatan_telemetris' => [
        'name' => 'Peralatan Telemetris',
        'index_title' => 'PeralatanTelemetris List',
        'new_title' => 'New Peralatan telemetri',
        'create_title' => 'Create PeralatanTelemetri',
        'edit_title' => 'Edit PeralatanTelemetri',
        'show_title' => 'Show PeralatanTelemetri',
        'inputs' => [
            'namaAlat' => 'Nama Alat',
            'serialNumber' => 'Serial Number',
            'lokasiStasiun' => 'Lokasi Stasiun',
            'jenis_peralatan_id' => 'Jenis Peralatan',
        ],
    ],

    'komponens' => [
        'name' => 'Komponens',
        'index_title' => 'Komponen List',
        'new_title' => 'New Komponen',
        'create_title' => 'Create Komponen',
        'edit_title' => 'Edit Komponen',
        'show_title' => 'Show Komponen',
        'inputs' => [
            'nama' => 'Nama Komponen',
        ],
    ],

    'settings' => [
        'name' => 'Settings',
        'index_title' => 'Settings List',
        'new_title' => 'New Setting',
        'create_title' => 'Create Setting',
        'edit_title' => 'Edit Setting',
        'show_title' => 'Show Setting',
        'inputs' => [
            'namaSetting' => 'Nama Setting',
            'nilaiSebelumKalibrasi' => 'Nilai Sebelum Kalibrasi',
            'displaySebelumKalibrasi' => 'Display Sebelum Kalibrasi',
            'nilaiSetelahKalibrasi' => 'Nilai Setelah Kalibrasi',
            'displaySetelahKalibrasi' => 'Display Setelah Kalibrasi',
            'peralatan_telemetri_id' => 'Peralatan Telemetri',
        ],
    ],

    'forms' => [
        'name' => 'Forms',
        'index_title' => 'Pemeliharaans List',
        'new_title' => 'New Pemeliharaan',
        'create_title' => 'Create Pemeliharaan',
        'edit_title' => 'Edit Pemeliharaan',
        'show_title' => 'Show Pemeliharaan',
        'inputs' => [
            'tanggalPemeliharan' => 'Tanggal Pemeliharan',
            'waktuMulaiPemeliharan' => 'Waktu Mulai Pemeliharan',
            'periodePemeliharaan' => 'Periode Pemeliharaan',
            'cuaca' => 'Cuaca',
            'no_AlatUkur' => 'No Alat Ukur',
            'no_GSM' => 'No Gsm',
            'user_id' => 'User',
            'peralatan_telemetri_id' => 'Peralatan Telemetri',
        ],
    ],
];
