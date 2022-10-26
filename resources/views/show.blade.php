<form action="/tasks/update/{{ $data->id }}" method="post">
    @csrf
    <input type="text" name="name" value="{{ $data->name }}">
    <button type="submit">UPDATE</button>
</form>