<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentShowcase;
use App\Models\User;
use App\Models\Course;

class StudentShowcaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $student = User::where('email', 'fatima@example.com')->first();
        $course = Course::where('slug', 'logo-design-branding')->first();

        StudentShowcase::create([
            'user_id' => $student->id,
            'course_id' => $course->id,
            'title' => 'تصميم هوية بصرية لمقهى "أرابيكا"',
            'description' => 'هذا المشروع هو التطبيق العملي لما تعلمته في دورة تصميم الهوية البصرية.',
            'image_url' => 'https://via.placeholder.com/800x600.png/00aa77?text=ProjectImage',
            'is_featured' => true,
        ]);
    }
}
