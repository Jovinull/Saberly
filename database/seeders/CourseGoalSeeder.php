<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseGoalSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $courses = DB::table('courses')->select('id', 'course_name_slug', 'course_title')->get();

        $goalsMap = [
            'algoritmos-e-logica-de-programacao' => [
                'Entender o conceito de algoritmo e como aplicar lógica na resolução de problemas',
                'Praticar entrada/saída e operadores para construir programas básicos',
                'Aprender a pensar passo a passo e transformar problemas em soluções'
            ],
            'web-development-2025' => [
                'Criar páginas estruturadas com HTML semântico',
                'Estilizar layouts com CSS moderno',
                'Adicionar interatividade com JavaScript'
            ],
            'fundamentos-de-sql-e-banco-de-dados' => [
                'Compreender modelagem básica e relacionamento entre tabelas',
                'Escrever consultas SQL para selecionar, inserir, atualizar e remover dados',
                'Aplicar boas práticas de organização e consistência de dados'
            ],
            'git-e-github-do-zero-ao-profissional' => [
                'Versionar projetos com Git de forma segura',
                'Trabalhar com branches, merges e pull requests',
                'Adotar um fluxo de trabalho profissional com GitHub'
            ],
            'linux-essentials' => [
                'Navegar e manipular arquivos via terminal',
                'Entender permissões, processos e comandos essenciais',
                'Ganhar produtividade para desenvolvimento e deploy'
            ],
            'estruturas-de-dados-com-java' => [
                'Dominar arrays e estruturas lineares básicas',
                'Entender custo/complexidade e tomada de decisão de estrutura',
                'Implementar estruturas comuns em Java na prática'
            ],
        ];

        foreach ($courses as $course) {
            $slug = $course->course_name_slug;

            if (!isset($goalsMap[$slug])) {
                continue;
            }

            // Remove goals antigos desse curso para não duplicar ao rodar seed de novo
            DB::table('course_goals')->where('course_id', $course->id)->delete();

            $rows = [];
            foreach ($goalsMap[$slug] as $goal) {
                $rows[] = [
                    'course_id' => $course->id,
                    'goal_name' => $goal,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            DB::table('course_goals')->insert($rows);
        }
    }
}
