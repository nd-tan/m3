<a href="add">them</a>

@foreach ($items as $item)
    <p>{{ $item['name'] }}</p>
    <a href="{{ route('edit', $item->id) }}">sua</a>
    <form action="{{ route('destroy', $item->id) }}" method="post">
        @csrf

        <input type="submit" value="xoa">
    </form>
@endforeach
