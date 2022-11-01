<form action="{{ route('courses.store')}}" method="post">
    @csrf
    Name
    <input type="text" name="name_course">
    <br>
    <button type="submit">Add</button>
</form>
