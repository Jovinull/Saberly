<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $defaultImage = 'http://saberly.test/upload/category/695862e5ab7c7.jpg';

        // Você pode alterar/expandir esta lista quando quiser
        $names = [
            'Development',
            'Business',
            'Finance & Accounting',
            'IT & Software',
            'Office Productivity',
            'Personal Development',
            'Design',
            'Marketing',
            'Lifestyle',
            'Photography & Video',
            'Health & Fitness',
            'Music',
        ];

        $now = now();

        $data = collect($names)->map(function ($name) use ($defaultImage, $now) {
            return [
                'name' => $name,
                'slug' => Str::slug($name),
                'image' => $defaultImage,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        })->toArray();

        // Evita duplicar: se já existir o mesmo slug, atualiza nome/imagem/updated_at
        DB::table('categories')->upsert(
            $data,
            ['slug'],                     // chave única lógica
            ['name', 'image', 'updated_at'] // campos a atualizar se existir
        );
    }
}
