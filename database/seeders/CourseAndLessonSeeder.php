<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;

class CourseAndLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $instructor = User::where('email', 'instructor@example.com')->first();

        // الكورس الأول
        $course1 = Course::create([
            'title' => 'أساسيات Adobe Illustrator للمبتدئين',
            'slug' => 'illustrator-basics',
            'description' => 'دورة شاملة تأخذك من الصفر إلى الاحتراف في برنامج Illustrator.',
            'instructor_id' => $instructor->id,
            'price' => 50.00,
            'published_at' => now(),
        ]);

        $course1->lessons()->createMany([
            ['title' => 'مقدمة عن واجهة البرنامج', 'slug' => 'illustrator-intro', 'order' => 1],
            ['title' => 'شرح أداة القلم (Pen Tool)', 'slug' => 'illustrator-pen-tool', 'order' => 2],
            ['title' => 'التعامل مع الأشكال والألوان', 'slug' => 'illustrator-shapes-colors', 'order' => 3],
        ]);
        
        // الكورس الثاني
        $course2 = Course::create([
            'title' => 'فن تصميم الشعارات والهوية البصرية',
            'slug' => 'logo-design-branding',
            'description' => 'تعلم أسرار تصميم الشعارات الاحترافية وبناء هوية بصرية متكاملة.',
            'instructor_id' => $instructor->id,
            'price' => 75.00,
            'published_at' => now(),
        ]);
        
        $course2->lessons()->createMany([
            ['title' => 'ما هو الشعار وما هي أنواعه؟', 'slug' => 'logo-types', 'order' => 1],
            ['title' => 'عملية البحث وجمع الأفكار (Brainstorming)', 'slug' => 'logo-brainstorming', 'order' => 2],
            ['title' => 'تطبيق عملي: تصميم شعار من الألف إلى الياء', 'slug' => 'logo-full-project', 'order' => 3],
        ]);
    }
}
