<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // جلب الأدوار من قاعدة البيانات
        $adminRole = Role::where('name', 'admin')->first();
        $instructorRole = Role::where('name', 'instructor')->first();
        $studentRole = Role::where('name', 'student')->first();

        // إنشاء مدير للنظام
        User::create([
            'first_name' => 'مدير',
            'last_name' => 'النظام',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
            'region' => 'دمشق',
        ]);

        // إنشاء مدرس
        User::create([
            'first_name' => 'خالد',
            'last_name' => 'العيسى',
            'username' => 'khaled_art',
            'email' => 'instructor@example.com',
            'password' => Hash::make('password'),
            'role_id' => $instructorRole->id,
            'region' => 'حلب',
        ]);
        
        // إنشاء مجموعة من الطلاب
        User::create([
            'first_name' => 'أحمد',
            'last_name' => 'الشامي',
            'username' => 'ahmad_gfx',
            'email' => 'ahmad@example.com',
            'password' => Hash::make('password'),
            'role_id' => $studentRole->id,
            'region' => 'دمشق',
        ]);

        User::create([
            'first_name' => 'فاطمة',
            'last_name' => 'الزين',
            'username' => 'fatima_design',
            'email' => 'fatima@example.com',
            'password' => Hash::make('password'),
            'role_id' => $studentRole->id,
            'region' => 'حمص',
        ]);
        
        User::create([
            'first_name' => 'سارة',
            'last_name' => 'مراد',
            'username' => 'sara_murad',
            'email' => 'sara@example.com',
            'password' => Hash::make('password'),
            'role_id' => $studentRole->id,
            'region' => 'اللاذقية',
        ]);
    }
}

 