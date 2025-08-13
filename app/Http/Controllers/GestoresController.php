<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GestoresController extends Controller
{
    public function index()
    {
        return view('velocidad'); // Aquí crearemos la vista
    }

    public function oracleLmd(Request $request)
    {
        @set_time_limit(0);
        $contador = 0;
        $fecha = $request->input('fecha', '2022-12-12');
        $horaFin = strtotime('+15 seconds');

        while (time() <= $horaFin) {
            try {
                DB::connection('oracle')->table('producto')->insert([
                    'id_producto' => $request->input('id_producto', 1),
                    'descripcion' => $request->input('descripcion', 'Computadora'),
                    'precio' => $request->input('precio', 1000),
                    'fecha' => $fecha,
                ]);
                $contador++;
            } catch (\Exception $e) {
                \Log::error('Error Oracle LMD: ' . $e->getMessage());
                return response()->json(['error' => 'Error Oracle LMD: ' . $e->getMessage()], 500);
            }
        }

        $total = DB::connection('oracle')->table('producto')->count();

        return response()->json([
            'insertados' => $contador,
            'total' => $total,
        ]);
    }

    public function oracleSp(Request $request)
    {
        @set_time_limit(0);
        $contador = 0;
        $fecha = $request->input('fecha', '2022-12-12');
        $horaFin = strtotime('+15 seconds');

        while (time() <= $horaFin) {
            try {
                DB::connection('oracle')->statement(
                    'BEGIN pa_insertarproducto(:p1, :p2, :p3, :p4); END;',
                    [
                        $request->input('id_producto', 1),
                        $request->input('descripcion', 'Computadora'),
                        $request->input('precio', 1000),
                        $fecha
                    ]
                );
                $contador++;
            } catch (\Exception $e) {
                \Log::error('Error Oracle SP: ' . $e->getMessage());
                return response()->json(['error' => 'Error Oracle SP: ' . $e->getMessage()], 500);
            }
        }

        $total = DB::connection('oracle')->table('producto')->count();

        return response()->json([
            'insertados' => $contador,
            'total' => $total,
        ]);
    }

    public function oracleDelete(Request $request)
    {
        try {
            DB::connection('oracle')->statement('DELETE FROM producto');
            // También podrías usar: DB::connection('oracle')->table('producto2')->truncate();
            return response()->json(['mensaje' => 'Registros Oracle borrados']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error Oracle Delete: ' . $e->getMessage()], 500);
        }
    }

    public function postgresLmd(Request $request)
    {
        @set_time_limit(0);
        $contador = 0;
        $fecha = $request->input('fecha', '2022-12-12');
        $horaFin = strtotime('+15 seconds');
        while (time() <= $horaFin) {
            try {
                DB::connection('pgsql')->table('producto')->insert([
                    'id_producto' => $request->input('id_producto', 1),
                    'descripcion' => $request->input('descripcion', 'Computadora'),
                    'precio' => $request->input('precio', 1000),
                    'fecha' => $fecha,
                ]);
                $contador++;
            } catch (\Exception $e) {
                \Log::error('Error Postgres LMD: ' . $e->getMessage());
                return response()->json(['error' => 'Error Postgres LMD: ' . $e->getMessage()], 500);
            }
        }

        try {
            $total = DB::connection('pgsql')->table('producto')->count();
        } catch (\Exception $e) {
            \Log::error('Error contando Postgres: ' . $e->getMessage());
            return response()->json(['error' => 'Error al contar registros: ' . $e->getMessage()], 500);
        }

        return response()->json([
            'insertados' => $contador,
            'total' => $total,
        ]);
    }

    public function postgresSp(Request $request)
    {
        @set_time_limit(0);
        $contador = 0;
        $fecha = $request->input('fecha', '2022-12-12');
        $horaFin = strtotime('+15 seconds');
        while (time() <= $horaFin) {
            try {
                DB::connection('pgsql')->statement(
                    'CALL PA_INSERTARPRODUCTO(?, ?, ?, ?)',
                    [
                        $request->input('id_producto', 1),
                        $request->input('descripcion', 'Computadora'),
                        $request->input('precio', 1000),
                        $fecha
                    ]
                );
                $contador++;
            } catch (\Exception $e) {
                \Log::error('Error Postgres SP: ' . $e->getMessage());
                return response()->json(['error' => 'Error Postgres SP: ' . $e->getMessage()], 500);
            }
        }

        try {
            $total = DB::connection('pgsql')->table('producto')->count();
        } catch (\Exception $e) {
            \Log::error('Error contando Postgres SP: ' . $e->getMessage());
            return response()->json(['error' => 'Error al contar registros: ' . $e->getMessage()], 500);
        }

        return response()->json([
            'insertados' => $contador,
            'total' => $total,
        ]);
    }

    public function postgresDelete(Request $request)
    {
        try {
            DB::connection('pgsql')->table('producto')->truncate();
            return response()->json(['mensaje' => 'Registros Postgres borrados']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error Postgres Delete: ' . $e->getMessage()], 500);
        }
    }

    public function sqlserverLmd(Request $request)
    {
        @set_time_limit(0);
        $contador = 0;
        $fecha = $request->input('fecha', '2022-12-12');
        $horaFin = time() + 15; // CORREGIDO

        while (time() <= $horaFin) {
            try {
                DB::connection('sqlsrv')->table('producto')->insert([
                    'id_producto' => $request->input('id_producto', 1),
                    'descripcion' => $request->input('descripcion', 'Computadora'),
                    'precio' => $request->input('precio', 1000),
                    'fecha' => $fecha,
                ]);
                $contador++;
                usleep(100000);
            } catch (\Exception $e) {
                \Log::error('Error SQL Server LMD: ' . $e->getMessage());
                return response()->json(['error' => 'Error SQL Server LMD: ' . $e->getMessage()], 500);
            }
        }

        $total = DB::connection('sqlsrv')->table('producto')->count();

        return response()->json([
            'insertados' => $contador,
            'total' => $total,
        ]);
    }

    public function sqlserverSp(Request $request)
    {
        @set_time_limit(0);
        $contador = 0;
        $fecha = $request->input('fecha', '2022-12-12');
        $horaFin = time() + 15;  // <-- Aquí la diferencia importante

        while (time() <= $horaFin) {
            try {
                DB::connection('sqlsrv')->statement(
                    'EXEC dbo.pa_insertarproducto ?, ?, ?, ?',
                    [
                        $request->input('id_producto', 1),
                        $request->input('descripcion', 'Computadora'),
                        $request->input('precio', 1000),
                        $fecha
                    ]
                );
                $contador++;
                usleep(200000); // opcional para no saturar la DB
            } catch (\Exception $e) {
                \Log::error('Error SQL Server SP: ' . $e->getMessage());
                return response()->json(['error' => 'Error SQL Server SP: ' . $e->getMessage()], 500);
            }
        }

        $total = DB::connection('sqlsrv')->table('producto')->count();

        return response()->json([
            'insertados' => $contador,
            'total' => $total,
        ]);
    }

    public function sqlserverDelete(Request $request)
    {
        try {
            DB::connection('sqlsrv')->statement('TRUNCATE TABLE producto');
            return response()->json(['mensaje' => 'Registros SQL Server borrados']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error SQL Server Delete: ' . $e->getMessage()], 500);
        }
    }

    public function mysqlLmd(Request $request)
    {
        @set_time_limit(0);
        $contador = 0;
        $fecha = $request->input('fecha', '2022-12-12');
        $horaFin = strtotime('+15 seconds');

        while (time() <= $horaFin) {
            try {
                DB::connection('mysql')->table('producto')->insert([
                    'id_producto' => $request->input('id_producto', 1),
                    'descripcion' => $request->input('descripcion', 'Computadora'),
                    'precio' => $request->input('precio', 1000),
                    'fecha' => $fecha,
                ]);
                $contador++;
            } catch (\Exception $e) {
                \Log::error('Error MySQL LMD: ' . $e->getMessage());
                return response()->json(['error' => 'Error MySQL LMD: ' . $e->getMessage()], 500);
            }
        }

        $total = DB::connection('mysql')->table('producto')->count();

        return response()->json([
            'insertados' => $contador,
            'total' => $total,
        ]);
    }

    public function mysqlSp(Request $request)
    {
        @set_time_limit(0);
        $contador = 0;
        $fecha = $request->input('fecha', '2022-12-12');
        $horaFin = strtotime('+15 seconds');

        while (time() <= $horaFin) {
            try {
                DB::connection('mysql')->statement(
                    'CALL pa_insertarproducto(?, ?, ?, ?)',
                    [
                        $request->input('id_producto', 1),
                        $request->input('descripcion', 'Computadora'),
                        $request->input('precio', 1000),
                        $fecha
                    ]
                );
                $contador++;
            } catch (\Exception $e) {
                \Log::error('Error MySQL SP: ' . $e->getMessage());
                return response()->json(['error' => 'Error MySQL SP: ' . $e->getMessage()], 500);
            }
        }

        $total = DB::connection('mysql')->table('producto')->count();

        return response()->json([
            'insertados' => $contador,
            'total' => $total,
        ]);
    }

    public function mysqlDelete(Request $request)
    {
        try {
            DB::connection('mysql')->table('producto')->truncate();
            return response()->json(['mensaje' => 'Registros MySQL borrados']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error MySQL Delete: ' . $e->getMessage()], 500);
        }
    }

    public function oracleStatus()
    {
        try {
            \DB::connection('oracle')->getPdo();
            $mensaje = 'Conexión Oracle OK';
        } catch (\Exception $e) {
            $mensaje = 'Error conexión Oracle: ' . $e->getMessage();
        }

        return response()->json(['mensaje' => $mensaje]);
    }

    public function postgresStatus()
    {
        try {
            \DB::connection('pgsql')->getPdo();
            $mensaje = 'Conexión Postgres OK';
        } catch (\Exception $e) {
            $mensaje = 'Error conexión Postgres: ' . $e->getMessage();
        }

        return response()->json(['mensaje' => $mensaje]);
    }

    public function sqlserverStatus()
    {
        try {
            \DB::connection('sqlsrv')->getPdo();
            $mensaje = 'Conexión SQL Server OK';
        } catch (\Exception $e) {
            $mensaje = 'Error conexión SQL Server: ' . $e->getMessage();
        }

        return response()->json(['mensaje' => $mensaje]);
    }

    public function mysqlStatus()
    {
        try {
            \DB::connection('mysql')->getPdo();
            $mensaje = 'Conexión MySQL OK';
        } catch (\Exception $e) {
            $mensaje = 'Error conexión MySQL: ' . $e->getMessage();
        }

        return response()->json(['mensaje' => $mensaje]);
    }
}