<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TiposUsuariosSeeders::class,
            TiposContratosSeeders::class,
            UserSeeders::class,
            DiasSeeders::class,
            JornadasSeeders::class,
            FacultadesSeeders::class,
            TiposProgramasSeeders::class,
            ModalidadesSeeders::class,
            JornadasAcademicasSeeders::class,
            SedesSeeders::class,
            SubsedesSeeders::class,
            TiposSalonesSeeders::class,
            FrecuenciasHorariasSeeders::class,
            ProgramasSeeders::class,
            SalonesSeeders::class,
            AsignaturasSeeders::class,
            AsigDocentesSeeders::class,
            GruposSeeders::class,
        ]);
    }
}
