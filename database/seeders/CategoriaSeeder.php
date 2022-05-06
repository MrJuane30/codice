<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_publicacions')->insert([
            'nombre' => 'Avisos',
            'slug'=> Str::slug('Avisos'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categoria_publicacions')->insert([
            'nombre' => 'Ciencia',
            'slug'=> Str::slug('Ciencia'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categoria_publicacions')->insert([
            'nombre' => 'Educacion',
            'slug'=> Str::slug('Educacion'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categoria_publicacions')->insert([
            'nombre' => 'Opinion',
            'slug'=> Str::slug('Opinion'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categoria_publicacions')->insert([
            'nombre' => 'Noticias',
            'slug'=> Str::slug('Noticias'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('categoria_documentos')->insert([
            'nombre' => 'Documentos',
            'slug'=> Str::slug('documentos'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('categoria_documentos')->insert([
            'nombre' => 'Infografías',
            'slug'=> Str::slug('Infografias'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('categoria_documentos')->insert([
            'nombre' => 'Videos',
            'slug'=> Str::slug('Videos'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
