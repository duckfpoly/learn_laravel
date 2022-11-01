<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Hiển thị danh sách
    public function index()
    {
        $students = Student::all();
        return view('students.index',[
            'students' => $students,
        ]);
    }

    // Hiển thị form thêm mới
    public function create()
    {
        return view('students.create');
    }

    // Xử lý thêm đối tượng
    public function store(Request $request)
    {
        $student = new Student();
        $student->fill($request->except('_token'));
        $student->save();
        return redirect()->route('students.index');
    }

    // Hiển thị chi tiết đối tượng được chỉ định
    public function show(Student $student)
    {

    }

    // Hiển thị form chỉnh sửa đối tượng được chỉ định
    public function edit(Student $student)
    {
        return view('students.edit',[
            'students' => $student,
        ]);
    }

    // Xử lý update đối tượng được chỉ định
    public function update(Request $request, Student $student)
    {
        $student->update(
            $request->except([
                '_token',
                '_method',
            ])
        );
        return redirect()->route('students.index');
    }

    // Xóa đối tượng được chỉ định
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
