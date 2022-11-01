<h1>Đây là danh sách sinh viên</h1>
<a href="{{ route('courses.index') }}">Xem danh sách khóa học</a>
<br>
<a href="{{ route('students.create') }}">Thêm</a>
<table border="1" width="100%" style="text-align: center;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Edit</th>
            <th>Del</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $values)
        <tr>
            <td>{{ $values->id }}</td>
            <td>{{ $values->nameStudent }}</td>
            <td>{{ $values->ageStudent }}</td>
            <td>{{ $values->genderStudent }}</td>
            <td>
                <a href="{{ route('students.edit', $values) }}">Sửa</a>
            </td>
            <td>
                <form action="{{ route('students.destroy', $values) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Del</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
