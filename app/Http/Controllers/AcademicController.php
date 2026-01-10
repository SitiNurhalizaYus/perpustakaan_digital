<?php

namespace App\Http\Controllers;

use App\Services\AcademicService;

class AcademicController extends Controller
{
    public function sync(AcademicService $service)
    {
        $service->syncStudents();

        return redirect()->back()->with('success', 'Data mahasiswa berhasil disinkronkan dari sistem akademik.');
    }
}
