<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\User;

class AcademicService
{
    public function syncStudents()
    {
        $response = Http::get('http://localhost:8001/api/students');

        $students = $response->json();

        foreach ($students as $student) {
            User::updateOrCreate(
                ['nim' => $student['nim']],
                [
                    'name' => $student['name'],
                    'faculty' => $student['faculty']
                ]
            );
        }
    }

    public function findByNim($nim)
    {
        return User::where('nim', $nim)->first();
    }

    public function findStudentByNim($nim)
{
    $students = $this->getStudents();

    foreach ($students as $student) {
        if ($student['nim'] == $nim) {
            return $student;
        }
    }

    return null;
}
public function getStudents()
{
    $response = Http::get('http://localhost:8001/api/students');
    return $response->json();
}


}
