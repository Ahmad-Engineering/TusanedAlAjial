@extends('cpanel.parent')


@section('page-title', 'Admin Dashboard')

@section('styles')
    {{-- HERE IS YOUR STYLES --}}
@endsection

@section('item')
    {{-- HERE IS YOUR LEFT ITEMS --}}
    <li class="has-sub">
        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts"
            aria-expanded="false" aria-controls="charts">
            <i class="mdi mdi-account"></i>
            <span class="nav-text">Admin</span> <b class="caret"></b>
        </a>
        <ul class="collapse" id="charts" data-parent="#sidebar-menu">
            <div class="sub-menu">



                <li>
                    <a class="sidenav-item-link" href="{{ route('admin.index') }}" id="Link1">
                        <span class="nav-text">Browes</span>

                    </a>
                </li>

                <li>
                    <a class="sidenav-item-link" href="{{ route('admin.create') }}" id="Link1">
                        <span class="nav-text">Add admin</span>

                    </a>
                </li>




            </div>
        </ul>
    </li>
@endsection

@section('main-content')
    {{-- HERE IS YOUR MAIN CONTENT PAGE --}}
@endsection

@section('scripts')
    {{-- HERE IS YOUR SCRIPTS --}}

@endsection
