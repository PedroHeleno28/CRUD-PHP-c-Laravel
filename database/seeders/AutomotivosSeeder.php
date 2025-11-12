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
        $fiat = DB::table('marcas')->insertGetId(['marca_nome' => 'Fiat', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Fiat_logo.svg/1024px-Fiat_logo.svg.png', 'created_at' => now(), 'updated_at' => now()]);
        $vw = DB::table('marcas')->insertGetId(['marca_nome' => 'Volkswagen', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Volkswagen_logo_2019.svg/768px-Volkswagen_logo_2019.svg.png', 'created_at' => now(), 'updated_at' => now()]);
        $chev = DB::table('marcas')->insertGetId(['marca_nome' => 'Chevrolet', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/3e/Chevrolet_simple_logo.png', 'created_at' => now(), 'updated_at' => now()]);

        $branco = DB::table('cores')->insertGetId(['cor' => 'Branco', 'created_at' => now(), 'updated_at' => now()]);
        $preto = DB::table('cores')->insertGetId(['cor' => 'Preto', 'created_at' => now(), 'updated_at' => now()]);
        $prata = DB::table('cores')->insertGetId(['cor' => 'Prata', 'created_at' => now(), 'updated_at' => now()]);

        $modelo_uno = DB::table('modelos')->insertGetId(['modelo' => 'Uno', 'marca_id' => $fiat, 'foto' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdIqx1a4__QH_XIeQ-kwLuxOExz6pEQB3pgg&s', 'created_at' => now(), 'updated_at' => now()]);
        $modelo_gol = DB::table('modelos')->insertGetId(['modelo' => 'Gol', 'marca_id' => $vw, 'foto' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAipYC2_SULUlnsHTtXCzs84qRlH2g5tseWw&s', 'created_at' => now(), 'updated_at' => now()]);
        $modelo_onix = DB::table('modelos')->insertGetId(['modelo' => 'Onix', 'marca_id' => $chev, 'foto' => 'https://image1.mobiauto.com.br/images/api/images/v1.0/6127640/transform/fl_progressive,f_webp,q_80', 'created_at' => now(), 'updated_at' => now()]);

        if (DB::getSchemaBuilder()->hasTable('carros')) {
            DB::table('carros')->insert([
                ['marca_id' => $fiat, 'modelo_id' => $modelo_uno, 'cor_id' => $branco, 'preco' => 25000.00, 'km' => 120000, 'ano_fabricacao' => '2016', 'detalhes' => 'Ar condicionado', 'foto1' => 'https://www.infomoney.com.br/wp-content/uploads/2019/06/fiat-uno-vivace.jpg?fit=900%2C572&quality=50&strip=all', 'foto2' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQA1GVmg7KEaSE9DUhMlH982e918yFWDNMgcg&s', 'foto3' => 'https://s3.ecompletocarros.dev/images/lojas/274/veiculos/192166/veiculoInfoVeiculoImagesMobile/vehicle_image_1715600152_032b2cc936860b03048302d991c3498f.jpeg', 'created_at' => now(), 'updated_at' => now()],
                ['marca_id' => $vw, 'modelo_id' => $modelo_gol, 'cor_id' => $preto, 'preco' => 30000.00, 'km' => 90000, 'ano_fabricacao' => '2018', 'detalhes' => 'Direção hidráulica', 'foto1' => 'https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202509/20250924/VOLKSWAGEN-GOL-1.0-12V-MPI-TOTALFLEX-TRACK-4P-MANUAL-wmimagem07170169030.jpg', 'foto2' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_gx8tolLkNsU8_KT_SCyjhQ48hwNgu-eHGA&s', 'foto3' => 'https://cdn.motor1.com/images/mgl/zeOjb/s1/vw-gol-por-kleber-pinho-da-silva.jpg', 'created_at' => now(), 'updated_at' => now()],
                ['marca_id' => $chev, 'modelo_id' => $modelo_onix, 'cor_id' => $prata, 'preco' => 45000.00, 'km' => 40000, 'ano_fabricacao' => '2020', 'detalhes' => 'Câmera de ré', 'foto1' => 'https://image1.mobiauto.com.br/images/api/images/v1.0/6127640/transform/fl_progressive,f_webp,q_80', 'foto2' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJi2B4KNnXpoih-tZNhMKB0rZoqOiS7CudDg&s', 'foto3' => 'https://cdn.autopapo.com.br/box/uploads/2020/03/18195344/painel-do-chevrolet-onix-2020-hatch.jpg', 'created_at' => now(), 'updated_at' => now()],
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
