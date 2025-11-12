<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\User;
use App\Models\Course;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        // الطالبة سارة تشتري كورس تصميم الشعارات
        $student = User::where('email', 'sara@example.com')->first();
        $course = Course::where('slug', 'logo-design-branding')->first();
        
        $order = Order::create([
            'user_id' => $student->id,
            'total_amount' => $course->price,
            'status' => 'paid',
        ]);
        
        OrderItem::create([
            'order_id' => $order->id,
            'course_id' => $course->id,
            'price' => $course->price,
        ]);
        
        Payment::create([
            'order_id' => $order->id,
            'transaction_id' => 'TRANS_'.uniqid(),
            'payment_method' => 'Credit Card',
            'amount' => $course->price,
            'status' => 'completed',
        ]);
        
        // بعد الدفع الناجح، يجب تسجيلها في الكورس
        // ملاحظة: في التطبيق الحقيقي، هذه العملية تكون تلقائية بعد الدفع
        \App\Models\Enrollment::create(['user_id' => $student->id, 'course_id' => $course->id]);
    }
}
