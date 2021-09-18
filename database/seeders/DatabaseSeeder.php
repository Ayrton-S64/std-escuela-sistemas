<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Tipo de Tramites-------------------------------------------------------------------------------------------------------

        DB::table('tipo_tramites')->insert([
            'descripcion'=>'FORMATO DE UNICO DE TRAMITES(FUT)',
            'ruta' =>'formatos/FUT2020.docx' ,
            'nombreArchivo' => 'FUT2020.docx',
            'Requisitos' => '',
        ]);

        DB::table('tipo_tramites')->insert([
            'descripcion' =>'FICHA DE MATRICULA' ,
            'ruta' =>'formatos/FICHA MATRICULA MANUAL 2020-1.xls' ,
            'nombreArchivo' => 'FICHA MATRICULA MANUAL 2020-1.xls',
            'Requisitos' => '',
        ]);

        DB::table('tipo_tramites')->insert([
            'descripcion' =>'FORMATO DE APERTURA CICLO VACIONAL POR EXCEPCION(2021)' ,
            'ruta' =>'formatos/FORMATO DE APERTURA DE CURSO CICLO VACACIONAL POR EXCEPCION(2021).docx',
            'nombreArchivo' => 'FORMATO DE APERTURA DE CURSO CICLO VACACIONAL POR EXCEPCION(2021).docx',
            'Requisitos' => '',
        ]);

        DB::table('tipo_tramites')->insert([
            'descripcion' =>'FORMATO DE APERTURA CICLO VACIONAL(2021)' ,
            'ruta' =>'formatos/FORMATO DE APERTURA DE CURSOS CICLO VACACIONAL(2021).docx' ,
            'nombreArchivo' => 'FORMATO DE APERTURA DE CURSOS CICLO VACACIONAL(2021).docx',
            'Requisitos' => '',
        ]);

        DB::table('tipo_tramites')->insert([
            'descripcion' =>'REGULARIZACION DE MATRICULA' ,
            'ruta' =>'formatos/FUT2020.docx' ,
            'nombreArchivo' => 'FUT2020.docx',
            'Requisitos' => 'FUT, indicando: “REGULARIZACIÓN DE MATRÍCULA” más voucher S/20 ,FICHA AUXILIAR DE MATRÍCULA y si fuera el caso los vouchers de los pagos realizados por 2da. 3ra., 4ta matrícula, un voucher por cada concepto, en un solo documento en formato pdf.',
        ]);

        DB::table('tipo_tramites')->insert([
            'descripcion' =>'AMPLIACION DE CREDITOS POR PROMEDIO PONDERADO' ,
            'ruta' =>'formatos/FUT2020.docx' ,
            'nombreArchivo' => 'FUT2020.docx',
            'Requisitos' => 'FUT, indicando el curso que se va a agregar, Historial académico del SGA, Vaucher de 20 Soles, Ficha de Matricula computarizada de cursos.',
        ]);

        DB::table('tipo_tramites')->insert([
            'descripcion' =>'AMPLIACION DE CREDITOS POR FINALIZACION DE CARRERA' ,
            'ruta' =>'formatos/FUT2020.docx' ,
            'nombreArchivo' => 'FUT2020.docx',
            'Requisitos' => 'FUT, indicando el curso que se va a agregar, Historial académico del SGA, Vaucher de 20 Soles, Ficha de Matricula computarizada de cursos.',
        ]);

        DB::table('tipo_tramites')->insert([
            'descripcion' =>'EXAMEN DE SUFICIENCIA(Nivelación)' ,
            'ruta' =>'formatos/Grupos de Trabajos y exposiciones.xlsx' ,
            'nombreArchivo' => 'Grupos de Trabajos y exposiciones.xlsx',
            'Requisitos' => 'FUT, indicando el curso que se va a agregar, Historial académico del SGA, Voucher de Matricula cancelada,Voucher de Examen de suficiencia de 90 soles ,Ficha de Matricula computarizada de cursos.Declaracion Jurada indicando el curso y motivo ',
        ]);

        DB::table('tipo_tramites')->insert([
            'descripcion' =>'EXAMEN DE SUFICIENCIA(Finalizacion de Carrera)' ,
            'ruta' =>'formatos/PONENCIAS POR EL ANIVERSARIO-FAC. INGENIERÍA.pdf' ,
            'nombreArchivo' => 'PONENCIAS POR EL ANIVERSARIO-FAC. INGENIERÍA.pdf',
            'Requisitos' => 'FUT, indicando el curso que se va a agregar, Historial académico del SGA, Voucher de Matricula cancelada,Voucher de Examen de suficiencia de 90 soles ,Ficha de Matricula computarizada de cursos.Declaracion Jurada indicando el curso y motivo ',
        ]);

        // Estados-------------------------------------------------------------------------------------------------------
        DB::table('estado_tramites')->insert([

            'descripcion'=>'PENDIENTE'
        ]);
        DB::table('estado_tramites')->insert([

            'descripcion'=>'ACEPTADO'
        ]);
        DB::table('estado_tramites')->insert([
            'descripcion'=>'RECHAZADO'
        ]);

        // Tipo de Usuario-------------------------------------------------------------------------------------------------------
        DB::table('tipo_usuario')->insert([
            'descripcion'=>'Alumno'
        ]);

        DB::table('tipo_usuario')->insert([
            'descripcion'=>'Administrativo'
        ]);


        // Usuarios-------------------------------------------------------------------------------------------------------

        DB::table('users')->insert([
            'name'=>'Jose Delgado Deza',
            'email' => 'jose@unitru.edu.pe',
            'tipoUsuario' => 1 ,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        DB::table('users')->insert([
            'name'=>'Ayrton Oscar Alfonso Soto Alarcon',
            'email' => 'ayrton@unitru.edu.pe',
            'tipoUsuario' => 1 ,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        DB::table('users')->insert([
            'name'=>'Kenner Alexander Rojas Ahumada',
            'email' => 'kenner@unitru.edu.pe',
            'tipoUsuario' => 1 ,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        DB::table('users')->insert([
            'name'=>'Evellyn Milles Guevara Vega',
            'email' => 'evellyn@unitru.edu.pe',
            'tipoUsuario' => 1 ,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        DB::table('users')->insert([
            'name'=>'SECRETARIA',
            'email' => 'secre@unitru.edu.pe',
            'tipoUsuario' => 2 ,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
    }
}
