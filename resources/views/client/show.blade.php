@extends('admin.layout')

@section('content')

<h3 class="mt-4">Client: {{ $client->name }} {{ $client->surname }}</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> There were problems with your submission.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $client->name }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <strong>Surname:</strong>
                {{ $client->surname }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <strong>Email address:</strong>
                {{ $client->email }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <strong>RSA ID number:</strong>
                {{ $client->rsa_id }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <strong>Mobile number:</strong>
                {{ $client->mobile_number }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <strong>Date of birth:</strong>
                {{ $client->date_of_birth }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <strong>Language:</strong>
                {{ $client->language->name }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <strong>Interests:</strong>
                {{ $interests }}
            </div>
        </div>
    </div>
</div>

<form action="{{ route('client.destroy', $client->id) }}" method="POST" onSubmit="onSubmit()">
    @csrf
    <a class="btn btn-primary" href="{{ route('dashboard') }}">&#11013; Back</a>
    <a class="btn btn-primary" href="{{ route('client.edit', $client->id) }}">&#128394; Edit</a>
    @method('DELETE')
    <button type="submit" class="btn btn-danger" id="delete">&#10060; Delete</button>
</form>

<script>
function onSubmit() {
    document.getElementById('delete').disabled = true;
}
</script>

@endsection
