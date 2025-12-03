<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;
use App\Models\PortfolioMedia;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // العمل الأول
        $portfolio1 = Portfolio::create([
            'title' => 'مشروع تصميم هوية بصرية لشركة تقنية',
            'description' => 'تم تصميم هوية بصرية كاملة تشمل الشعار، الألوان، والخطوط لشركة ناشئة في مجال التكنولوجيا.',
            'main_image' => 'https://via.placeholder.com/800x600.png/007bff/ffffff?text=Main+Image+1',
        ]);

        PortfolioMedia::create([
            'portfolio_id' => $portfolio1->id,
            'type' => 'image',
            'url' => 'https://via.placeholder.com/800x600.png/28a745/ffffff?text=Sub+Image+1',
        ]);

        PortfolioMedia::create([
            'portfolio_id' => $portfolio1->id,
            'type' => 'video',
            'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // Rick Astley - Never Gonna Give You Up
        ]);

        // العمل الثاني
        $portfolio2 = Portfolio::create([
            'title' => 'تصميم واجهة مستخدم لتطبيق جوال',
            'description' => 'تصميم عصري وسهل الاستخدام لتطبيق يهدف إلى تنظيم المهام اليومية للمستخدمين.',
            'main_image' => 'https://via.placeholder.com/800x600.png/ffc107/ffffff?text=Main+Image+2',
        ]);

        PortfolioMedia::create([
            'portfolio_id' => $portfolio2->id,
            'type' => 'image',
            'url' => 'https://via.placeholder.com/800x600.png/dc3545/ffffff?text=Sub+Image+2',
        ]);

        // العمل الثالث
        $portfolio3 = Portfolio::create([
            'title' => 'حملة إعلانية على وسائل التواصل الاجتماعي',
            'description' => 'إنشاء محتوى مرئي وجذاب لحملة إعلانية استهدفت زيادة الوعي بعلامة تجارية جديدة.',
            'main_image' => 'https://via.placeholder.com/800x600.png/17a2b8/ffffff?text=Main+Image+3',
        ]);

    }
}