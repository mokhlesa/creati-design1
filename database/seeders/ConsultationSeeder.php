<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consultation;
use App\Models\AiFeedback;
use App\Models\User;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = User::where('email', 'ahmad@example.com')->first();

        $consultation = Consultation::create([
            'user_id' => $student->id,
            'image_url' => 'https://via.placeholder.com/800x600.png/5533ff?text=DesignForReview',
            'status' => 'completed',
        ]);
        
        AiFeedback::create([
            'consultation_id' => $consultation->id,
            'model_used' => 'gemini-2.5-pro',
            'feedback' => 'تحليل التصميم: الألوان المستخدمة متناسقة وتعبر عن الحيوية. التباين بين النص والخلفية جيد. اقتراح: يمكن تجربة خط مختلف للعنوان ليعطي طابعاً أكثر حداثة. بشكل عام، التصميم قوي ومميز.',
        ]);
    }
}
