<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with(['teacher', 'category'])->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::orderBy('last_name')->get();
        $categories = Category::orderBy('name')->get();
        return view('courses.create', compact('teachers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        Course::create($validated);
        return redirect()->route('courses.index')
            ->with('success', 'Курс успешно создан.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return redirect()->route('courses.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $teachers = Teacher::orderBy('last_name')->get();
        $categories = Category::orderBy('name')->get();
        return view('courses.edit', compact('course', 'teachers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $course->update($validated);
        return redirect()->route('courses.index')
            ->with('success', 'Курс успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
            ->with('success', 'Курс успешно удален.');
    }
}
