<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            SliderSeeder::class,
            CourseSeeder::class,
            CourseSectionSeeder::class,
            CourseGoalSeeder::class,
            InfoBoxSeeder::class,
            CourseLectureSeeder::class,
        ]);
    }
}
