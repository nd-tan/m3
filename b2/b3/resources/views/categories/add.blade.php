add
<form action="{{route('categories.store')}}" method="post">
    @csrf
    @method('POST')
<p>name</p>
<input type="text" name="name" id="">
<input type="submit" value="create">
</form>
