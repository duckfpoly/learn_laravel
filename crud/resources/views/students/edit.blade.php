{{--<form action="{{ route('students.update', $student)}}" method="post">--}}
{{--    @csrf--}}
{{--    @method('PUT')--}}
{{--    Name--}}
{{--    <input type="text" name="name_course" value="{{ $name_course->name_course }}">--}}
{{--    <br>--}}
{{--    --}}{{--    <a href="{{ route('course.index') }}">Cancel</a>--}}
{{--    <button type="submit">Submit</button>--}}
{{--</form>--}}

<form action="{{ route('students.update', $students) }}" method="post">
    @csrf
    @method('PUT')
    <label for="">First name</label>
    <input type="text" name="first_name" value="{{ $students->first_name }}">
    <br>
    <label for="">Last name</label>
    <input type="text" name="last_name"  value="{{ $students->last_name }}">
    <br>
    <label for="">Gender</label>
    <input type="radio" name="gender" id="" value="0" {{ $students->gender == 0 ? 'checked' : ''}} > Male
    <input type="radio" name="gender" id="" value="1" {{ $students->gender == 1 ? 'checked' : ''}} > Female
    <br>
    <label for="">Birthday</label>
    <input type="date" name="birthday" id=""  value="{{ $students->birthday }}">
    <button type="submit">submit</button>
    <br>
    <a href="{{ route('students.index') }}">Cancel</a>
</form>
