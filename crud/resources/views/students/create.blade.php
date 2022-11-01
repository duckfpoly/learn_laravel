<form action="{{ route('students.store') }}" method="post">
    @csrf
    <label for="">First name</label>
    <input type="text" name="first_name">
    <br>
    <label for="">Last name</label>
    <input type="text" name="last_name">
    <br>
    <label for="">Gender</label>
    <input type="radio" name="gender" id="" value="0"> Male
    <input type="radio" name="gender" id="" value="1"> Female
    <br>
    <label for="">Birthday</label>
    <input type="date" name="birthday" id="">
    <button type="submit">Add</button>
</form>
