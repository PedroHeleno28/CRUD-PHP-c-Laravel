<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AutomotivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder will attempt to create a MySQL database named `Automotivos`
     * (if permissions allow), switch the runtime connection to it, run migrations
     * and insert sample data. It minimizes console output to avoid clutter.
     */
    public function run()
    {
        $dbName = 'Automotivos';

        $connection = config('database.default');
        $driver = config("database.connections.$connection.driver");

        if ($driver === 'mysql') {
            try {
                DB::statement("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                Config::set("database.connections.$connection.database", $dbName);
                DB::purge($connection);
                DB::reconnect($connection);
            } catch (\Exception $e) {
                // fail silently, user can create DB manually
            }
        }

        // Run migrations (force to avoid prompt) - minimize output
        try {
            Artisan::call('migrate', ['--force' => true]);
        } catch (\Exception $e) {
            // ignore migration errors here
        }

        // Truncate tables if they exist
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    } catch (\Exception $e) {
    }

        $tables = ['carros', 'modelos', 'cores', 'marcas', 'users'];
        foreach ($tables as $table) {
            if (DB::getSchemaBuilder()->hasTable($table)) {
                DB::table($table)->truncate();
            }
        }

        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        } catch (\Exception $e) {
        }

        // Insert sample data
        $fiat = DB::table('marcas')->insertGetId(['marca_nome' => 'Fiat', 'logo' => '', 'created_at' => now(), 'updated_at' => now()]);
        $vw = DB::table('marcas')->insertGetId(['marca_nome' => 'Volkswagen', 'logo' => '', 'created_at' => now(), 'updated_at' => now()]);
        $chev = DB::table('marcas')->insertGetId(['marca_nome' => 'Chevrolet', 'logo' => '', 'created_at' => now(), 'updated_at' => now()]);

        $branco = DB::table('cores')->insertGetId(['cor' => 'Branco', 'created_at' => now(), 'updated_at' => now()]);
        $preto = DB::table('cores')->insertGetId(['cor' => 'Preto', 'created_at' => now(), 'updated_at' => now()]);
        $prata = DB::table('cores')->insertGetId(['cor' => 'Prata', 'created_at' => now(), 'updated_at' => now()]);

        $modelo_uno = DB::table('modelos')->insertGetId(['modelo' => 'Uno', 'marca_id' => $fiat, 'foto' => '', 'created_at' => now(), 'updated_at' => now()]);
        $modelo_gol = DB::table('modelos')->insertGetId(['modelo' => 'Gol', 'marca_id' => $vw, 'foto' => '', 'created_at' => now(), 'updated_at' => now()]);
        $modelo_onix = DB::table('modelos')->insertGetId(['modelo' => 'Onix', 'marca_id' => $chev, 'foto' => '', 'created_at' => now(), 'updated_at' => now()]);

        if (DB::getSchemaBuilder()->hasTable('carros')) {
            DB::table('carros')->insert([
                ['marca_id' => $fiat, 'modelo_id' => $modelo_uno, 'cor_id' => $branco, 'preco' => 25000.00, 'km' => 120000, 'ano_fabricacao' => '2016', 'detalhes' => 'Ar condicionado', 'foto1' => '', 'foto2' => '', 'foto3' => '', 'created_at' => now(), 'updated_at' => now()],
                ['marca_id' => $vw, 'modelo_id' => $modelo_gol, 'cor_id' => $preto, 'preco' => 30000.00, 'km' => 90000, 'ano_fabricacao' => '2018', 'detalhes' => 'Direção hidráulica', 'foto1' => '', 'foto2' => '', 'foto3' => '', 'created_at' => now(), 'updated_at' => now()],
                ['marca_id' => $chev, 'modelo_id' => $modelo_onix, 'cor_id' => $prata, 'preco' => 45000.00, 'km' => 40000, 'ano_fabricacao' => '2020', 'detalhes' => 'Câmera de ré', 'foto1' => '', 'foto2' => '', 'foto3' => '', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        // Insert sample users if the users table exists
        if (DB::getSchemaBuilder()->hasTable('users')) {
            DB::table('users')->insert([
                [
                    'name' => 'Admin',
                    'email' => 'fatap46950@limtu.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('Teste1234'),
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],                
            ]);
        }

        // minimal console feedback
        try {
            $this->command->info('Seed completed.');
        } catch (\Exception $e) {
        }
    }
}
