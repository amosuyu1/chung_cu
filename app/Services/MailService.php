<?php
namespace App\Services;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send(array $data)
    {
        try {
            Mail::to($data['to'])->send(new ContactMail($data));
        } catch (\Exception $e) {
            \Log::error('Lỗi gửi email: ' . $e->getMessage());
            return false;
        }
        return true;
    }
}
