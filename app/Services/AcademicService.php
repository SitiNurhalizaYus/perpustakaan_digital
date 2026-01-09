<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\User;

class AcademicService
{
    protected string $apiUrl = 'http://localhost:8001/api/students';

    public function verifyStudent(string $nim, string $name, string $faculty)
    {
        $response = Http::get($this->apiUrl);

        if ($response->failed()) {
            return null; // API mati
        }

        $students = $response->json();

        foreach ($students as $student) {
            if (
                $student['nim'] === $nim &&
                strtolower($student['name']) === strtolower($name) &&
                strtolower($student['faculty']) === strtolower($faculty)
            ) {
                // valid → simpan/update di tabel users
                return User::updateOrCreate(
                    ['nim' => $nim],
                    [
                        'name' => $name,
                        'faculty' => $faculty
                    ]
                );
            }
        }

        return null; // tidak ditemukan di SIAKAD
    }
}
