<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index',[
            'courses' => $courses,
        ]);
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
//        $object = new Course();
//        $object->fill($request->except('_token'));
//        $object->save();

        Course::create($request->except('_token'));
        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        //
    }

    public function edit(Course $course)
    {
        return view('courses.edit',[
            'name_course' => $course,
        ]);
    }

    public function update(Request $request, Course $course)
    {

//        $course->update(
//            $request->except([
//                '_token',
//                '_method',
//            ])
//        );

//        $course->update(
//            $request->except([
//                '_token',
//                '_method',
//            ])
//        );

        $course->fill($request->except('_token'));
        $course->save();
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}
