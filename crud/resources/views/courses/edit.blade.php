<form action="{{ route('courses.update', $name_course)}}" method="post">
    @csrf
    @method('PUT')
    Name
    <input type="text" name="name_course" value="{{ $name_course->name_course }}">
    <br>
{{--    <a href="{{ route('course.index') }}">Cancel</a>--}}
    <button type="submit">Submit</button>
</form>
