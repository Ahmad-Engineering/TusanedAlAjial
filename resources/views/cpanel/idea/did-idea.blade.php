@extends('cpanel.index')

@section('page-title', 'Un-active Idea')

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
                    <h2>Un-active Idea</h2>
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
                                <th class="d-none d-md-table-cell">Persone</th>
                                <th class="d-none d-md-table-cell">Phone</th>
                                <th class="d-none d-md-table-cell">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($ideas as $idea)
                                <tr>
                                    <td>{{ $no }}</td>
                                    @php
                                        ++$no;
                                    @endphp
                                    <td class="d-none d-md-table-cell">{{ $idea->idea_name }}</td>
                                    <td class="d-none d-md-table-cell">{{ $idea->full_name }}</td>
                                    <td class="d-none d-md-table-cell">{{ $idea->phone }}</td>
                                    @if ($idea->done)
                                        <td>
                                            <span class="badge badge-danger">Done</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-success">In-Mind</span>
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
                                                    <a href="#" id="Link" onclick="undoneIdea({{ $idea->id }})">Did</a>
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
        function undoneIdea(id) {
            axios.get('/tusaned-cpanel/undone-idea/' + id + '/idea')
                .then(function(response) {
                    // handle success
                    console.log(response);
                    window.location.href = '/tusaned-cpanel/did-ideas';
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
