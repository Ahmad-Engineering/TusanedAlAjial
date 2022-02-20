@extends('cpanel.index')


@section('page-title', 'Community')

@section('styles')
    {{-- HERE IS YOUR STYLES --}}
@endsection

@section('main-content')
    {{-- HERE IS YOUR MAIN CONTENT PAGE --}}
    <div class="card card-table-border-none" id="recent-orders">
        <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
            <div class="card text-center widget-profile px-0 border-0">
                <div class="card-img mx-auto rounded-circle">
                    <img src="{{ asset('images/admins/' . $admin->image) }}" alt="user image">
                </div>
                <div class="card-body">
                    <h4 class="py-2 text-dark">{{ $admin->name }}</h4>
                    <p>{{ $admin->bio }}</p>
                    {{-- HERE DO YOUR FOLLOWING CODE --}}
                    <a @if (!is_null($follower)) class="btn btn-light btn-pill btn-lg my-4"
                        @else
                        class="btn btn-primary btn-pill btn-lg my-4" @endif
                        id="link" onclick="store({{ auth('admin')->user()->id }}, {{ $admin->id }})"
                        href="#">
                        @if (!is_null($follower)) Following
                        @else
                        Follow 
                        @endif
                    </a>
                </div>
            </div>
            <div class="d-flex justify-content-between ">
                <div class="text-center pb-4">
                    <h6 class="text-dark pb-2">{{ $post_count }}</h6>
                    <p>Posts</p>
                </div>
                <div class="text-center pb-4">
                    <h6 class="text-dark pb-2"><a href="{{route('show.follower', $admin->id)}}" style="color: black;">{{$followers}}</a></h6>
                    <p>Followers</p>
                </div>
                <div class="text-center pb-4">
                    <h6 class="text-dark pb-2"><a href="{{route('show.following', $admin->id)}}" style="color: black;">{{$followings}}</a></h6>
                    <p>Following</p>
                </div>
            </div>
            <hr class="w-100">
            <div class="contact-info pt-4">
                <h5 class="text-dark mb-1">Contact Information</h5>
                <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
                <p>{{ $admin->email }}</p>
                <p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
                <p>{{ $admin->phone }}</p>
                <p class="text-dark font-weight-medium pt-4 mb-2">Age</p>
                <p>{{ $admin->age }}</p>
                <p class="text-dark font-weight-medium pt-4 mb-2">Social Profile</p>
                <p class="pb-3 social-button">
                    <a href="{{ $admin->social->twitter }}" class="mb-1 btn btn-outline btn-twitter rounded-circle">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                    <a href="{{ $admin->social->linkedin }}" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
                        <i class="mdi mdi-linkedin"></i>
                    </a>
                    <a href="{{ $admin->social->facebook }}" class="mb-1 btn btn-outline btn-facebook rounded-circle">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                    <a href="{{ $admin->social->skype }}" class="mb-1 btn btn-outline btn-skype rounded-circle">
                        <i class="mdi mdi-skype"></i>
                    </a>
                </p>
            </div>
        </div>
        <div class="card-header justify-content-between">
            <h2>{{ 'Posts' }}</h2>
            <div class="date-range-report ">
                <span>Jan 17, 2022 - Feb 15, 2022</span>
            </div>
        </div>
        <div class="card-body pt-0 pb-5">
            @foreach ($posts as $post)
                <div class="media mt-5 profile-timeline-media">
                    <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                        <img src="{{ asset('/images/admins/' . $post->admin->image) }}" alt="Generic placeholder image">
                    </div>
                    <div class="media-body">
                        <h6 class="mt-0 text-dark"><a
                                href="{{ route('my.profile.posts', $post->admin->id) }}">{{ $post->admin->name }}</a>
                        </h6>
                        <span>{{ $post->category->name }}</span>
                        <span class="float-right">
                            @php
                                $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('Y-m-d');
                            @endphp
                            {{ $date }}
                        </span>
                        <p><b style="color: black;">{{ $post->title }}</b><br>
                            {{ $post->text }}</p>
                        <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                            {{-- src="{{asset('cpanel/assets/img/products/pa3.jpg')}}" --}}
                            <img @if (!is_null($post->image)) src="{{ asset('/images/posts/' . $post->image) }}"
                            @else
                                src="{{ asset('cpanel/assets/img/products/pa3.jpg') }}" @endif
                                alt="Product">
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    {{-- HERE IS YOUR SCRIPTS --}}
    <script>
        function store(follower, following) {
            // tusaned-cpanel/follow
            axios.post('/tusaned-cpanel/follow', {
                    admin_follower: follower,
                    admin_following: following,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    window.location.href = '/tusaned-cpanel/my-profile-posts/' + following + '/admin-profile';
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


{{-- <div class="tab-content px-3 px-xl-5" id="myTabContent">
    <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
        @foreach ($posts as $post)
        @endforeach
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
</div> --}}
