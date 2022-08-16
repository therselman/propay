@extends('admin.layout')

@section('content')

<table class="table table-bordered mt-4">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email Address</th>
        <th>Actions</th>
    </tr>
    @foreach ($clients as $client)
    <tr>
        <td>{{ $client->id }}</td>
        <td>{{ $client->name }}</td>
        <td>{{ $client->surname }}</td>
        <td>{{ $client->email }}</td>
        <td>
            <form action="{{ route('client.destroy', $client->id) }}" method="POST" onSubmit="onSubmit()">
                @csrf
                <a class="btn btn-info" href="{{ route('client.show', $client->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('client.edit', $client->id) }}">Edit</a>
                @method('DELETE')
                <button type="submit" class="btn btn-danger" id="delete">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<a class="btn btn-primary" href="{{ route('client.create') }}">New Client</a>

<script>
function onSubmit() {
    document.getElementById('delete').disabled = true;
}
</script>

@endsection
