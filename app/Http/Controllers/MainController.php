<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {
        return Inertia::render('index', [
            'teachers' => Teacher::all()->map(fn($teacher) => [
                'id' => $teacher->id,
                'first_name' => $teacher->first_name,
                'last_name' => $teacher->last_name,
                'school' => $teacher->school,
                'grades' => json_decode($teacher->grades),
                'subjects' => json_decode($teacher->subjects),
                'avatar_url' => $teacher->avatar_url,
            ])
        ]);
    }
}
