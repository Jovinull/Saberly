<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $defaultImage = 'http://saberly.test/upload/slider/695870522687e.jpg';
        $now = now();

        $rows = [
            [
                'title' => 'Introdução a Algoritmos - Curso de Algoritmos #01',
                'short_description' => 'Aula introdutória sobre o que são algoritmos, lógica e como começar a pensar em soluções passo a passo.',
                'video_url' => 'https://www.youtube.com/watch?v=8mei6uVttho',
                'image' => $defaultImage,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Primeiro Algoritmo - Curso de Algoritmos #02',
                'short_description' => 'Criação do primeiro algoritmo: estrutura básica, sequência lógica e prática inicial com exercícios.',
                'video_url' => 'https://www.youtube.com/watch?v=M2Af7gkbbro',
                'image' => $defaultImage,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Comando de Entrada e Operadores - Curso de Algoritmos #03',
                'short_description' => 'Entrada de dados, operadores aritméticos e fundamentos para construir algoritmos interativos.',
                'video_url' => 'https://www.youtube.com/watch?v=RDrfZ-7WE8c',
                'image' => $defaultImage,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Operadores Lógicos e Relacionais - Curso de Algoritmos #04',
                'short_description' => 'Entenda comparações, condições e lógica booleana para tomada de decisão em algoritmos.',
                'video_url' => 'https://www.youtube.com/watch?v=Ig4QZNpVZYs',
                'image' => $defaultImage,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Como Criar um Site do Zero em 2025 (Guia para Iniciantes)',
                'short_description' => 'Guia prático para iniciantes: conceitos, ferramentas e passos para criar um site do zero em 2025.',
                'video_url' => 'https://www.youtube.com/watch?v=kIImolG-C1M',
                'image' => $defaultImage,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Estrutura de Dados e Algoritmos com Java #01: Introdução',
                'short_description' => 'Introdução a estrutura de dados e como aplicar conceitos em Java para resolver problemas de forma eficiente.',
                'video_url' => 'https://www.youtube.com/watch?v=N3K8PjFOhy4',
                'image' => $defaultImage,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Estrutura de Dados e Algoritmos com Java #02: Vetores e Arrays: Introdução',
                'short_description' => 'Vetores e arrays em Java: conceito, uso na prática e base para estruturas mais avançadas.',
                'video_url' => 'https://www.youtube.com/watch?v=K5kaYF4ePS0',
                'image' => $defaultImage,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        /**
         * Como a tabela não tem slug e nem unique no schema,
         * vamos usar video_url como chave lógica de unicidade.
         * (recomendado: criar unique('video_url') na migration)
         */
        DB::table('sliders')->upsert(
            $rows,
            ['video_url'],
            ['title', 'short_description', 'image', 'updated_at']
        );
    }
}
