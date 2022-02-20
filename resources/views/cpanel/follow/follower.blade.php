@extends('cpanel.index')

@section('page-title', $admin->name . ' Followers')

@section('main-content')
    <div class="col-sm-12 col-lg-6 col-xl-12">
        <div class="card card-table-border-none" data-scroll-height="580" style="height: auto; overflow: auto;">
            <div class="card-header justify-content-between">
                <h2 class="d-inline-block">{{ $admin->name . ' Followers' }}</h2>
                <div>
                    <button class="text-black-50 mr-2 font-size-20">
                        <i class="mdi mdi-cached"></i>
                    </button>
                    <div class="dropdown show d-inline-block widget-dropdown">
                        <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-customar"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-customar">
                            <li class="dropdown-item"><a href="#">Action</a></li>
                            <li class="dropdown-item"><a href="#">Another action</a></li>
                            <li class="dropdown-item"><a href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <table class="table ">
                    <tbody>

                        @foreach ($followers as $follower)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="media-image mr-3 rounded-circle">
                                            <a href="{{ route('my.profile.posts', $follower->id) }}"><img
                                                    class="rounded-circle w-45"
                                                    src="{{ asset('/images/admins/' . $follower->image) }}"
                                                    alt="customer image"></a>
                                        </div>
                                        <div class="media-body align-self-center">
                                            <a href="{{ route('my.profile.posts', $follower->id) }}">
                                                <h6 class="mt-0 text-dark font-weight-medium">{{ $follower->name }}</h6>
                                            </a>
                                            <small>
                                                @php
                                                    $username = explode('@', $follower->email);
                                                @endphp
                                                {{ $username[0] }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $follower->follower_no }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
