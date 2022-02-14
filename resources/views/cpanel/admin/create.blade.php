@extends('cpanel.index')


@section('page-title', 'Add new admin')

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
                <h2>Add new admin</h2>
            </div>
            <div class="card-body">
                <form id="create-form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <input type="text" class="form-control" id="bio" placeholder="Enter BIO">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email">
                        <span class="mt-2 d-block">We'll never share your email with anyone else.</span>
                    </div>
                    <div class="form-group">
                        <label for="pin">PIN</label>
                        <input type="text" class="form-control" id="pin"
                            placeholder="Enter Personal Identification Number">
                        <span class="mt-2 d-block">We'll never share your PIN with anyone else.</span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" placeholder="Enter Age">
                        <span class="mt-2 d-block">New admin age should be between 18-80y old.</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" placeholder="Password"
                            value="{{ $password }}">
                        <span class="mt-2 d-block">We'll never share your password with anyone else.</span>
                    </div>
                    <div class="form-group">
                        <label for="admin_image">Upload admin image</label>
                        <input type="file" class="form-control-file" id="admin_image">
                    </div>
                    <div class="form-group">
                        <label for="status">Admin Status</label>
                        <select class="form-control" id="status">
                            <option value="active">Active</option>
                            <option value="blocked">Blocked</option>
                        </select>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="button" class="btn btn-primary btn-default" onclick="store()">Add</button>
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

        function store() {
            formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('pin', document.getElementById('pin').value);
            formData.append('phone', document.getElementById('phone').value);
            formData.append('age', document.getElementById('age').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('bio', document.getElementById('bio').value);
            formData.append('admin_image', document.getElementById('admin_image').files[0]);

            axios.post('/tusaned-cpanel/admin', formData)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    document.getElementById('create-form').reset();
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
