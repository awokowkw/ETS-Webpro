<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = Course::orderBy('start_time')->get();
        $enrolled = Enrollment::where('user_id', $user->id)->pluck('course_id')->toArray();

        return view('user.dashboard', compact('courses', 'enrolled'));
    }

    public function enroll(Course $course)
    {
        $user = auth()->user();

        if ($user->enrollments()->where('course_id', $course->id)->exists()) {
            return back()->with('error', 'You are already enrolled in this course.');
        }

        $enrolledCount = $course->enrollments()->count();
        if ($enrolledCount >= $course->quota) {
            return back()->with('error', 'Sorry, this course is already full.');
        }

        $user->enrollments()->create([
            'course_id' => $course->id,
            'enrolled_at' => now(),
        ]);

        return back()->with('success', 'You have successfully joined the course.');
    }


    public function leave(Course $course)
    {
        $user = Auth::user();

        Enrollment::where('user_id', $user->id)
                  ->where('course_id', $course->id)
                  ->delete();

        return back()->with('success', 'You have left the course.');
    }
}
