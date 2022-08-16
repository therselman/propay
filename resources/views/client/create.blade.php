@extends('admin.layout')

@section('content')

<h3 class="mt-4">Create client</h3>

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

<form action="{{ route('client.store') }}" method="post" onSubmit="onSubmit()">
    @csrf

     <div class="row mt-4">
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" required placeholder="Enter first name">
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Surname:</strong>
                <input type="text" name="surname" class="form-control" required placeholder="Enter surname">
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Email address:</strong>
                <input type="text" name="email" class="form-control" required placeholder="Enter email address">
                <sub><span class="text-danger fw-bold">WARNING:</span> An email is sent to this address!</sub>
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>RSA ID number:</strong>
                <input type="text" name="rsa_id" class="form-control" required placeholder="Enter RSA ID number eg. 800420 3452 084">
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Mobile number:</strong>
                <input type="text" name="mobile_number" class="form-control" required placeholder="Enter mobile number eg. 083 123 4567">
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Date of birth:</strong> <span style="font-size: x-small;">YYYY-MM-DD</span>
                <input type="text" name="date_of_birth" class="form-control" required placeholder="Date of birth eg. 1980-04-20">
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Language:</strong>
                <select class="form-control form-select" name="language_id" required>
                    <option value="" disabled selected>Language</option>
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="form-group">
                <strong>Interests:</strong>
                <select class="form-control form-select" size="8" multiple name="interests[]">
                    @foreach($interests as $interest)
                        <option value="{{ $interest->id }}">{{ $interest->description}}</option>
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
