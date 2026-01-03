<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        /**
         * Mapeamento: slug da category => lista de subcategorias
         * (os slugs aqui devem existir na tabela categories)
         */
        $map = [
            'development' => [
                'Web Development',
                'Mobile Development',
                'Game Development',
                'Programming Languages',
                'Databases',
            ],
            'business' => [
                'Entrepreneurship',
                'Management',
                'Communication',
                'Sales',
                'Strategy',
            ],
            'finance-accounting' => [
                'Accounting',
                'Financial Modeling',
                'Investing',
                'Personal Finance',
                'Taxes',
            ],
            'it-software' => [
                'IT Certification',
                'Network & Security',
                'Operating Systems',
                'Cloud Computing',
                'DevOps',
            ],
            'design' => [
                'Graphic Design',
                'UX/UI',
                '3D & Animation',
                'Design Tools',
            ],
            'marketing' => [
                'Digital Marketing',
                'Content Marketing',
                'SEO',
                'Social Media Marketing',
                'Branding',
            ],
            'lifestyle' => [
                'Travel',
                'Food & Beverage',
                'Arts & Crafts',
                'Beauty & Makeup',
            ],
            'photography-video' => [
                'Photography',
                'Video Editing',
                'Filmmaking',
            ],
            'health-fitness' => [
                'Fitness',
                'Nutrition',
                'Mental Health',
                'Yoga',
            ],
            'music' => [
                'Music Production',
                'Instruments',
                'Music Theory',
            ],
            'personal-development' => [
                'Productivity',
                'Leadership',
                'Career Development',
                'Personal Growth',
            ],
            'office-productivity' => [
                'Microsoft Office',
                'Google Workspace',
                'Project Management',
            ],
        ];

        // Busca as categories (id e slug)
        $categories = DB::table('categories')->select('id', 'slug')->get()->keyBy('slug');

        $rows = [];

        foreach ($map as $categorySlug => $subNames) {
            if (!$categories->has($categorySlug)) {
                // Se não existir a category, pula (não quebra o seed)
                continue;
            }

            $categoryId = $categories[$categorySlug]->id;

            foreach ($subNames as $name) {
                $rows[] = [
                    'category_id' => $categoryId,
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        /**
         * Evita duplicar:
         * Uma subcategoria é "única" por (category_id + slug).
         */
        DB::table('sub_categories')->upsert(
            $rows,
            ['category_id', 'slug'],
            ['name', 'updated_at']
        );
    }
}
