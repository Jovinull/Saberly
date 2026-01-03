<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseGoalSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Mapas para descobrir os slugs reais a partir dos IDs gravados nos cursos
        $categoriesById = DB::table('categories')->select('id', 'slug')->get()->keyBy('id');
        $subCategoriesById = DB::table('sub_categories')->select('id', 'slug', 'category_id')->get()->keyBy('id');

        // Pega os cursos com os ids que importam
        $courses = DB::table('courses')
            ->select('id', 'course_name_slug', 'course_title', 'course_name', 'category_id', 'subcategory_id', 'status')
            ->get();

        /**
         * Overrides específicos por slug de curso (quando quiser metas mais personalizadas).
         * Se o slug existir aqui, ele ganha prioridade total.
         */
        $goalsByCourseSlug = [
            'algoritmos-e-logica-de-programacao' => [
                'Entender o conceito de algoritmo e aplicar lógica na resolução de problemas',
                'Praticar entrada/saída e operadores para construir programas básicos',
                'Aprender a pensar passo a passo e transformar problemas em soluções',
            ],
            'sql-e-banco-de-dados-relacional' => [
                'Compreender modelagem básica e relacionamento entre tabelas',
                'Escrever consultas SQL para selecionar, inserir, atualizar e remover dados',
                'Aplicar boas práticas de organização e consistência de dados',
            ],
            'git-e-github-do-zero-ao-profissional' => [
                'Versionar projetos com Git de forma segura',
                'Trabalhar com branches, merges e pull requests',
                'Adotar um fluxo de trabalho profissional com GitHub',
            ],
            'linux-essentials-terminal-e-produtividade' => [
                'Navegar e manipular arquivos via terminal com confiança',
                'Entender permissões, processos e comandos essenciais do Linux',
                'Ganhar produtividade para desenvolvimento e deploy',
            ],
            'fundamentos-de-redes-e-seguranca' => [
                'Compreender IP, DNS e os principais protocolos usados na web',
                'Identificar riscos comuns e aplicar boas práticas de segurança',
                'Entender conceitos básicos de firewall e proteção de rede',
            ],
            'excel-do-zero-ao-pratico' => [
                'Criar tabelas organizadas e aplicar fórmulas essenciais',
                'Construir gráficos para análise e apresentação de dados',
                'Ganhar produtividade com atalhos e boas práticas',
            ],
            'marketing-digital-do-zero' => [
                'Criar um plano simples de marketing com foco em resultado',
                'Produzir conteúdo com consistência e estratégia',
                'Entender o básico de aquisição e conversão',
            ],
            'treino-de-forca-para-iniciantes' => [
                'Aprender técnica básica e execução segura dos exercícios',
                'Estruturar um treino simples com progressão consistente',
                'Aplicar princípios para ganhar força e condicionamento',
            ],
            'producao-musical-do-zero' => [
                'Entender estrutura de música e fundamentos de ritmo',
                'Criar beats e arranjos simples com workflow eficiente',
                'Aplicar noções básicas de mixagem e finalização',
            ],
        ];

        /**
         * Templates por category_slug e subcategory_slug (metas padrão por “tipo” de curso).
         * Use sempre os slugs do banco: ex. web-development, programming-languages, etc.
         */
        $templates = [
            'development' => [
                'programming-languages' => [
                    'Dominar fundamentos e sintaxe essencial para escrever código com clareza',
                    'Resolver problemas práticos com estruturas básicas e boas práticas',
                    'Construir uma base sólida para evoluir para projetos reais',
                ],
                'web-development' => [
                    'Criar páginas responsivas com HTML semântico e CSS moderno',
                    'Adicionar interatividade e lógica de front-end com JavaScript',
                    'Publicar projetos e organizar um fluxo básico de desenvolvimento web',
                ],
                'databases' => [
                    'Modelar dados com tabelas e relacionamentos coerentes',
                    'Criar consultas SQL para leitura e manipulação de dados',
                    'Aplicar boas práticas para consistência e manutenção do banco',
                ],
                'mobile-development' => [
                    'Criar telas e navegação em um app com boa estrutura',
                    'Consumir API e tratar estados de carregamento/erro',
                    'Aplicar padrões para organizar o projeto e evoluir com segurança',
                ],
                'game-development' => [
                    'Entender o ciclo de jogo, cenas e componentes principais',
                    'Implementar movimentação, colisão e UI básica',
                    'Concluir um protótipo jogável com organização mínima de projeto',
                ],
                '__default' => [
                    'Entender os fundamentos essenciais da área para evoluir com segurança',
                    'Aplicar o conteúdo em exercícios práticos com foco em resultado',
                    'Criar uma base sólida para avançar para módulos mais complexos',
                ],
            ],

            'business' => [
                'entrepreneurship' => [
                    'Validar uma ideia com foco em problema, público e proposta de valor',
                    'Definir um MVP simples para aprender rápido com usuários',
                    'Criar um plano inicial de execução e melhoria contínua',
                ],
                'management' => [
                    'Organizar rotinas, prioridades e alinhamento de tarefas do time',
                    'Aplicar processos simples para melhorar previsibilidade',
                    'Medir resultados com indicadores e ajustar a execução',
                ],
                'communication' => [
                    'Comunicar ideias com clareza em contexto profissional',
                    'Estruturar mensagens, reuniões e alinhamentos com objetividade',
                    'Evitar ruídos e melhorar colaboração com técnicas práticas',
                ],
                'sales' => [
                    'Estruturar um funil simples de prospecção e qualificação',
                    'Conduzir conversas com foco em valor e necessidade do cliente',
                    'Melhorar taxa de fechamento com método e consistência',
                ],
                'strategy' => [
                    'Definir objetivos e prioridades com foco em impacto',
                    'Criar um plano tático por etapas e acompanhar execução',
                    'Tomar decisões com base em contexto e dados básicos',
                ],
                '__default' => [
                    'Entender fundamentos do tema e aplicar em cenários reais',
                    'Criar um método simples para execução e melhoria contínua',
                    'Desenvolver visão prática para tomada de decisão',
                ],
            ],

            'finance-accounting' => [
                'accounting' => [
                    'Entender conceitos contábeis fundamentais e sua aplicação',
                    'Interpretar demonstrações básicas e estrutura de lançamentos',
                    'Aplicar uma visão prática para organização e análise',
                ],
                'financial-modeling' => [
                    'Montar um modelo com premissas, cenários e indicadores',
                    'Organizar planilhas com boas práticas e consistência',
                    'Gerar análises que apoiam decisões financeiras',
                ],
                'investing' => [
                    'Entender risco, retorno e diversificação na prática',
                    'Conhecer principais produtos e estratégias para iniciantes',
                    'Criar um plano básico para investir com consistência',
                ],
                'personal-finance' => [
                    'Organizar orçamento e controlar gastos com método simples',
                    'Definir metas financeiras e acompanhar evolução',
                    'Criar hábitos sustentáveis para melhorar sua vida financeira',
                ],
                'taxes' => [
                    'Entender noções básicas de impostos e obrigações comuns',
                    'Organizar documentos e rotina para evitar problemas',
                    'Aplicar um processo simples de acompanhamento anual',
                ],
                '__default' => [
                    'Entender o essencial para tomar decisões financeiras melhores',
                    'Aplicar o conteúdo em exercícios e simulações práticas',
                    'Criar um processo de organização e acompanhamento contínuo',
                ],
            ],

            'it-software' => [
                'it-certification' => [
                    'Definir um plano de estudos realista e consistente',
                    'Entender como estudar por questões e revisar com método',
                    'Aumentar chances de aprovação com estratégia prática',
                ],
                'network-security' => [
                    'Compreender fundamentos de rede e funcionamento da internet',
                    'Identificar riscos comuns e aplicar boas práticas básicas',
                    'Entender conceitos-chave de segurança para uso profissional',
                ],
                'operating-systems' => [
                    'Navegar no sistema com comandos e produtividade no terminal',
                    'Entender permissões, processos e organização de arquivos',
                    'Automatizar tarefas simples para ganhar eficiência',
                ],
                'cloud-computing' => [
                    'Entender conceitos de cloud e os principais serviços',
                    'Aplicar deploy básico e boas práticas de ambiente',
                    'Compreender escalabilidade e custos de forma introdutória',
                ],
                'devops' => [
                    'Entender versionamento, automação e fluxo de entrega',
                    'Aplicar práticas de build/deploy com visão profissional',
                    'Organizar um pipeline mental de desenvolvimento até produção',
                ],
                '__default' => [
                    'Dominar fundamentos essenciais para atuação em TI',
                    'Aplicar boas práticas e rotinas profissionais',
                    'Criar uma base sólida para evoluir com segurança',
                ],
            ],

            'office-productivity' => [
                'microsoft-office' => [
                    'Criar documentos/planilhas bem organizados e consistentes',
                    'Aplicar funções e recursos que aumentam produtividade',
                    'Produzir materiais claros para trabalho e estudo',
                ],
                'google-workspace' => [
                    'Organizar arquivos e colaborar com eficiência no Drive',
                    'Criar documentos e planilhas com fluxo de trabalho simples',
                    'Aumentar produtividade com recursos essenciais e automações leves',
                ],
                'project-management' => [
                    'Organizar tarefas e prioridades em um fluxo simples',
                    'Definir prazos e acompanhar execução com consistência',
                    'Evitar retrabalho e melhorar previsibilidade do dia a dia',
                ],
                '__default' => [
                    'Ganhar produtividade com recursos essenciais do dia a dia',
                    'Aplicar organização e consistência na rotina',
                    'Melhorar entrega e clareza em tarefas e documentos',
                ],
            ],

            'personal-development' => [
                'productivity' => [
                    'Construir rotina sustentável com foco e consistência',
                    'Aplicar técnicas práticas para reduzir procrastinação',
                    'Criar um sistema simples de planejamento e execução',
                ],
                'leadership' => [
                    'Melhorar comunicação e alinhamento com o time',
                    'Desenvolver confiança e autonomia na gestão de pessoas',
                    'Aplicar feedback e acompanhamento de forma prática',
                ],
                'career-development' => [
                    'Montar currículo e perfil profissional mais forte',
                    'Organizar portfólio para provar habilidade na prática',
                    'Aprender estratégias para entrevistas e oportunidades',
                ],
                'personal-growth' => [
                    'Criar hábitos com consistência e metas claras',
                    'Aplicar reflexão e organização para evolução contínua',
                    'Melhorar disciplina com um processo simples e realista',
                ],
                '__default' => [
                    'Desenvolver habilidades pessoais aplicáveis no dia a dia',
                    'Criar um método simples para consistência e evolução',
                    'Melhorar clareza de objetivos e execução',
                ],
            ],

            'design' => [
                'graphic-design' => [
                    'Entender princípios de composição, tipografia e hierarquia visual',
                    'Aplicar paletas e layout para comunicação clara',
                    'Criar peças consistentes com identidade visual básica',
                ],
                'ux-ui' => [
                    'Criar wireframes e protótipos com foco em usabilidade',
                    'Organizar componentes e padrões em um design system simples',
                    'Evoluir telas com consistência e boas práticas de interface',
                ],
                '3d-animation' => [
                    'Entender fundamentos de modelagem e materiais no 3D',
                    'Aplicar iluminação e renderização para resultados melhores',
                    'Concluir um projeto simples com pipeline bem organizado',
                ],
                'design-tools' => [
                    'Dominar ferramentas essenciais para criar interfaces e layouts',
                    'Trabalhar com componentes, grids e boas práticas',
                    'Montar um fluxo produtivo do rascunho ao protótipo',
                ],
                '__default' => [
                    'Entender fundamentos visuais e aplicar com consistência',
                    'Criar projetos práticos para desenvolver repertório',
                    'Melhorar organização e qualidade estética no resultado final',
                ],
            ],

            'marketing' => [
                'digital-marketing' => [
                    'Criar estratégia simples de aquisição e conversão',
                    'Planejar conteúdo com consistência e objetivo claro',
                    'Medir resultados básicos e melhorar campanhas',
                ],
                'content-marketing' => [
                    'Planejar calendário editorial e formatos de conteúdo',
                    'Produzir conteúdo com intenção e consistência',
                    'Distribuir e otimizar conteúdo para alcançar mais pessoas',
                ],
                'seo' => [
                    'Entender fundamentos de SEO on-page e técnico',
                    'Aplicar pesquisa de palavras-chave e estrutura de conteúdo',
                    'Melhorar ranqueamento com método e boas práticas',
                ],
                'social-media-marketing' => [
                    'Criar conteúdo para redes com estratégia e consistência',
                    'Entender formatos, ritmo de postagem e performance',
                    'Montar um plano simples de crescimento e engajamento',
                ],
                'branding' => [
                    'Definir posicionamento e proposta de valor da marca',
                    'Criar consistência de tom, visual e comunicação',
                    'Aplicar branding para fortalecer percepção e confiança',
                ],
                '__default' => [
                    'Entender fundamentos de marketing e aplicar na prática',
                    'Construir estratégia simples e executável',
                    'Melhorar resultados com consistência e análise básica',
                ],
            ],

            'lifestyle' => [
                'travel' => [
                    'Planejar viagens com roteiro e orçamento organizados',
                    'Aplicar estratégias para economizar e ganhar tempo',
                    'Criar uma rotina simples de organização de viagem',
                ],
                'food-beverage' => [
                    'Organizar rotina e compras para cozinhar com mais eficiência',
                    'Aprender técnicas básicas e receitas coringa',
                    'Criar hábitos simples para melhorar alimentação no dia a dia',
                ],
                'arts-crafts' => [
                    'Aprender técnicas simples para projetos criativos',
                    'Organizar materiais e passo a passo com segurança',
                    'Concluir peças com acabamento melhor e consistência',
                ],
                'beauty-makeup' => [
                    'Entender preparação, aplicação e finalização básica',
                    'Aprender técnicas essenciais para olhos e pele',
                    'Criar rotina simples para resultados consistentes',
                ],
                '__default' => [
                    'Aprender fundamentos e aplicar em projetos práticos',
                    'Desenvolver habilidade com consistência e método simples',
                    'Melhorar resultado final com boas práticas e organização',
                ],
            ],

            'photography-video' => [
                'photography' => [
                    'Entender luz e composição para fotos melhores',
                    'Dominar ajustes básicos e prática do modo manual',
                    'Criar um processo simples de treino e evolução',
                ],
                'video-editing' => [
                    'Organizar mídia e timeline com um workflow eficiente',
                    'Aplicar cortes, ritmo, áudio e finalização com qualidade',
                    'Exportar corretamente para diferentes plataformas',
                ],
                'filmmaking' => [
                    'Entender fundamentos de roteiro e planejamento de gravação',
                    'Aplicar técnicas básicas de captação e direção',
                    'Organizar a produção do início ao fim com checklist simples',
                ],
                '__default' => [
                    'Dominar fundamentos e aplicar com prática guiada',
                    'Criar rotina simples para evolução técnica',
                    'Concluir projetos com organização e qualidade',
                ],
            ],

            'health-fitness' => [
                'fitness' => [
                    'Aprender técnica básica e execução segura',
                    'Montar treino simples com progressão consistente',
                    'Criar disciplina e constância para melhores resultados',
                ],
                'nutrition' => [
                    'Entender fundamentos de alimentação equilibrada',
                    'Planejar refeições de forma prática e sustentável',
                    'Criar hábitos simples para manter consistência',
                ],
                'mental-health' => [
                    'Aplicar estratégias práticas para reduzir estresse',
                    'Criar rotina de autocuidado e organização emocional',
                    'Melhorar bem-estar com hábitos sustentáveis',
                ],
                'yoga' => [
                    'Aprender posturas básicas com foco em mobilidade',
                    'Aplicar respiração e prática para reduzir tensão',
                    'Criar rotina simples para evolução gradual',
                ],
                '__default' => [
                    'Entender fundamentos e aplicar com segurança',
                    'Criar rotina prática e sustentável',
                    'Melhorar consistência e resultados com método simples',
                ],
            ],

            'music' => [
                'music-production' => [
                    'Entender estrutura musical e fundamentos de ritmo',
                    'Criar arranjos simples e workflow de produção',
                    'Aplicar noções básicas de mixagem e finalização',
                ],
                'instruments' => [
                    'Aprender acordes e técnicas básicas do instrumento',
                    'Praticar ritmo e progressões para tocar músicas reais',
                    'Criar rotina de estudo para evolução consistente',
                ],
                'music-theory' => [
                    'Entender notas, intervalos, escalas e acordes',
                    'Aplicar harmonia básica em progressões musicais',
                    'Desenvolver leitura musical e raciocínio harmônico',
                ],
                '__default' => [
                    'Dominar fundamentos e aplicar em exercícios práticos',
                    'Criar rotina simples para evolução musical',
                    'Concluir práticas com consistência e organização',
                ],
            ],
        ];

        $fallbackGoals = [
            'Entender os fundamentos essenciais do curso e como aplicar na prática',
            'Desenvolver habilidade através de exercícios e exemplos guiados',
            'Concluir um mini-projeto ou prática final para consolidar o aprendizado',
        ];

        foreach ($courses as $course) {
            // Se quiser: só aplicar em cursos ativos
            // se você prefere em todos, remove esse if
            if ((int) ($course->status ?? 1) !== 1) {
                continue;
            }

            $categorySlug = $categoriesById[$course->category_id]->slug ?? null;
            $subSlug = $subCategoriesById[$course->subcategory_id]->slug ?? null;

            if (!$categorySlug || !$subSlug) {
                continue;
            }

            // 1) Override por slug do curso
            if (isset($goalsByCourseSlug[$course->course_name_slug])) {
                $goals = $goalsByCourseSlug[$course->course_name_slug];
            } else {
                // 2) Template por category/subcategory
                $goals = $templates[$categorySlug][$subSlug]
                    ?? $templates[$categorySlug]['__default']
                    ?? $fallbackGoals;
            }

            if (empty($goals)) {
                continue;
            }

            // Remove metas antigas para não duplicar ao rodar seed novamente
            DB::table('course_goals')->where('course_id', $course->id)->delete();

            $rows = [];
            foreach ($goals as $goal) {
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
