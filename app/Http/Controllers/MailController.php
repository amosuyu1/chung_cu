<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use Illuminate\Http\Request;

class MailController extends Controller
{
    protected $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function sendMail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $validated['to'] = env('MAIL_FROM_ADDRESS', 'default@example.com');

        try {
            $this->mailService->send($validated);
            return response()->json(['message' => 'Email sent successfully'], 200);
        } catch (\Exception $e) {
            \Log::error('Lỗi gửi email: ' . $e->getMessage());
            return response()->json(['message' => 'Email sending failed', 'error' => $e->getMessage()], 500);
        }
    }
}
