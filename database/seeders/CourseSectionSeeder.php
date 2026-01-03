<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSectionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Mapas (id -> slug) para descobrir o contexto do curso
        $categoriesById = DB::table('categories')->select('id', 'slug')->get()->keyBy('id');
        $subCategoriesById = DB::table('sub_categories')->select('id', 'slug', 'category_id')->get()->keyBy('id');

        // Cursos existentes
        $courses = DB::table('courses')
            ->select('id', 'course_name_slug', 'course_title', 'course_name', 'category_id', 'subcategory_id', 'status')
            ->get();

        /**
         * Overrides específicos por slug do curso (opcional).
         * Se existir aqui, ganha prioridade total.
         */
        $sectionsByCourseSlug = [
            'algoritmos-e-logica-de-programacao' => [
                'Boas-vindas e visão geral do curso',
                'Fundamentos de lógica e algoritmos',
                'Entrada, saída e operadores',
                'Operadores lógicos e relacionais',
                'Exercícios práticos guiados',
            ],
            'sql-e-banco-de-dados-relacional' => [
                'Conceitos essenciais de banco de dados',
                'Modelagem: tabelas e relacionamentos',
                'SQL: SELECT, filtros e ordenação',
                'SQL: INSERT, UPDATE e DELETE',
                'Boas práticas e exercícios',
            ],
            'git-e-github-do-zero-ao-profissional' => [
                'Introdução ao versionamento e fluxo de trabalho',
                'Git na prática: init, add, commit, log',
                'Branches, merges e resolução de conflitos',
                'GitHub: remoto, pull request e code review',
                'Boas práticas e rotina profissional',
            ],
            'linux-essentials-terminal-e-produtividade' => [
                'Introdução ao Linux e terminal',
                'Arquivos, pastas e navegação',
                'Permissões, usuários e grupos',
                'Processos, serviços e monitoramento',
                'Automação e produtividade no dia a dia',
            ],
        ];

        /**
         * Templates por category_slug e subcategory_slug.
         * Use sempre slugs reais do banco (iguais aos gerados por Str::slug no SubCategorySeeder).
         */
        $templates = [
            'development' => [
                'programming-languages' => [
                    'Boas-vindas e preparação do ambiente',
                    'Fundamentos e sintaxe essencial',
                    'Estruturas de controle e prática guiada',
                    'Resolução de problemas e exercícios',
                    'Projeto final e próximos passos',
                ],
                'web-development' => [
                    'Introdução e setup do ambiente',
                    'HTML: estrutura e semântica',
                    'CSS: layout, responsividade e estilo',
                    'JavaScript: interatividade e DOM',
                    'Projeto prático do zero',
                ],
                'databases' => [
                    'Introdução a bancos de dados',
                    'Modelagem e relacionamentos',
                    'SQL: consultas (SELECT) na prática',
                    'SQL: manipulação (INSERT/UPDATE/DELETE)',
                    'Boas práticas e exercícios finais',
                ],
                'mobile-development' => [
                    'Introdução e setup do projeto',
                    'Componentes, telas e navegação',
                    'Consumo de API e gerenciamento de estado',
                    'Boas práticas de estrutura e UX',
                    'Build/Deploy e revisão final',
                ],
                'game-development' => [
                    'Introdução ao motor e setup do projeto',
                    'Sprites, cenas e movimentação',
                    'Colisão, física e interações',
                    'UI, pontuação e polimento do jogo',
                    'Build do projeto e próximos passos',
                ],
                '__default' => [
                    'Introdução e objetivos do curso',
                    'Fundamentos essenciais',
                    'Conteúdo principal e prática guiada',
                    'Projeto prático',
                    'Encerramento e próximos passos',
                ],
            ],

            'business' => [
                'entrepreneurship' => [
                    'Introdução: mentalidade e validação',
                    'Problema, público e proposta de valor',
                    'MVP: escopo, testes e feedback',
                    'Modelo de negócio e precificação básica',
                    'Plano de ação e próximos passos',
                ],
                'management' => [
                    'Introdução à gestão e objetivos',
                    'Organização de rotinas e processos',
                    'Prioridades, delegação e execução',
                    'Indicadores e melhoria contínua',
                    'Fechamento e plano de aplicação',
                ],
                'communication' => [
                    'Introdução à comunicação profissional',
                    'Clareza, estrutura e objetividade',
                    'Reuniões, alinhamento e documentação',
                    'Feedback e comunicação em equipe',
                    'Prática final e próximos passos',
                ],
                'sales' => [
                    'Introdução a vendas e funil',
                    'Prospecção e qualificação',
                    'Apresentação de valor e objeções',
                    'Fechamento e pós-venda',
                    'Rotina comercial e melhoria contínua',
                ],
                'strategy' => [
                    'Introdução a estratégia e contexto',
                    'Definição de objetivos e prioridades',
                    'Plano tático e execução por etapas',
                    'Análise de resultados e ajustes',
                    'Conclusão e plano de ação',
                ],
                '__default' => [
                    'Introdução',
                    'Fundamentos',
                    'Aplicação prática',
                    'Estudo de caso / exercícios',
                    'Conclusão',
                ],
            ],

            'finance-accounting' => [
                'accounting' => [
                    'Introdução à contabilidade',
                    'Conceitos e lançamentos básicos',
                    'Demonstrações e interpretação',
                    'Exercícios e casos práticos',
                    'Revisão e próximos passos',
                ],
                'financial-modeling' => [
                    'Introdução à modelagem financeira',
                    'Estrutura do modelo e premissas',
                    'Cenários, indicadores e análise',
                    'Validação e boas práticas no Excel',
                    'Projeto final e revisão',
                ],
                'investing' => [
                    'Introdução a investimentos',
                    'Risco, retorno e diversificação',
                    'Principais produtos e estratégias',
                    'Montagem de carteira básica',
                    'Revisão e próximos passos',
                ],
                'personal-finance' => [
                    'Introdução e diagnóstico financeiro',
                    'Orçamento, controle e metas',
                    'Organização de dívidas e reservas',
                    'Plano mensal e hábitos',
                    'Revisão e continuidade',
                ],
                'taxes' => [
                    'Introdução a impostos e organização',
                    'Documentos e rotinas essenciais',
                    'Noções práticas e erros comuns',
                    'Checklists e organização anual',
                    'Conclusão e próximos passos',
                ],
                '__default' => [
                    'Introdução',
                    'Fundamentos',
                    'Aplicação',
                    'Exercícios',
                    'Conclusão',
                ],
            ],

            'it-software' => [
                'it-certification' => [
                    'Introdução e definição de meta',
                    'Plano de estudos e materiais',
                    'Questões, revisão e prática',
                    'Simulados e estratégias',
                    'Fechamento e próximos passos',
                ],
                'network-security' => [
                    'Introdução a redes e segurança',
                    'Protocolos e fundamentos da internet',
                    'Ameaças comuns e boas práticas',
                    'Ferramentas e noções de proteção',
                    'Revisão e exercícios finais',
                ],
                'operating-systems' => [
                    'Introdução ao sistema e terminal',
                    'Arquivos, permissões e navegação',
                    'Processos, serviços e monitoramento',
                    'Automação e produtividade',
                    'Encerramento e próximos passos',
                ],
                'cloud-computing' => [
                    'Introdução à nuvem',
                    'Serviços essenciais e arquitetura básica',
                    'Deploy e ambientes',
                    'Custos, escalabilidade e boas práticas',
                    'Projeto final e revisão',
                ],
                'devops' => [
                    'Introdução a DevOps e cultura',
                    'Versionamento e padrões de trabalho',
                    'Build, deploy e automação',
                    'Qualidade, logs e monitoramento',
                    'Fechamento e próximos passos',
                ],
                '__default' => [
                    'Introdução',
                    'Fundamentos',
                    'Prática guiada',
                    'Exercícios',
                    'Conclusão',
                ],
            ],

            'office-productivity' => [
                'microsoft-office' => [
                    'Introdução e organização',
                    'Fundamentos e recursos essenciais',
                    'Fórmulas, atalhos e produtividade',
                    'Relatórios e boas práticas',
                    'Exercícios finais e revisão',
                ],
                'google-workspace' => [
                    'Introdução e organização no Drive',
                    'Docs e colaboração',
                    'Sheets e produtividade',
                    'Workflows e boas práticas',
                    'Conclusão e próximos passos',
                ],
                'project-management' => [
                    'Introdução e visão do fluxo',
                    'Quadro, colunas e prioridades',
                    'Rotina de execução e revisão',
                    'Relatórios simples e melhoria',
                    'Fechamento e próximos passos',
                ],
                '__default' => [
                    'Introdução',
                    'Fundamentos',
                    'Prática',
                    'Exercícios',
                    'Conclusão',
                ],
            ],

            'personal-development' => [
                'productivity' => [
                    'Introdução e diagnóstico',
                    'Rotina, foco e método',
                    'Ferramentas e organização',
                    'Execução e consistência',
                    'Conclusão e próximos passos',
                ],
                'leadership' => [
                    'Introdução à liderança',
                    'Comunicação e alinhamento',
                    'Feedback e acompanhamento',
                    'Delegação e autonomia',
                    'Conclusão e plano de aplicação',
                ],
                'career-development' => [
                    'Introdução e objetivos',
                    'Currículo e LinkedIn',
                    'Portfólio e provas de habilidade',
                    'Entrevistas e oportunidades',
                    'Conclusão e próximos passos',
                ],
                'personal-growth' => [
                    'Introdução e metas',
                    'Hábitos e consistência',
                    'Planejamento e rotina',
                    'Mentalidade e disciplina',
                    'Conclusão e continuidade',
                ],
                '__default' => [
                    'Introdução',
                    'Fundamentos',
                    'Aplicação prática',
                    'Exercícios',
                    'Conclusão',
                ],
            ],

            'design' => [
                'graphic-design' => [
                    'Introdução ao design',
                    'Composição e tipografia',
                    'Cores, grids e hierarquia',
                    'Projetos práticos e refinamento',
                    'Fechamento e próximos passos',
                ],
                'ux-ui' => [
                    'Introdução a UX/UI',
                    'Wireframes e estrutura',
                    'Design system e componentes',
                    'Prototipação e testes',
                    'Projeto final e revisão',
                ],
                '3d-animation' => [
                    'Introdução ao 3D',
                    'Modelagem e materiais',
                    'Luz e render',
                    'Animação (fundamentos)',
                    'Conclusão e próximos passos',
                ],
                'design-tools' => [
                    'Introdução à ferramenta',
                    'Fundamentos e workflow',
                    'Componentes e boas práticas',
                    'Projeto prático',
                    'Revisão e próximos passos',
                ],
                '__default' => [
                    'Introdução',
                    'Fundamentos',
                    'Prática',
                    'Projeto',
                    'Conclusão',
                ],
            ],

            'marketing' => [
                'digital-marketing' => [
                    'Introdução e visão geral',
                    'Estratégia e público-alvo',
                    'Conteúdo e canais',
                    'Métricas e otimização',
                    'Plano final e próximos passos',
                ],
                'content-marketing' => [
                    'Introdução ao conteúdo',
                    'Planejamento editorial',
                    'Produção e consistência',
                    'Distribuição e análise',
                    'Conclusão e plano de ação',
                ],
                'seo' => [
                    'Introdução ao SEO',
                    'SEO on-page',
                    'SEO técnico',
                    'Conteúdo e palavras-chave',
                    'Checklist e próximos passos',
                ],
                'social-media-marketing' => [
                    'Introdução a social media',
                    'Estratégia de conteúdo',
                    'Formatos e produção',
                    'Crescimento e métricas',
                    'Plano final e revisão',
                ],
                'branding' => [
                    'Introdução a branding',
                    'Posicionamento e proposta de valor',
                    'Identidade visual e tom',
                    'Consistência e aplicação',
                    'Conclusão e próximos passos',
                ],
                '__default' => [
                    'Introdução',
                    'Fundamentos',
                    'Aplicação',
                    'Exercícios',
                    'Conclusão',
                ],
            ],

            'lifestyle' => [
                'travel' => [
                    'Introdução ao planejamento',
                    'Roteiro e organização',
                    'Orçamento e economia',
                    'Dicas práticas e checklists',
                    'Conclusão e próximos passos',
                ],
                'food-beverage' => [
                    'Introdução e organização',
                    'Técnicas básicas',
                    'Receitas base e variações',
                    'Planejamento de refeições',
                    'Conclusão e próximos passos',
                ],
                'arts-crafts' => [
                    'Introdução ao DIY',
                    'Materiais e técnicas',
                    'Projetos guiados',
                    'Acabamento e melhoria',
                    'Conclusão e próximos passos',
                ],
                'beauty-makeup' => [
                    'Introdução e preparação',
                    'Pele e acabamento',
                    'Olhos e técnicas básicas',
                    'Prática guiada',
                    'Conclusão e próximos passos',
                ],
                '__default' => [
                    'Introdução',
                    'Fundamentos',
                    'Prática',
                    'Projeto',
                    'Conclusão',
                ],
            ],

            'photography-video' => [
                'photography' => [
                    'Introdução à fotografia',
                    'Luz e composição',
                    'Câmera e modo manual',
                    'Prática guiada',
                    'Conclusão e próximos passos',
                ],
                'video-editing' => [
                    'Introdução à edição',
                    'Organização de mídia e timeline',
                    'Cortes, ritmo e áudio',
                    'Finalização e exportação',
                    'Projeto final e revisão',
                ],
                'filmmaking' => [
                    'Introdução ao filmmaking',
                    'Roteiro e planejamento',
                    'Captação e direção',
                    'Organização de produção',
                    'Conclusão e próximos passos',
                ],
                '__default' => [
                    'Introdução',
                    'Fundamentos',
                    'Prática',
                    'Projeto',
                    'Conclusão',
                ],
            ],

            'health-fitness' => [
                'fitness' => [
                    'Introdução e segurança',
                    'Técnica e execução',
                    'Treino e progressão',
                    'Rotina e consistência',
                    'Conclusão e próximos passos',
                ],
                'nutrition' => [
                    'Introdução à nutrição',
                    'Fundamentos e hábitos',
                    'Planejamento alimentar',
                    'Prática e exemplos',
                    'Conclusão e próximos passos',
                ],
                'mental-health' => [
                    'Introdução e contexto',
                    'Rotina e estresse',
                    'Estratégias práticas',
                    'Autocuidado e hábitos',
                    'Conclusão e próximos passos',
                ],
                'yoga' => [
                    'Introdução ao yoga',
                    'Respiração e mobilidade',
                    'Posturas básicas',
                    'Rotina guiada',
                    'Conclusão e próximos passos',
                ],
                '__default' => [
                    'Introdução',
                    'Fundamentos',
                    'Prática',
                    'Rotina',
                    'Conclusão',
                ],
            ],

            'music' => [
                'music-production' => [
                    'Introdução à produção',
                    'Ritmo e estrutura',
                    'Arranjo e criação',
                    'Mixagem e finalização',
                    'Projeto final e revisão',
                ],
                'instruments' => [
                    'Introdução ao instrumento',
                    'Acordes e técnica básica',
                    'Ritmo e progressões',
                    'Prática com músicas',
                    'Conclusão e próximos passos',
                ],
                'music-theory' => [
                    'Introdução à teoria musical',
                    'Notas, intervalos e escalas',
                    'Acordes e harmonia',
                    'Exercícios práticos',
                    'Conclusão e próximos passos',
                ],
                '__default' => [
                    'Introdução',
                    'Fundamentos',
                    'Prática',
                    'Exercícios',
                    'Conclusão',
                ],
            ],
        ];

        $fallback = [
            'Introdução',
            'Fundamentos',
            'Conteúdo principal',
            'Projeto prático',
            'Conclusão',
        ];

        foreach ($courses as $course) {
            // Se quiser só cursos ativos
            if ((int) ($course->status ?? 1) !== 1) {
                continue;
            }

            $categorySlug = $categoriesById[$course->category_id]->slug ?? null;
            $subSlug = $subCategoriesById[$course->subcategory_id]->slug ?? null;

            if (!$categorySlug || !$subSlug) {
                continue;
            }

            // 1) override por slug do curso
            if (isset($sectionsByCourseSlug[$course->course_name_slug])) {
                $sectionTitles = $sectionsByCourseSlug[$course->course_name_slug];
            } else {
                // 2) template por category/subcategory
                $sectionTitles = $templates[$categorySlug][$subSlug]
                    ?? $templates[$categorySlug]['__default']
                    ?? $fallback;
            }

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
