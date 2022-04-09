<?php

namespace App\Actions;

use App\Mail\PasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegistrationWithOutPasswordAction
{
    public function execute(array $data): void
    {
        $data['password'] = $this->generatePassword();
        $this->saveData($data);
        $this->sendEmail($data['email'], $data['password']);
    }

    private function generatePassword(): string
    {
        return Str::random(10);
    }

    private function saveData(array $data): void
    {
        User::create($data);
    }

    private function sendEmail(string $email, string $password)
    {
        Mail::to($email)->send(new PasswordMail($password));
    }
}
