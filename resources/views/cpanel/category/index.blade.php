@extends('cpanel.index')

@section('page-title', auth('admin')->user()->name . ' Categories')

@section('styles')
    {{-- HERE IS YOUR LEFT ITEMS --}}
@endsection



@section('main-content')
    {{-- HERE IS YOUR MAIN CONTENT PAGE --}}
    <div class="row">
        <div class="col-12">
            <!-- Recent Order Table -->
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Categories</h2>
                    <div class="date-range-report ">
                        <span>Jan 12, 2022 - Feb 10, 2022</span>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th class="d-none d-md-table-cell">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>
                                        {{-- src="assets/img/user/user.png" --}}
                                        <img
                                            @if (is_null($category->image))
                                                src="{{asset('cpanel/assets/img/user/user.png')}}"
                                            @else
                                                src="{{asset('images/categories/' . $category->image)}}"
                                            @endif
                                        class="user-image" alt="User Image" style="width:40px; height: 40px;">
                                    </td>
                                    @php
                                        ++$no;
                                    @endphp
                                    <td>
                                        <a class="text-dark"
                                            href="{{ route('category.edit', $category->id) }}">{{ $category->name }}</a>
                                    </td>
                                    @if ($category->status)
                                        <td>
                                            <span class="badge badge-success">Avilable</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-danger">In-avilable</span>
                                        </td>
                                    @endif
                                    <td class="text-right">
                                        <div class="dropdown show d-inline-block widget-dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                                id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static"></a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdown-recent-order1">
                                                <li class="dropdown-item">
                                                    <a href="{{ route('category.edit', $category->id) }}">Edit</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#" id="Link"
                                                        onclick="confirmDestroy({{ $category->id }}, this)">Remove</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- HERE IS YOUR SCRIPTS --}}
    <script>
        function confirmDestroy(id, refranec) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    destroy(id, refranec);
                }
            });
        }

        function destroy(id, refranec) {
            // circle/category/teacher/{teacher}
            axios.delete('/tusaned-cpanel/category/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    refranec.closest('tr').remove();
                    showDeletingResult(response.data);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    showDeletingResult(error.response.data);
                })
                .then(function() {
                    // always executed
                });
        }

        function showDeletingResult(data) {
            Swal.fire({
                icon: data.icon,
                title: data.title,
                text: data.text,
                showConfirmButton: false,
                timer: 2000
            });
        }
    </script>
@endsection
