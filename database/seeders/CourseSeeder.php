<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Instrutor: tenta pegar um usuário com role "instructor", senão pega o primeiro usuário
        $instructorId = DB::table('users')->where('role', 'instructor')->value('id')
            ?? DB::table('users')->orderBy('id')->value('id')
            ?? 1;

        // Busca categories e subcategories para montar IDs corretamente
        $categories = DB::table('categories')->select('id', 'slug')->get()->keyBy('slug');

        $subCategories = DB::table('sub_categories')
            ->select('id', 'slug', 'category_id')
            ->get();

        $getSubCategoryId = function (string $categorySlug, string $subSlug) use ($categories, $subCategories) {
            if (!isset($categories[$categorySlug])) {
                return null;
            }
            $categoryId = $categories[$categorySlug]->id;

            $match = $subCategories->first(fn($s) => (int) $s->category_id === (int) $categoryId && $s->slug === $subSlug);

            return $match?->id;
        };

        $galleryNumbers = [17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30];
        $imageIndex = 0;

        $pickGalleryImage = function () use (&$imageIndex, $galleryNumbers) {
            $num = $galleryNumbers[$imageIndex % count($galleryNumbers)];
            $imageIndex++;

            $base = "backend/assets/images/gallery/{$num}";
            foreach (['.jpg', '.jpeg', '.png', '.webp'] as $ext) {
                if (File::exists(public_path($base . $ext))) {
                    return $base . $ext; // caminho relativo ao /public
                }
            }

            // fallback (caso não encontre nada no disco)
            return $base . '.jpg';
        };

        // Definição dos cursos (ajuste como quiser)
        $courses = [
            [
                'category_slug' => 'development',
                'subcategory_slug' => 'programming-languages',
                'course_title' => 'Algoritmos e Lógica de Programação (Do Zero)',
                'course_name' => 'Algoritmos e Lógica de Programação',
                'video_url' => 'https://www.youtube.com/watch?v=8mei6uVttho',
                'label' => 'Beginner',
                'duration' => 8.50,
                'selling_price' => 199,
                'discount_price' => 99,
                'prerequisites' => 'Nenhum. Recomendado: vontade de aprender e praticar exercícios.',
                'description' => 'Curso completo para sair do zero em lógica, algoritmos, entrada/saída, operadores e construção de soluções passo a passo.',
                'resources' => 'PDFs, exercícios e materiais de apoio',
                'certificate' => 'yes',
                'bestseller' => '1',
                'featured' => '1',
                'highestrated' => '1',
                'status' => 1,
            ],
            [
                'category_slug' => 'development',
                'subcategory_slug' => 'web-development',
                'course_title' => 'Web Development 2025: HTML, CSS e JavaScript',
                'course_name' => 'Web Development 2025',
                'video_url' => 'https://www.youtube.com/watch?v=kIImolG-C1M',
                'label' => 'Beginner',
                'duration' => 12.00,
                'selling_price' => 249,
                'discount_price' => 129,
                'prerequisites' => 'Nenhum. Um editor de código (VS Code) recomendado.',
                'description' => 'Do básico ao prático: estrutura, estilo e interatividade para construir páginas modernas do zero.',
                'resources' => 'Projeto guiado + exercícios',
                'certificate' => 'yes',
                'bestseller' => '1',
                'featured' => '1',
                'highestrated' => '0',
                'status' => 1,
            ],
            [
                'category_slug' => 'development',
                'subcategory_slug' => 'databases',
                'course_title' => 'Banco de Dados Relacionais: Fundamentos e SQL',
                'course_name' => 'Fundamentos de SQL e Banco de Dados',
                'video_url' => 'https://www.youtube.com/watch?v=RDrfZ-7WE8c',
                'label' => 'Beginner',
                'duration' => 9.25,
                'selling_price' => 219,
                'discount_price' => 119,
                'prerequisites' => 'Noções básicas de lógica e informática.',
                'description' => 'Conceitos de modelagem, tabelas, relacionamentos e SQL para consultas e manipulação de dados.',
                'resources' => 'Scripts SQL e exercícios',
                'certificate' => 'yes',
                'bestseller' => '0',
                'featured' => '1',
                'highestrated' => '1',
                'status' => 1,
            ],
            [
                'category_slug' => 'it-software',
                'subcategory_slug' => 'devops',
                'course_title' => 'Git e GitHub: Fluxo Profissional do Zero',
                'course_name' => 'Git e GitHub do Zero ao Profissional',
                'video_url' => 'https://www.youtube.com/watch?v=Ig4QZNpVZYs',
                'label' => 'Beginner',
                'duration' => 6.75,
                'selling_price' => 179,
                'discount_price' => 89,
                'prerequisites' => 'Nenhum.',
                'description' => 'Versionamento, branches, merge, pull request e boas práticas para projetos reais.',
                'resources' => 'Cheat sheet + exercícios',
                'certificate' => 'yes',
                'bestseller' => '0',
                'featured' => '0',
                'highestrated' => '1',
                'status' => 1,
            ],
            [
                'category_slug' => 'it-software',
                'subcategory_slug' => 'operating-systems',
                'course_title' => 'Linux Essentials: Terminal, Arquivos e Automação',
                'course_name' => 'Linux Essentials',
                'video_url' => 'https://www.youtube.com/watch?v=N3K8PjFOhy4',
                'label' => 'Beginner',
                'duration' => 7.50,
                'selling_price' => 189,
                'discount_price' => 99,
                'prerequisites' => 'Nenhum.',
                'description' => 'Terminal, permissões, processos e comandos essenciais para produtividade e desenvolvimento.',
                'resources' => 'Lista de comandos + desafios',
                'certificate' => 'yes',
                'bestseller' => '0',
                'featured' => '1',
                'highestrated' => '0',
                'status' => 1,
            ],
            [
                'category_slug' => 'development',
                'subcategory_slug' => 'programming-languages',
                'course_title' => 'Estruturas de Dados e Algoritmos com Java',
                'course_name' => 'Estruturas de Dados com Java',
                'video_url' => 'https://www.youtube.com/watch?v=K5kaYF4ePS0',
                'label' => 'Intermediate',
                'duration' => 14.00,
                'selling_price' => 299,
                'discount_price' => 159,
                'prerequisites' => 'Noções básicas de Java e lógica de programação.',
                'description' => 'Arrays, listas, filas, pilhas e fundamentos para escrever código mais eficiente em Java.',
                'resources' => 'Exercícios + implementações',
                'certificate' => 'yes',
                'bestseller' => '1',
                'featured' => '0',
                'highestrated' => '1',
                'status' => 1,
            ],
        ];

        foreach ($courses as $c) {
            if (!isset($categories[$c['category_slug']])) {
                continue;
            }

            $categoryId = $categories[$c['category_slug']]->id;
            $subCategoryId = $getSubCategoryId($c['category_slug'], $c['subcategory_slug']);

            if (!$subCategoryId) {
                continue;
            }

            $slug = Str::slug($c['course_name'] ?? $c['course_title'] ?? Str::random(10));

            // Não uso upsert aqui (Postgres exige unique). updateOrInsert funciona sem unique.
            DB::table('courses')->updateOrInsert(
                ['course_name_slug' => $slug],
                [
                    'category_id' => (int) $categoryId,
                    'subcategory_id' => (int) $subCategoryId,
                    'instructor_id' => (int) $instructorId,

                    'course_image' => $pickGalleryImage(),
                    'course_title' => $c['course_title'],
                    'course_name' => $c['course_name'],
                    'course_name_slug' => $slug,

                    'description' => $c['description'] ?? null,
                    'video_url' => $c['video_url'] ?? null,
                    'label' => $c['label'] ?? null,

                    'resources' => $c['resources'] ?? null,
                    'certificate' => $c['certificate'] ?? null,

                    'duration' => $c['duration'] ?? null,
                    'selling_price' => $c['selling_price'] ?? null,
                    'discount_price' => $c['discount_price'] ?? null,
                    'prerequisites' => $c['prerequisites'] ?? null,

                    'bestseller' => $c['bestseller'] ?? '0',
                    'featured' => $c['featured'] ?? '0',
                    'highestrated' => $c['highestrated'] ?? '0',

                    'status' => $c['status'] ?? 0,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
