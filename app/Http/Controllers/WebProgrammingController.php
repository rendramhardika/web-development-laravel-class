<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class WebProgrammingController extends Controller
{
    public function index()
    {
        // 1. Basic variables and data
        $name = "Rendra Mahardika";
        $age = 29;
        $height = 1.73;
        $isActive = true;
        $finalGrade = 85;
        
        // 2. Courses data
        $courses = [
            [
                'course_code' => 'WDP1',
                'course_name' => 'Pemrograman Web Dasar',
                'credit' => 3,
                'status' => 'Aktif',
                'participant_total' => 45
            ],
            [
                'course_code' => 'WDP2',
                'course_name' => 'Pemrograman Web Lanjutan',
                'credit' => 3,
                'status' => 'Aktif',
                'participant_total' => 38
            ],
            [
                'course_code' => 'PBO',
                'course_name' => 'Pemrograman Berorientasi Objek',
                'credit' => 4,
                'status' => 'Aktif',
                'participant_total' => 42
            ],
            [
                'course_code' => 'JARKOM',
                'course_name' => 'Jaringan Komputer',
                'credit' => 3,
                'status' => 'Tidak Aktif',
                'participant_total' => 0
            ],
            [
                'course_code' => 'MOBILE',
                'course_name' => 'Pemrograman Mobile',
                'credit' => 3,
                'status' => 'Aktif',
                'participant_total' => 35
            ]
        ];

        // Calculate totals
        $creditTotal = collect($courses)
            ->where('status', 'Aktif')
            ->sum('credit');
            
        $participantTotal = collect($courses)
            ->where('status', 'Aktif')
            ->sum('participant_total');
            
        $activeCoursesCount = collect($courses)
            ->where('status', 'Aktif')
            ->count();

        // 3. Rectangle area calculation
        $area = $this->countRectangleArea(10, 5);

        // 4. Current date and time
        $currentDateTime = now()->setTimezone('Asia/Jakarta')->format('d F Y H:i:s');

        return view('web-programming', compact(
            'name',
            'age',
            'height',
            'isActive',
            'finalGrade',
            'courses',
            'creditTotal',
            'participantTotal',
            'activeCoursesCount',
            'area',
            'currentDateTime'
        ));
    }

    /**
     * Show the contact form
     */
    public function showContactForm()
    {
        return view('contacts.form');
    }

    /**
     * Store a newly created contact in storage.
     */
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // // Save to database
        // Contact::create($validated);

        return redirect()->route('contacts.form')
            ->with('success', 'Data berhasil disimpan!')
            ->with('name', $validated['name'])
            ->with('email', $validated['email']);
    }

    private function countRectangleArea($panjang, $lebar)
    {
        return $panjang * $lebar;
    }
}
