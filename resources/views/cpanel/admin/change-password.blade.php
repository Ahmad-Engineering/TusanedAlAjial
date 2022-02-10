@extends('cpanel.index')


@section('page-title', 'Change admin password')

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
                <h2>Change {{ $admin->name }} password</h2>
            </div>
            <div class="card-body">
                <form id="create-form">
                    <div class="form-group">
                        <label for="new_password">Password</label>
                        <input type="password" class="form-control" id="new_password" placeholder="New Password">
                        <span class="mt-2 d-block">Never share password with anyone else.</span>
                    </div>
                    <div class="form-group">
                        <label for="re_password">Re-Password</label>
                        <input type="password" class="form-control" id="re_password" placeholder="Re-new Password">
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="button" class="btn btn-primary btn-default" onclick="changeAdminPassword({{$admin->id}})">Change</button>
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

        function changeAdminPassword(id) {
            axios.put('/tusaned-cpanel/change-password/' + id + '/admin', {
                    new_password: document.getElementById('new_password').value,
                    re_password: document.getElementById('re_password').value,
                })
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
