<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'تصميم الهوية البصرية', 'slug' => 'visual-identity']);
        Category::create(['name' => 'تصميم واجهات المستخدم', 'slug' => 'ui-ux-design']);
        Category::create(['name' => 'الرسم الرقمي', 'slug' => 'digital-painting']);
        Category::create(['name' => 'الموشن جرافيك', 'slug' => 'motion-graphics']);
        Category::create(['name' => 'نصائح للمصممين', 'slug' => 'designer-tips']);
    }
}

