@extends('cpanel.index')

@section('page-title', 'Contact us')

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
                    <h2>Contact Us Request</h2>
                    <div class="date-range-report ">
                        <span>Jan 12, 2022 - Feb 10, 2022</span>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th class="d-none d-md-table-cell">Phone</th>
                                <th class="d-none d-md-table-cell">E-mail</th>
                                <th class="d-none d-md-table-cell">Msg</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $no }}</td>
                                    @php
                                        ++$no;
                                    @endphp
                                    <td>
                                        <a class="text-dark"
                                            href="#">{{ $contact->full_name }}</a>
                                    </td>
                                    <td class="d-none d-md-table-cell">{{ $contact->phone }}</td>
                                    <td class="d-none d-md-table-cell">{{ $contact->email }}</td>
                                    <td class="d-none d-md-table-cell">{{ $contact->msg }}</td>
                                    <td class="text-right">
                                        <div class="dropdown show d-inline-block widget-dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                                id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static"></a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdown-recent-order1">
                                                {{-- <li class="dropdown-item">
                                                    <a href="{{ route('contact.edit', $contact->id) }}">Edit</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="{{ route('contact.change.password', $contact->id) }}">Change
                                                        password</a>
                                                </li> --}}
                                                <li class="dropdown-item">
                                                    <a href="#" id="Link"
                                                        onclick="confirmDestroy({{ $contact->id }}, this)">Finished</a>
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
            // circle/contact/teacher/{teacher}
            axios.delete('/tusaned/contact-us-sending/' + id)
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
