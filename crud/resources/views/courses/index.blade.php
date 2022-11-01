<h1>Danh sách khóa học</h1>
<a href="{{ route('students.index') }}">Xem danh sách sinh viên</a>
<br>
<a href="{{ route('courses.create') }}">Thêm</a>
<table border="1" width="100%">
    <thead >
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Create At</th>
        <th>Edit</th>
        <th>Del</th>
    </tr>
    </thead>
    <tbody>
    @foreach($courses as $values)
        <tr>
            <td>{{ $values->id }}</td>
            <td>{{ $values->name_course }}</td>
            <td>{{ $values->year_create_at }}</td>
            <td>
                <a href="{{ route('courses.edit', $values) }}">Sửa</a>
            </td>
            <td>
                <form action="{{ route('courses.destroy', $values) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Del</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
