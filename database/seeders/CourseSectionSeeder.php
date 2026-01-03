<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSectionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Mapa: course_name_slug => seções
        $sectionsMap = [
            'algoritmos-e-logica-de-programacao' => [
                'Boas-vindas e visão geral do curso',
                'Fundamentos de lógica e algoritmos',
                'Entrada, saída e operadores',
                'Operadores lógicos e relacionais',
                'Exercícios práticos guiados',
            ],
            'web-development-2025' => [
                'Introdução e setup do ambiente (VS Code)',
                'HTML: estrutura e semântica',
                'CSS: estilização e layout',
                'JavaScript: interatividade básica',
                'Projeto prático do zero',
            ],
            'fundamentos-de-sql-e-banco-de-dados' => [
                'Conceitos essenciais de banco de dados',
                'Modelagem: tabelas e relacionamentos',
                'SQL: SELECT e filtros',
                'SQL: INSERT, UPDATE e DELETE',
                'Boas práticas e exercícios',
            ],
            'git-e-github-do-zero-ao-profissional' => [
                'Introdução ao versionamento',
                'Git na prática: init, add, commit, log',
                'Branches e merges com segurança',
                'GitHub: repositório remoto e pull request',
                'Fluxo profissional e boas práticas',
            ],
            'linux-essentials' => [
                'Introdução ao Linux e terminal',
                'Arquivos, pastas e navegação',
                'Permissões e usuários',
                'Processos e serviços básicos',
                'Automação e produtividade no dia a dia',
            ],
            'estruturas-de-dados-com-java' => [
                'Introdução a estruturas de dados',
                'Vetores e arrays na prática',
                'Complexidade e eficiência (conceitos)',
                'Exercícios e implementações em Java',
                'Fechamento e próximos passos',
            ],
        ];

        // Busca os cursos existentes
        $courses = DB::table('courses')
            ->select('id', 'course_name_slug', 'course_title')
            ->get();

        foreach ($courses as $course) {
            $slug = $course->course_name_slug;

            $sectionTitles = $sectionsMap[$slug] ?? [
                'Introdução',
                'Fundamentos',
                'Conteúdo principal',
                'Projeto prático',
                'Conclusão',
            ];

            // Evita duplicação ao rodar seed novamente
            DB::table('course_sections')->where('course_id', $course->id)->delete();

            $rows = [];
            foreach ($sectionTitles as $title) {
                $rows[] = [
                    'course_id' => $course->id,
                    'section_title' => $title,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            DB::table('course_sections')->insert($rows);
        }
    }
}
