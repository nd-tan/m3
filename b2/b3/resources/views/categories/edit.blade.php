add
<form action="{{route('categories.update',$item->id)}}" method="post">
    @csrf
    @method('PUT')
<p>name</p>
<input type="text" name="name" value="{{$item->name}}">
<input type="submit" value="create">
</form>
