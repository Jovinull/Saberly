<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoBoxSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $rows = [
            [
                'icon' => <<<'SVG'
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                    <circle cx="8" cy="8" r="7" fill="none" stroke="currentColor" stroke-width="1.2"/>
                    <path d="M6.4 5.6v4.8L10.6 8 6.4 5.6z" fill="currentColor"/>
                    </svg>
                    SVG,
                'title' => 'Aulas em Vídeo',
                'description' => 'Aprenda com aulas organizadas, objetivas e focadas no que realmente importa.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icon' => <<<'SVG'
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                    <circle cx="8" cy="7" r="6" fill="none" stroke="currentColor" stroke-width="1.2"/>
                    <path d="M5.5 7.2l1.5 1.6L10.8 5.6" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.2 12.2l-.7 2.5 2-1.1 1.5.9 1.5-.9 2 1.1-.7-2.5" fill="none" stroke="currentColor" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    SVG,
                'title' => 'Certificado',
                'description' => 'Conclua o curso e gere seu certificado para comprovar suas habilidades.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icon' => <<<'SVG'
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                    <circle cx="8" cy="8" r="7" fill="none" stroke="currentColor" stroke-width="1.2"/>
                    <path d="M8 4.2v4.1l2.8 1.6" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    SVG,
                'title' => 'Acesso Flexível',
                'description' => 'Estude no seu ritmo, quando quiser, de qualquer lugar e dispositivo.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('info_boxes')->upsert(
            $rows,
            ['title'],
            ['icon', 'description', 'updated_at']
        );
    }
}
