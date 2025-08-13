<?php

use App\Http\Controllers\GestoresController;

Route::get('/', [GestoresController::class, 'index'])->name('gestores.index');

Route::post('/oracle/insertar-lmd', [GestoresController::class, 'oracleLmd'])->name('oracle.lmd');
Route::post('/oracle/insertar-sp', [GestoresController::class, 'oracleSp'])->name('oracle.sp');
Route::post('/oracle/borrar', [GestoresController::class, 'oracleDelete'])->name('oracle.delete');
Route::post('/oracle/status', [GestoresController::class, 'oracleStatus'])->name('oracle.status');

Route::post('/postgres/insertar-lmd', [GestoresController::class, 'postgresLmd'])->name('postgres.lmd');
Route::post('/postgres/insertar-sp', [GestoresController::class, 'postgresSp'])->name('postgres.sp');
Route::post('/postgres/borrar', [GestoresController::class, 'postgresDelete'])->name('postgres.delete');
Route::post('/postgres/status', [GestoresController::class, 'postgresStatus'])->name('postgres.status');

Route::post('/sqlserver/insertar-lmd', [GestoresController::class, 'sqlserverLmd'])->name('sqlserver.lmd');
Route::post('/sqlserver/insertar-sp', [GestoresController::class, 'sqlserverSp'])->name('sqlserver.sp');
Route::post('/sqlserver/borrar', [GestoresController::class, 'sqlserverDelete'])->name('sqlserver.delete');
Route::post('/sqlserver/status', [GestoresController::class, 'sqlserverStatus'])->name('sqlserver.status');

Route::post('/mysql/insertar-lmd', [GestoresController::class, 'mysqlLmd'])->name('mysql.lmd');
Route::post('/mysql/insertar-sp', [GestoresController::class, 'mysqlSp'])->name('mysql.sp');
Route::post('/mysql/borrar', [GestoresController::class, 'mysqlDelete'])->name('mysql.delete');
Route::post('/mysql/status', [GestoresController::class, 'mysqlStatus'])->name('mysql.status');