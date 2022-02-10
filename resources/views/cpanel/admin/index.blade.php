@extends('cpanel.index')

@section('page-title', 'Admins')

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
                    <h2>Admins</h2>
                    <div class="date-range-report ">
                        <span>Jan 12, 2022 - Feb 10, 2022</span>
                    </div>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th class="d-none d-md-table-cell">Phone</th>
                                <th class="d-none d-md-table-cell">E-mail</th>
                                <th class="d-none d-md-table-cell">PIN</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>
                                        <a class="text-dark" href="">{{ $admin->name }}</a>
                                    </td>
                                    <td class="d-none d-md-table-cell">{{ $admin->phone }}</td>
                                    <td class="d-none d-md-table-cell">{{ $admin->email }}</td>
                                    <td class="d-none d-md-table-cell">{{ $admin->pin }}</td>
                                    @if ($admin->status)
                                        <td>
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-danger">Blocked</span>
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
                                                    <a href="#">View</a>
                                                </li>
                                                <li class="dropdown-item">
                                                    <a href="#">Remove</a>
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
@endsection
