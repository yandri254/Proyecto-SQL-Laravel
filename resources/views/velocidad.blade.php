<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Velocidad Gestores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="card m-auto">
            <div class="card-header">
                <h3 class="text-center text-uppercase">Velocidad de gestores</h3>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 d-grid gap-2 mb-2">
                        <div class="btn-group" role="group">
                            <button id="btnOracle" type="button" class="btn btn-danger dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">Oracle 23ai</button>
                            <ul class="dropdown-menu" aria-labelledby="btnOracle">
                                <li><button class="dropdown-item" id="oracle_statu">Estado Oracle 23ai</button></li>
                                <li><button class="dropdown-item" id="oracle_delete">Borrar registros oracle</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 d-grid gap-2 mb-2">
                        <div class="btn-group" role="group">
                            <button id="btnPostgres" type="button" class="btn btn-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">Postgres</button>
                            <ul class="dropdown-menu" aria-labelledby="btnPostgres">
                                <li><button class="dropdown-item" id="postgres_statu">Estado Postgres</button></li>
                                <li><button class="dropdown-item" id="postgres_delete">Borrar registros
                                        Postgres</button></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 d-grid gap-2 mb-2">
                        <div class="btn-group" role="group">
                            <button id="btnSqlserver" type="button" class="btn btn-secondary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">SQL server 2022</button>
                            <ul class="dropdown-menu" aria-labelledby="btnSqlserver">
                                <li><button class="dropdown-item" id="sqlserver_statu">Estado SQL server 2022</button>
                                </li>
                                <li><button class="dropdown-item" id="sqlserver_delete">Borrar registros SQL server
                                        2022</button></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 col-sm-6 d-grid gap-2 mb-2">
                        <div class="btn-group" role="group">
                            <button id="btnMysql" type="button" class="btn btn-warning dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">My Sql</button>
                            <ul class="dropdown-menu" aria-labelledby="btnMysql">
                                <li><button class="dropdown-item" id="mysql_statu">Estado Mysql</button></li>
                                <li><button class="dropdown-item" id="mysql_delete">Borrar registros Mysql</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="form" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-xl-3 col-md-3 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="id_producto" value="1" name="id_producto"
                                    placeholder="Ingresar id" required />
                                <label>Id <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="descripcion" name="descripcion"
                                    value="Computadora" placeholder="ingresar descripción" required />
                                <label>Descripción <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="precio" name="precio" value="1000"
                                    placeholder="Ingresar precio" required />
                                <label>Precio <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="fecha" name="fecha" value="2022-12-12"
                                    placeholder="Ingresar finicio" required readonly />
                                <label>Fecha <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- ORACLE -->
                        <div class="col-xl-6 col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="bg-danger rounded p-1 text-white">Oracle</h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 d-grid gap-2 mb-3">
                                            <button type="button" id="btn_oracle_lmd"
                                                class="btn btn-outline-danger">Insertar registros LDM</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input class="form-control" type="text" id="txt_oracleLMD" value="0"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 d-grid gap-2 mb-3">
                                            <button type="button" id="btn_oracle_sp"
                                                class="btn btn-outline-danger">Insertar registros SP</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input class="form-control" type="text" id="txt_oracleSP" value="0"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- POSTGRES -->
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="bg-primary rounded p-1 text-white">Postgres</h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 d-grid gap-2 mb-3">
                                            <button type="button" id="btn_postgres_lmd"
                                                class="btn btn-outline-primary">Insertar registros LDM</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input class="form-control" type="text" id="txt_pgLMD" value="0" disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 d-grid gap-2 mb-3">
                                            <button type="button" id="btn_postgres_sp"
                                                class="btn btn-outline-primary">Insertar registros SP</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input class="form-control" type="text" id="txt_postgresSP" value="0"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SQL SERVER -->
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="bg-secondary rounded p-1 text-white">Sql server</h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 d-grid gap-2 mb-3">
                                            <button type="button" id="btn_sqlserver_lmd"
                                                class="btn btn-outline-secondary">Insertar registros - LDM</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input class="form-control" type="text" id="txt_sqlserverLMD" value="0"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 d-grid gap-2 mb-3">
                                            <button type="button" id="btn_sqlserver_sp"
                                                class="btn btn-outline-secondary">Insertar registros - SP</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input class="form-control" type="text" id="txt_sqlserverSP" value="0"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- MYSQL -->
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="bg-warning rounded p-1 text-white">My Sql</h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 d-grid gap-2 mb-3">
                                            <button type="button" id="btn_mysql_lmd"
                                                class="btn btn-outline-warning">Insertar registros LDM</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input class="form-control" type="text" id="txt_mysqlLMD" value="0"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 d-grid gap-2 mb-3">
                                            <button type="button" id="btn_mysql_sp"
                                                class="btn btn-outline-warning">Insertar registros SP</button>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input class="form-control" type="text" id="txt_mysqlSP" value="0"
                                                disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            // Oracle LMD
            $('#btn_oracle_lmd').click(function () {
                $.post("{{ route('oracle.lmd') }}", {}, function (data) {
                    $('#txt_oracleLMD').val(data.insertados + ' / ' + data.total);
                    Swal.fire(
                        'Éxito',
                        'Registros LMD Oracle insertados: ' + data.insertados +
                        '<br>Total en tabla: ' + data.total,
                        'success'
                    );
                }).fail(function (xhr) {
                    Swal.fire('Error', xhr.responseJSON?.error || 'Error desconocido', 'error');
                });
            });

            // Oracle SP
            $('#btn_oracle_sp').click(function () {
                $.post("{{ route('oracle.sp') }}", {}, function (data) {
                    $('#txt_oracleSP').val(data.insertados + ' / ' + data.total);
                    Swal.fire(
                        'Éxito',
                        'Registros SP Oracle insertados: ' + data.insertados +
                        '<br>Total en tabla: ' + data.total,
                        'success'
                    );
                }).fail(function (xhr) {
                    Swal.fire('Error', xhr.responseJSON?.error || 'Error desconocido', 'error');
                });
            });

            // Oracle borrar registros
            $('#oracle_delete').click(function () {
                $.post("{{ route('oracle.delete') }}", {}, function (data) {
                    Swal.fire('Borrado', data.mensaje, 'success');
                    $('#txt_oracleLMD').val(0);
                    $('#txt_oracleSP').val(0);
                });
            });

            // Postgres Insertar LMD
            $('#btn_postgres_lmd').click(function () {
                $.post("{{ route('postgres.lmd') }}", $('#form').serialize(), function (data) {
                    if (data.error) {
                        Swal.fire('Error', data.error, 'error');
                        return;
                    }
                    // mostrar total en el input y alert con detalle
                    $('#txt_pgLMD').val(data.total);
                    Swal.fire({
                        title: 'Éxito LMD',
                        html: 'Insertados en esta ejecución: <b>' + data.insertados + '</b><br>Total en tabla: <b>' + data.total + '</b>',
                        icon: 'success'
                    });
                }).fail(function (xhr) {
                    console.error(xhr.responseText);
                    Swal.fire('Error', 'Error en la petición (revisa consola y laravel.log)', 'error');
                });
            });

            // Postgres Insertar SP
            $('#btn_postgres_sp').click(function () {
                $.post("{{ route('postgres.sp') }}", $('#form').serialize(), function (data) {
                    if (data.error) {
                        Swal.fire('Error', data.error, 'error');
                        return;
                    }
                    $('#txt_postgresSP').val(data.total);
                    Swal.fire({
                        title: 'Éxito SP',
                        html: 'Insertados en esta ejecución: <b>' + data.insertados + '</b><br>Total en tabla: <b>' + data.total + '</b>',
                        icon: 'success'
                    });
                }).fail(function (xhr) {
                    console.error(xhr.responseText);
                    Swal.fire('Error', 'Error en la petición (revisa consola y laravel.log)', 'error');
                });
            });

            // Postgres borrar registros
            $('#postgres_delete').click(function () {
                $.post("{{ route('postgres.delete') }}", {}, function (data) {
                    Swal.fire('Borrado', data.mensaje, 'success');
                    $('#txt_pgLMD').val(0);
                    $('#txt_postgresSP').val(0);
                });
            });

            // SQL Server LMD
            $('#btn_sqlsrv_lmd').click(function () {
                $.post("{{ route('sqlserver.lmd') }}", {}, function (data) {
                    $('#txt_sqlsrvLMD').val(data.insertados + ' / ' + data.total);
                    Swal.fire(
                        'Éxito',
                        'Registros LMD SQL Server insertados: ' + data.insertados +
                        '<br>Total en tabla: ' + data.total,
                        'success'
                    );
                }).fail(function (xhr) {
                    Swal.fire('Error', xhr.responseJSON?.error || 'Error desconocido', 'error');
                });
            });

            // SQL Server SP
            $('#btn_sqlsrv_sp').click(function () {
                $.post("{{ route('sqlserver.sp') }}", {}, function (data) {
                    $('#txt_sqlsrvSP').val(data.insertados + ' / ' + data.total);
                    Swal.fire(
                        'Éxito',
                        'Registros SP SQL Server insertados: ' + data.insertados +
                        '<br>Total en tabla: ' + data.total,
                        'success'
                    );
                }).fail(function (xhr) {
                    Swal.fire('Error', xhr.responseJSON?.error || 'Error desconocido', 'error');
                });
            });

            // SQL Server borrar registros
            $('#sqlserver_delete').click(function () {
                $.post("{{ route('sqlserver.delete') }}", {}, function (data) {
                    Swal.fire('Borrado', data.mensaje, 'success');
                    $('#txt_sqlserverLMD').val(0);
                    $('#txt_sqlserverSP').val(0);
                });
            });

            // MySQL LMD
            $('#btn_mysql_lmd').click(function () {
                $.post("{{ route('mysql.lmd') }}", {}, function (data) {
                    $('#txt_mysqlLMD').val(data.insertados + ' / ' + data.total);
                    Swal.fire(
                        'Éxito',
                        'Registros LMD MySQL insertados: ' + data.insertados +
                        '<br>Total en tabla: ' + data.total,
                        'success'
                    );
                }).fail(function (xhr) {
                    Swal.fire('Error', xhr.responseJSON?.error || 'Error desconocido', 'error');
                });
            });

            // MySQL SP
            $('#btn_mysql_sp').click(function () {
                $.post("{{ route('mysql.sp') }}", {}, function (data) {
                    $('#txt_mysqlSP').val(data.insertados + ' / ' + data.total);
                    Swal.fire(
                        'Éxito',
                        'Registros SP MySQL insertados: ' + data.insertados +
                        '<br>Total en tabla: ' + data.total,
                        'success'
                    );
                }).fail(function (xhr) {
                    Swal.fire('Error', xhr.responseJSON?.error || 'Error desconocido', 'error');
                });
            });

            // MySQL borrar registros
            $('#mysql_delete').click(function () {
                $.post("{{ route('mysql.delete') }}", {}, function (data) {
                    Swal.fire('Borrado', data.mensaje, 'success');
                    $('#txt_mysqlLMD').val(0);
                    $('#txt_mysqlSP').val(0);
                });
            });
            // Oracle Estado
            $('#oracle_statu').click(function () {
                $.post("{{ route('oracle.status') }}", {}, function (data) {
                    Swal.fire('Estado Oracle', data.mensaje, 'info');
                }).fail(function () {
                    Swal.fire('Error', 'No se pudo obtener el estado Oracle', 'error');
                });
            });

            // Postgres Estado
            $('#postgres_statu').click(function () {
                $.post("{{ route('postgres.status') }}", {}, function (data) {
                    Swal.fire('Estado Postgres', data.mensaje, 'info');
                }).fail(function () {
                    Swal.fire('Error', 'No se pudo obtener el estado Postgres', 'error');
                });
            });

            // SQL Server Estado
            $('#sqlserver_statu').click(function () {
                $.post("{{ route('sqlserver.status') }}", {}, function (data) {
                    Swal.fire('Estado SQL Server', data.mensaje, 'info');
                }).fail(function () {
                    Swal.fire('Error', 'No se pudo obtener el estado SQL Server', 'error');
                });
            });

            // MySQL Estado
            $('#mysql_statu').click(function () {
                $.post("{{ route('mysql.status') }}", {}, function (data) {
                    Swal.fire('Estado MySQL', data.mensaje, 'info');
                }).fail(function () {
                    Swal.fire('Error', 'No se pudo obtener el estado MySQL', 'error');
                });
            });

        });
    </script>
</body>
</html>