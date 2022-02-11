@extends('cpanel.index')

@section('page-title', 'Blocked Persones')

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
                    <h2>Blocked Persones</h2>
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
                                <th class="d-none d-md-table-cell">PIN</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($persones as $persone)
                                <tr>
                                    <td>{{ $no }}</td>
                                    @php
                                        ++$no;
                                    @endphp
                                    <td class="d-none d-md-table-cell">{{ $persone->name }}</td>
                                    <td class="d-none d-md-table-cell">{{ $persone->phone }}</td>
                                    <td class="d-none d-md-table-cell">{{ $persone->pin }}</td>
                                    <td class="text-right">
                                        <div class="dropdown show d-inline-block widget-dropdown">
                                            <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                                id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static"></a>
                                            <ul class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdown-recent-order1">
                                                <li class="dropdown-item">
                                                    <a href="#" id="Link" onclick="unblockPersone({{ $persone->id }})">Unblocked</a>
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
        function unblockPersone(id) {
            axios.put('/tusaned-cpanel/unblock-persone/' + id + '/persone')
                .then(function(response) {
                    // handle success
                    console.log(response);
                    window.location.href = '/tusaned-cpanel/blocked-persone';
                    toastr.success(response.data.message);
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
