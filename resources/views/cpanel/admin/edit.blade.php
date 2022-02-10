@extends('cpanel.index')


@section('page-title', 'Update admin')

@section('styles')
    {{-- HERE IS YOUR STYLES --}}
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('cpanel/toastr/toastr.min.css') }}">
@endsection

@section('main-content')
    {{-- HERE IS YOUR MAIN CONTENT PAGE --}}
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit {{ $admin->name }}</h2>
            </div>
            <div class="card-body">
                <form id="create-form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name"
                            value="{{ $admin->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email"
                            value="{{ $admin->email }}">
                        <span class="mt-2 d-block">We'll never share your email with anyone else.</span>
                    </div>
                    <div class="form-group">
                        <label for="pin">PIN</label>
                        <input type="text" class="form-control" id="pin"
                            placeholder="Enter Personal Identification Number" value="{{ $admin->pin }}">
                        <span class="mt-2 d-block">We'll never share your PIN with anyone else.</span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone"
                            value="{{ $admin->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" placeholder="Enter Age"
                            value="{{ $admin->age }}">
                        <span class="mt-2 d-block">New admin age should be between 18-80y old.</span>
                    </div>
                    <div class="form-group">
                        <label for="status">Admin Status</label>
                        <select class="form-control" id="status">
                            <option value="active" @if ($admin->status)
                                selected
                                @endif
                                >Active</option>
                            <option value="blocked" @if (!$admin->status)
                                selected
                                @endif
                                >Blocked</option>
                        </select>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="button" class="btn btn-primary btn-default"
                            onclick="update({{ $admin->id }})">Edit</button>
                        <button type="button" class="btn btn-secondary btn-default"
                            onclick="cancelationAddingNewAdmin()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- HERE IS YOUR SCRIPTS --}}
    <script>
        // TO CANCEL ADDING NEW ADMIN
        function cancelationAddingNewAdmin() {
            window.location.href = '/tusaned-cpanel/admin/';
        }

        function update(id) {
            axios.put('/tusaned-cpanel/admin/' + id, {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    pin: document.getElementById('pin').value,
                    phone: document.getElementById('phone').value,
                    age: document.getElementById('age').value,
                    status: document.getElementById('status').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    document.getElementById('create-form').reset();
                    window.location.href = '/tusaned-cpanel/admin';
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message)
                })
                .then(function() {
                    // always executed
                });
        }
    </script>
@endsection
