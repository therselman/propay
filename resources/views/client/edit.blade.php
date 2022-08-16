@extends('admin.layout')

@section('content')

<h3 class="mt-4">Edit client: {{ $client->name }} {{ $client->surname }}</h3>

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

<form action="{{ route('client.update', $client->id) }}" method="post" onSubmit="onSubmit()">
    @csrf
    @method('PUT')

     <div class="row mt-4">
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" required placeholder="Enter first name" value="{{ $client->name }}">
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Surname:</strong>
                <input type="text" name="surname" class="form-control" required placeholder="Enter surname" value="{{ $client->surname }}">
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Email address:</strong>
                <input type="text" name="email" class="form-control" required placeholder="Enter email address" value="{{ $client->email }}">
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>RSA ID number:</strong>
                <input type="text" class="form-control" required disabled value="{{ $client->rsa_id }}">
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Mobile number:</strong>
                <input type="text" name="mobile_number" class="form-control" required placeholder="Enter mobile number" value="{{ $client->mobile_number }}">
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Date of birth:</strong>
                <input type="text" name="date_of_birth" class="form-control" required placeholder="Date of birth" value="{{ $client->date_of_birth }}">
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Language:</strong>
                <select class="form-control form-select" name="language_id" required>
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}" {{ $client->language_id == $language->id ? 'selected' : '' }}>{{ $language->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Interests:</strong>
                <select class="form-control form-select" size="8" multiple name="interests[]">
                    @foreach($interests as $interest)
                        <option value="{{ $interest->id }}" {{ in_array($interest->id, $interest_ids) ? 'selected' : '' }}>{{ $interest->description}}</option>
                    @endforeach
                </select>
                <sub>Select multiple items by using Ctrl-click</sub>
            </div>
        </div>
        <div class="col-12 text-center mt-4">
            <a class="btn btn-danger float-end" href="{{ route('dashboard') }}" id="cancel">Cancel</a>
            <button type="submit" class="btn btn-primary float-start" id="submit">Submit</button>
        </div>
    </div>

</form>

<script>
function onSubmit() {
    document.getElementById('submit').disabled = true;
    document.getElementById('cancel').style.display = 'none';
}
</script>

@endsection
