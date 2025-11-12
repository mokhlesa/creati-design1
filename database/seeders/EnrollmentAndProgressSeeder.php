<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Enrollment;
use App\Models\CourseProgress;
use App\Models\User;
use App\Models\Course;

class EnrollmentAndProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student1 = User::where('email', 'ahmad@example.com')->first();
        $student2 = User::where('email', 'fatima@example.com')->first();
        $course1 = Course::where('slug', 'illustrator-basics')->first();
        $course2 = Course::where('slug', 'logo-design-branding')->first();

        // تسجيل الطالب أحمد في الكورس الأول
        Enrollment::create(['user_id' => $student1->id, 'course_id' => $course1->id]);
        
        // تسجيل تقدم أحمد في الدرس الأول
        $lesson1 = $course1->lessons()->where('order', 1)->first();
        if ($lesson1) {
            CourseProgress::create(['user_id' => $student1->id, 'lesson_id' => $lesson1->id, 'completed_at' => now()]);
        }
        
        // تسجيل الطالبة فاطمة في الكورسين
        Enrollment::create(['user_id' => $student2->id, 'course_id' => $course1->id]);
        Enrollment::create(['user_id' => $student2->id, 'course_id' => $course2->id]);
    }
}
