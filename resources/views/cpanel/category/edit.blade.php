@extends('cpanel.index')


@section('page-title', 'Update ' . $category->name)

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
                <h2>Update {{$category->name}}</h2>
            </div>
            <div class="card-body">
                <form id="create-form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name"
                        value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label for="category_image">Upload category image</label>
                        <input type="file" class="form-control-file" id="category_image">
                    </div>
                    <div class="form-group">
                        <label for="status">Category Status</label>
                        <select class="form-control" id="status">
                            <option value="active"
                                @if ($category->status)
                                    selected
                                @endif
                            >Active</option>
                            <option value="blocked"
                            @if (!$category->status)
                                selected
                            @endif
                            >In-active</option>
                        </select>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="button" class="btn btn-primary btn-default" onclick="update({{$category->id}})">Update</button>
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
            window.location.href = '/tusaned-cpanel/category/';
        }

        function update(id) {
            formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('status', document.getElementById('status').value == 'active' ? 1 : 0);
            formData.append('category_image', document.getElementById('category_image').files[0]);

            axios.post('/tusaned-cpanel/update-category/' + id, formData)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    window.location.href = '/tusaned-cpanel/category/';
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
