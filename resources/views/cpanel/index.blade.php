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
    <li class="has-sub">
        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
            aria-expanded="false" aria-controls="pages">
            <i class="mdi mdi-cellphone"></i>
            <span class="nav-text">Contact</span> <b class="caret"></b>
        </a>
        <ul class="collapse" id="pages" data-parent="#sidebar-menu">
            <div class="sub-menu">
                <li>
                    <a class="sidenav-item-link" href="{{ route('contact-us-sending.index') }}">
                        <span class="nav-text">Browes</span>
                    </a>
                </li>
            </div>
        </ul>
    </li>
    <li class="has-sub">
        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#documentation"
            aria-expanded="false" aria-controls="documentation">
            <i class="mdi mdi-settings"></i>
            <span class="nav-text">Settings</span> <b class="caret"></b>
        </a>
        <ul class="collapse" id="documentation" data-parent="#sidebar-menu">
            <div class="sub-menu">

                <li class="section-title">
                    Account Settings
                </li>


                <li>
                    <a class="sidenav-item-link" href="{{ route('admin.edit', auth('admin')->user()->id) }}">
                        <span class="nav-text">Update Account</span>
                    </a>
                </li>






                <li>
                    <a class="sidenav-item-link" href="{{ route('admin.change.password', auth('admin')->user()->id) }}">
                        <span class="nav-text">Change Password</span>
                    </a>
                </li>






                <li>
                    <a class="sidenav-item-link" href="{{ route('admin.logout') }}">
                        <span class="nav-text">Logout</span>

                    </a>
                </li>






                <li class="section-title">
                    Tusaned Settings
                </li>





                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#headers"
                        aria-expanded="false" aria-controls="headers">
                        <span class="nav-text">Persones</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="headers">
                        <div class="sub-menu">

                            <li>
                                <a href="{{ route('persones.index') }}">Browes</a>
                            </li>

                            <li>
                                <a href="{{ route('blocked.persones') }}">Blocked User</a>
                            </li>

                        </div>
                    </ul>
                </li>




                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#sidebar-navs" aria-expanded="false" aria-controls="sidebar-navs">
                        <span class="nav-text">Ideas</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="sidebar-navs">
                        <div class="sub-menu">

                            <li>
                                <a href="{{ route('idea.index') }}">Browes</a>
                            </li>
                            <li>
                                <a href="{{ route('did.ideas') }}">Doing Ideas</a>
                            </li>


                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#events"
                        aria-expanded="false" aria-controls="events">
                        <span class="nav-text">Events</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="events">
                        <div class="sub-menu">

                            <li>
                                <a href="sidebar-open.html">Browes</a>
                            </li>


                        </div>
                    </ul>
                </li>

                {{-- <li>
                    <a class="sidenav-item-link" href="rtl.html">
                        <span class="nav-text">RTL Direction</span>

                    </a>
                </li> --}}




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
