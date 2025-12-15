<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\TeacherRequest;

class TeacherRequestRejected extends Notification implements ShouldQueue
{
    use Queueable;

    protected TeacherRequest $teacherRequest;

    /**
     * Create a new notification instance.
     */
    public function __construct(TeacherRequest $teacherRequest)
    {
        $this->teacherRequest = $teacherRequest;
    }

    /**
     * Get the notification's delivery channels. (e.g. mail, database, sms)
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Fetch the user's name and email, and the admin's message
        $userName = $notifiable->name;
        $userEmail = $notifiable->email;
        $adminMessage = $this->teacherRequest->message ?? 'لا يوجد رسالة إضافية.';

        return (new MailMessage)
                    ->subject('تم رفض طلبك للانضمام كمعلم')
                    ->greeting("مرحباً {$userName},")
                    ->line('نأسف لإبلاغك بأنه قد تم رفض طلبك للانضمام إلى فريق المعلمين لدينا.')
                    ->line("حالة طلبك: {$this->teacherRequest->status}")
                    ->line("رسالة من المسؤول: {$adminMessage}")
                    ->action('تسجيل الدخول إلى لوحة التحكم', url('/login'))
                    ->salutation('مع خالص التقدير، فريق المنصة');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
