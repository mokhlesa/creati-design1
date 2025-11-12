<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author = User::where('email', 'instructor@example.com')->first();
        $category = Category::where('slug', 'designer-tips')->first();

        Post::create([
            'user_id' => $author->id,
            'category_id' => $category->id,
            'title' => '5 أخطاء قاتلة يقع بها المصممون المبتدئون',
            'slug' => '5-mistakes-for-designers',
            'content' => 'محتوى المقال هنا يتحدث عن الأخطاء الشائعة مثل اختيار الخطوط السيئة، تجاهل المساحات البيضاء...',
            'published_at' => now(),
        ]);

        Post::create([
            'user_id' => $author->id,
            'category_id' => $category->id,
            'title' => 'كيف تبني ملف أعمال (Portfolio) يجذب العملاء؟',
            'slug' => 'how-to-build-portfolio',
            'content' => 'ملف الأعمال هو بطاقتك الرابحة. في هذا المقال سنتعلم كيف نعرض أفضل أعمالنا بطريقة احترافية.',
            'published_at' => now(),
        ]);
    }
}
