<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseLectureSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Mapas (id -> slug) para descobrir o contexto do curso
        $categoriesById = DB::table('categories')->select('id', 'slug')->get()->keyBy('id');
        $subCategoriesById = DB::table('sub_categories')->select('id', 'slug', 'category_id')->get()->keyBy('id');

        // Cursos existentes
        $courses = DB::table('courses')
            ->select('id', 'course_name_slug', 'course_title', 'course_name', 'category_id', 'subcategory_id', 'status', 'video_url')
            ->get();

        /**
         * Templates por category_slug + subcategory_slug
         * Cada seção recebe 3 aulas (variedade e consistência).
         */
        $templates = [
            'development' => [
                'programming-languages' => [
                    ['base' => 'Conceitos-chave e exemplos', 'duration' => 8.50],
                    ['base' => 'Mão na massa: implementando', 'duration' => 10.25],
                    ['base' => 'Exercícios e revisão', 'duration' => 7.75],
                ],
                'web-development' => [
                    ['base' => 'Teoria e demonstração', 'duration' => 8.00],
                    ['base' => 'Hands-on: construindo junto', 'duration' => 11.00],
                    ['base' => 'Boas práticas e ajustes finais', 'duration' => 7.50],
                ],
                'databases' => [
                    ['base' => 'Conceitos e fundamentos', 'duration' => 8.25],
                    ['base' => 'Prática com consultas e exemplos', 'duration' => 10.50],
                    ['base' => 'Desafios e fixação', 'duration' => 7.25],
                ],
                'mobile-development' => [
                    ['base' => 'Visão geral e setup', 'duration' => 8.00],
                    ['base' => 'Construindo features na prática', 'duration' => 11.50],
                    ['base' => 'Revisão, padrões e organização', 'duration' => 7.50],
                ],
                'game-development' => [
                    ['base' => 'Fundamentos do projeto', 'duration' => 8.50],
                    ['base' => 'Implementação prática (hands-on)', 'duration' => 11.75],
                    ['base' => 'Polimento, testes e revisão', 'duration' => 7.25],
                ],
                '__default' => [
                    ['base' => 'Introdução e objetivos', 'duration' => 7.50],
                    ['base' => 'Conteúdo principal (prática guiada)', 'duration' => 10.00],
                    ['base' => 'Revisão e próximos passos', 'duration' => 6.50],
                ],
            ],

            'business' => [
                'entrepreneurship' => [
                    ['base' => 'Fundamentos e mentalidade', 'duration' => 7.00],
                    ['base' => 'Validação e MVP na prática', 'duration' => 9.50],
                    ['base' => 'Plano de ação e revisão', 'duration' => 6.50],
                ],
                'management' => [
                    ['base' => 'Rotina e processos', 'duration' => 7.50],
                    ['base' => 'Execução com método', 'duration' => 9.75],
                    ['base' => 'Indicadores e melhoria', 'duration' => 6.75],
                ],
                'communication' => [
                    ['base' => 'Clareza e estrutura', 'duration' => 7.00],
                    ['base' => 'Prática aplicada (reuniões e mensagens)', 'duration' => 9.00],
                    ['base' => 'Feedback e revisão', 'duration' => 6.50],
                ],
                'sales' => [
                    ['base' => 'Funil e prospecção', 'duration' => 7.25],
                    ['base' => 'Objeções e fechamento', 'duration' => 9.25],
                    ['base' => 'Rotina e melhoria contínua', 'duration' => 6.50],
                ],
                'strategy' => [
                    ['base' => 'Objetivos e prioridades', 'duration' => 7.50],
                    ['base' => 'Plano tático e execução', 'duration' => 9.50],
                    ['base' => 'Análise e ajustes', 'duration' => 6.50],
                ],
                '__default' => [
                    ['base' => 'Introdução', 'duration' => 6.50],
                    ['base' => 'Prática guiada', 'duration' => 8.50],
                    ['base' => 'Revisão', 'duration' => 6.00],
                ],
            ],

            'finance-accounting' => [
                'personal-finance' => [
                    ['base' => 'Diagnóstico e organização', 'duration' => 6.75],
                    ['base' => 'Plano e execução na prática', 'duration' => 9.00],
                    ['base' => 'Revisão e hábitos', 'duration' => 6.25],
                ],
                'accounting' => [
                    ['base' => 'Conceitos e estrutura', 'duration' => 7.25],
                    ['base' => 'Lançamentos e exemplos', 'duration' => 9.50],
                    ['base' => 'Exercícios e revisão', 'duration' => 6.75],
                ],
                'investing' => [
                    ['base' => 'Risco, retorno e diversificação', 'duration' => 7.00],
                    ['base' => 'Produtos e estratégias', 'duration' => 9.25],
                    ['base' => 'Montando um plano básico', 'duration' => 6.50],
                ],
                'financial-modeling' => [
                    ['base' => 'Estrutura do modelo', 'duration' => 8.00],
                    ['base' => 'Cenários e indicadores', 'duration' => 10.50],
                    ['base' => 'Boas práticas e revisão', 'duration' => 7.00],
                ],
                'taxes' => [
                    ['base' => 'Noções e organização', 'duration' => 6.50],
                    ['base' => 'Rotina prática e checklists', 'duration' => 8.75],
                    ['base' => 'Revisão e próximos passos', 'duration' => 6.25],
                ],
                '__default' => [
                    ['base' => 'Introdução', 'duration' => 6.50],
                    ['base' => 'Prática guiada', 'duration' => 9.00],
                    ['base' => 'Revisão', 'duration' => 6.00],
                ],
            ],

            'it-software' => [
                'devops' => [
                    ['base' => 'Fundamentos e fluxo', 'duration' => 7.75],
                    ['base' => 'Prática e automação', 'duration' => 10.25],
                    ['base' => 'Boas práticas e revisão', 'duration' => 6.75],
                ],
                'operating-systems' => [
                    ['base' => 'Conceitos e terminal', 'duration' => 7.50],
                    ['base' => 'Prática com comandos e rotinas', 'duration' => 10.00],
                    ['base' => 'Automação e produtividade', 'duration' => 7.00],
                ],
                'network-security' => [
                    ['base' => 'Fundamentos de rede', 'duration' => 8.25],
                    ['base' => 'Segurança aplicada', 'duration' => 10.00],
                    ['base' => 'Revisão e exercícios', 'duration' => 7.25],
                ],
                'cloud-computing' => [
                    ['base' => 'Conceitos de cloud', 'duration' => 8.00],
                    ['base' => 'Deploy e prática guiada', 'duration' => 10.75],
                    ['base' => 'Escalabilidade e revisão', 'duration' => 7.00],
                ],
                'it-certification' => [
                    ['base' => 'Plano de estudos', 'duration' => 6.50],
                    ['base' => 'Questões e revisão', 'duration' => 8.50],
                    ['base' => 'Simulados e estratégia', 'duration' => 6.25],
                ],
                '__default' => [
                    ['base' => 'Introdução', 'duration' => 6.50],
                    ['base' => 'Prática guiada', 'duration' => 9.00],
                    ['base' => 'Revisão', 'duration' => 6.00],
                ],
            ],

            'office-productivity' => [
                'microsoft-office' => [
                    ['base' => 'Fundamentos e organização', 'duration' => 7.25],
                    ['base' => 'Fórmulas e prática guiada', 'duration' => 10.00],
                    ['base' => 'Relatórios e revisão', 'duration' => 6.75],
                ],
                'google-workspace' => [
                    ['base' => 'Drive e organização', 'duration' => 6.75],
                    ['base' => 'Docs/Sheets na prática', 'duration' => 9.25],
                    ['base' => 'Fluxos e produtividade', 'duration' => 6.75],
                ],
                'project-management' => [
                    ['base' => 'Fluxo e organização', 'duration' => 6.50],
                    ['base' => 'Rotina e execução', 'duration' => 8.50],
                    ['base' => 'Revisão e melhoria', 'duration' => 6.25],
                ],
                '__default' => [
                    ['base' => 'Introdução', 'duration' => 6.50],
                    ['base' => 'Prática guiada', 'duration' => 8.50],
                    ['base' => 'Revisão', 'duration' => 6.00],
                ],
            ],

            'personal-development' => [
                'productivity' => [
                    ['base' => 'Diagnóstico e método', 'duration' => 6.75],
                    ['base' => 'Rotina e execução prática', 'duration' => 9.00],
                    ['base' => 'Revisão e consistência', 'duration' => 6.25],
                ],
                'leadership' => [
                    ['base' => 'Comunicação e alinhamento', 'duration' => 7.00],
                    ['base' => 'Feedback e acompanhamento', 'duration' => 9.00],
                    ['base' => 'Plano de aplicação', 'duration' => 6.50],
                ],
                'career-development' => [
                    ['base' => 'Currículo e posicionamento', 'duration' => 7.00],
                    ['base' => 'Portfólio e prática guiada', 'duration' => 9.25],
                    ['base' => 'Entrevistas e revisão', 'duration' => 6.50],
                ],
                'personal-growth' => [
                    ['base' => 'Hábitos e metas', 'duration' => 6.50],
                    ['base' => 'Disciplina na prática', 'duration' => 8.75],
                    ['base' => 'Revisão e continuidade', 'duration' => 6.25],
                ],
                '__default' => [
                    ['base' => 'Introdução', 'duration' => 6.50],
                    ['base' => 'Prática guiada', 'duration' => 8.50],
                    ['base' => 'Revisão', 'duration' => 6.00],
                ],
            ],

            'design' => [
                'graphic-design' => [
                    ['base' => 'Fundamentos visuais', 'duration' => 7.50],
                    ['base' => 'Prática guiada (composição)', 'duration' => 10.00],
                    ['base' => 'Refino e revisão', 'duration' => 6.75],
                ],
                'ux-ui' => [
                    ['base' => 'Wireframes e estrutura', 'duration' => 8.00],
                    ['base' => 'Componentes e design system', 'duration' => 10.50],
                    ['base' => 'Prototipação e revisão', 'duration' => 7.00],
                ],
                '3d-animation' => [
                    ['base' => 'Modelagem e materiais', 'duration' => 7.75],
                    ['base' => 'Iluminação e render', 'duration' => 10.00],
                    ['base' => 'Revisão e projeto', 'duration' => 7.00],
                ],
                'design-tools' => [
                    ['base' => 'Workflow e fundamentos', 'duration' => 7.25],
                    ['base' => 'Hands-on: construindo telas', 'duration' => 10.25],
                    ['base' => 'Revisão e boas práticas', 'duration' => 6.75],
                ],
                '__default' => [
                    ['base' => 'Introdução', 'duration' => 6.50],
                    ['base' => 'Prática guiada', 'duration' => 9.00],
                    ['base' => 'Revisão', 'duration' => 6.00],
                ],
            ],

            'marketing' => [
                'digital-marketing' => [
                    ['base' => 'Estratégia e posicionamento', 'duration' => 7.50],
                    ['base' => 'Conteúdo e execução', 'duration' => 9.75],
                    ['base' => 'Métricas e revisão', 'duration' => 6.75],
                ],
                'seo' => [
                    ['base' => 'Fundamentos de SEO', 'duration' => 7.50],
                    ['base' => 'SEO na prática (on-page/técnico)', 'duration' => 10.00],
                    ['base' => 'Checklist e revisão', 'duration' => 6.75],
                ],
                'content-marketing' => [
                    ['base' => 'Planejamento editorial', 'duration' => 7.25],
                    ['base' => 'Produção e consistência', 'duration' => 9.50],
                    ['base' => 'Distribuição e revisão', 'duration' => 6.50],
                ],
                'social-media-marketing' => [
                    ['base' => 'Estratégia e formatos', 'duration' => 7.25],
                    ['base' => 'Produção prática', 'duration' => 9.75],
                    ['base' => 'Métricas e revisão', 'duration' => 6.50],
                ],
                'branding' => [
                    ['base' => 'Posicionamento e identidade', 'duration' => 7.50],
                    ['base' => 'Consistência aplicada', 'duration' => 9.50],
                    ['base' => 'Revisão e próximos passos', 'duration' => 6.75],
                ],
                '__default' => [
                    ['base' => 'Introdução', 'duration' => 6.50],
                    ['base' => 'Prática guiada', 'duration' => 9.00],
                    ['base' => 'Revisão', 'duration' => 6.00],
                ],
            ],

            'lifestyle' => [
                'travel' => [
                    ['base' => 'Planejamento e organização', 'duration' => 6.50],
                    ['base' => 'Roteiros na prática', 'duration' => 8.75],
                    ['base' => 'Checklists e revisão', 'duration' => 6.00],
                ],
                'food-beverage' => [
                    ['base' => 'Organização e fundamentos', 'duration' => 6.75],
                    ['base' => 'Receitas e prática guiada', 'duration' => 9.00],
                    ['base' => 'Rotina e revisão', 'duration' => 6.25],
                ],
                'arts-crafts' => [
                    ['base' => 'Materiais e técnicas', 'duration' => 6.50],
                    ['base' => 'Projetos guiados', 'duration' => 8.75],
                    ['base' => 'Acabamento e revisão', 'duration' => 6.25],
                ],
                'beauty-makeup' => [
                    ['base' => 'Preparação e base', 'duration' => 6.50],
                    ['base' => 'Técnicas na prática', 'duration' => 8.50],
                    ['base' => 'Finalização e revisão', 'duration' => 6.00],
                ],
                '__default' => [
                    ['base' => 'Introdução', 'duration' => 6.50],
                    ['base' => 'Prática guiada', 'duration' => 8.50],
                    ['base' => 'Revisão', 'duration' => 6.00],
                ],
            ],

            'photography-video' => [
                'photography' => [
                    ['base' => 'Luz e composição', 'duration' => 7.50],
                    ['base' => 'Prática no modo manual', 'duration' => 10.00],
                    ['base' => 'Exercícios e revisão', 'duration' => 7.00],
                ],
                'video-editing' => [
                    ['base' => 'Workflow e timeline', 'duration' => 7.75],
                    ['base' => 'Cortes, ritmo e áudio', 'duration' => 10.25],
                    ['base' => 'Exportação e revisão', 'duration' => 6.75],
                ],
                'filmmaking' => [
                    ['base' => 'Roteiro e planejamento', 'duration' => 7.50],
                    ['base' => 'Captação e direção', 'duration' => 10.00],
                    ['base' => 'Checklist e revisão', 'duration' => 6.75],
                ],
                '__default' => [
                    ['base' => 'Introdução', 'duration' => 6.50],
                    ['base' => 'Prática guiada', 'duration' => 9.00],
                    ['base' => 'Revisão', 'duration' => 6.00],
                ],
            ],

            'health-fitness' => [
                'fitness' => [
                    ['base' => 'Técnica e segurança', 'duration' => 6.75],
                    ['base' => 'Treino na prática', 'duration' => 9.25],
                    ['base' => 'Progressão e revisão', 'duration' => 6.50],
                ],
                'nutrition' => [
                    ['base' => 'Fundamentos e hábitos', 'duration' => 6.75],
                    ['base' => 'Planejamento alimentar na prática', 'duration' => 9.00],
                    ['base' => 'Revisão e consistência', 'duration' => 6.25],
                ],
                'mental-health' => [
                    ['base' => 'Rotina e estresse', 'duration' => 6.50],
                    ['base' => 'Estratégias práticas', 'duration' => 8.75],
                    ['base' => 'Autocuidado e revisão', 'duration' => 6.25],
                ],
                'yoga' => [
                    ['base' => 'Respiração e base', 'duration' => 6.25],
                    ['base' => 'Sequências práticas', 'duration' => 8.75],
                    ['base' => 'Mobilidade e revisão', 'duration' => 6.25],
                ],
                '__default' => [
                    ['base' => 'Introdução', 'duration' => 6.50],
                    ['base' => 'Prática guiada', 'duration' => 8.50],
                    ['base' => 'Revisão', 'duration' => 6.00],
                ],
            ],

            'music' => [
                'music-production' => [
                    ['base' => 'Ritmo e estrutura', 'duration' => 7.50],
                    ['base' => 'Arranjo e prática guiada', 'duration' => 10.00],
                    ['base' => 'Mixagem e revisão', 'duration' => 7.00],
                ],
                'instruments' => [
                    ['base' => 'Técnica e acordes', 'duration' => 7.25],
                    ['base' => 'Ritmo e prática com músicas', 'duration' => 9.75],
                    ['base' => 'Exercícios e revisão', 'duration' => 6.75],
                ],
                'music-theory' => [
                    ['base' => 'Escalas e intervalos', 'duration' => 7.25],
                    ['base' => 'Acordes e harmonia', 'duration' => 9.75],
                    ['base' => 'Exercícios e revisão', 'duration' => 6.75],
                ],
                '__default' => [
                    ['base' => 'Introdução', 'duration' => 6.50],
                    ['base' => 'Prática guiada', 'duration' => 9.00],
                    ['base' => 'Revisão', 'duration' => 6.00],
                ],
            ],
        ];

        $fallback = [
            ['base' => 'Introdução', 'duration' => 6.50],
            ['base' => 'Conteúdo principal (prática guiada)', 'duration' => 9.00],
            ['base' => 'Revisão e próximos passos', 'duration' => 6.00],
        ];

        foreach ($courses as $course) {
            // Mantém alinhado com o resto: só cursos ativos
            if ((int) ($course->status ?? 1) !== 1) {
                continue;
            }

            $categorySlug = $categoriesById[$course->category_id]->slug ?? null;
            $subSlug = $subCategoriesById[$course->subcategory_id]->slug ?? null;

            if (!$categorySlug || !$subSlug) {
                continue;
            }

            // Seções do curso (são obrigatórias para FK de section_id)
            $sections = DB::table('course_sections')
                ->select('id', 'section_title')
                ->where('course_id', $course->id)
                ->orderBy('id')
                ->get();

            if ($sections->isEmpty()) {
                continue;
            }

            $sectionIds = $sections->pluck('id')->all();

            // Evita duplicar ao rodar seed de novo
            DB::table('course_lectures')->whereIn('section_id', $sectionIds)->delete();

            $lectureTemplate = $templates[$categorySlug][$subSlug]
                ?? $templates[$categorySlug]['__default']
                ?? $fallback;

            $rows = [];
            $sectionIndex = 0;

            foreach ($sections as $section) {
                $sectionIndex++;

                $lectureIndex = 0;
                foreach ($lectureTemplate as $t) {
                    $lectureIndex++;

                    // Pequena variação de duração para não ficar tudo igual
                    $duration = (float) $t['duration'];
                    $duration += (($sectionIndex + $lectureIndex) % 3) * 0.50;
                    $duration = round($duration, 2);

                    $rows[] = [
                        'course_id' => $course->id,
                        'section_id' => $section->id,
                        'lecture_title' => "Aula {$lectureIndex}: {$section->section_title} — {$t['base']}",
                        'url' => $course->video_url ? ($course->video_url . "&lecture={$sectionIndex}-{$lectureIndex}") : null,
                        'content' => "Nesta aula, você vai estudar \"{$section->section_title}\" com foco em: {$t['base']}. "
                            . "Ao final, haverá um resumo e uma tarefa prática para consolidar o aprendizado.",
                        'video_duration' => $duration,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }

            // Insere em lote para performance
            DB::table('course_lectures')->insert($rows);
        }
    }
}
