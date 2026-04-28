<?php
use App\Models\Students;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Mock Auth
$user = User::whereHas('roles', function($q){ $q->where('name', 'Super Admin'); })->first();
Auth::login($user);

$student = Students::with('user.extra_student_details.form_field', 'guardian', 'class_section.class.stream', 'class_section.section', 'class_section.medium', 'session_year')->first();

if ($student) {
    print_r($student->toArray());
} else {
    echo "No students found";
}
