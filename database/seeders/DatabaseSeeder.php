<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // تأكد تماماً أن هذا هو الكود الوحيد الموجود في دالة run
        // لا يجب أن يوجد هنا أي سطر يحتوي على User::factory()
        // dd("تم تنفيذ هذا الملف بنجاح!"); // <--- السطر الجديد هنا

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            CourseAndLessonSeeder::class,
            PostSeeder::class,
            EnrollmentAndProgressSeeder::class,
            OrderSeeder::class,
            StudentShowcaseSeeder::class,
            ConsultationSeeder::class,
        ]);
    }
}