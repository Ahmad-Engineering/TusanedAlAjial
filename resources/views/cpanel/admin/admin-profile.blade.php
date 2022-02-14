@extends('cpanel.index')

@section('page-title', auth('admin')->user()->name)

@section('main-content')
    {{-- HERE IS YOUR MAIN CONTENT PAGE --}}
    <div class="bg-white border rounded">
        <div class="row no-gutters">
            <div class="col-lg-4 col-xl-3">
                <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                    <div class="card text-center widget-profile px-0 border-0">
                        <div class="card-img mx-auto rounded-circle">
                            <img {{-- @if (is_null(auth('admin')->user()->image))
                                asset('cpanel/assets/img/user/u6.jpg')
                            @endif --}}
                                @if (is_null(auth('admin')->user()->image)) src="{{ asset('cpanel/assets/img/user/user.png') }}"
                                @else
                                    src="{{ asset('images/admins/' . auth('admin')->user()->image) }}" @endif
                                alt="user image">
                        </div>
                        <div class="card-body">
                            <h5 class="py-2 text-dark">{{ auth('admin')->user()->name }}</h5>
                            <p>
                                @php
                                    $username = explode('@', auth('admin')->user()->email);
                                @endphp
                                {{ $username[0] }}
                            </p>
                            <a class="btn btn-primary btn-pill btn-lg my-4" href="#">Follow</a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between ">
                        <div class="text-center pb-4">
                            <h6 class="text-dark pb-2">1503</h6>
                            <p>Friends</p>
                        </div>
                        <div class="text-center pb-4">
                            <h6 class="text-dark pb-2">2905</h6>
                            <p>Followers</p>
                        </div>
                        <div class="text-center pb-4">
                            <h6 class="text-dark pb-2">1200</h6>
                            <p>Following</p>
                        </div>
                    </div>
                    <hr class="w-100">
                    <div class="contact-info pt-4">
                        <h5 class="text-dark mb-1">Contact Information</h5>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
                        <p>{{ auth('admin')->user()->email }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
                        <p>{{ auth('admin')->user()->phone }}</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Birthday</p>
                        <p>Nov 15, 1990</p>
                        <p class="text-dark font-weight-medium pt-4 mb-2">Social Profile</p>
                        <p class="pb-3 social-button">
                            <a href="{{ $links->twitter }}" class="mb-1 btn btn-outline btn-twitter rounded-circle">
                                <i class="mdi mdi-twitter"></i>
                            </a>
                            <a href="{{ $links->linkedin }}" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
                                <i class="mdi mdi-linkedin"></i>
                            </a>
                            <a href="{{ $links->facebook }}" class="mb-1 btn btn-outline btn-facebook rounded-circle">
                                <i class="mdi mdi-facebook"></i>
                            </a>
                            <a href="{{ $links->skype }}" class="mb-1 btn btn-outline btn-skype rounded-circle">
                                <i class="mdi mdi-skype"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="profile-content-right py-5">
                    <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab"
                                aria-controls="timeline" aria-selected="true">Timeline</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab"
                                aria-controls="settings" aria-selected="false">Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content px-3 px-xl-5" id="myTabContent">
                        <div class="tab-pane fade active show" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                            <div class="media mt-5 profile-timeline-media">
                                <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                                    <img src="{{ asset('cpanel/assets/img/user/u3.jpg') }}"
                                        alt="Generic placeholder image">
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 text-dark">Larissa Gebhardt</h6>
                                    <span>Designer</span>
                                    <span class="float-right">5 mins ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore
                                        magna aliqua. ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi
                                        ut aliquip.</p>
                                    <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                        <img src="{{ asset('cpanel/assets/img/products/pa1.jpg') }}" alt="Product">
                                    </div>
                                    <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                        <img src="{{ asset('cpanel/assets/img/products/pa2.jpg') }}" alt="Product">
                                    </div>
                                    <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                        <img src="{{ asset('cpanel/assets/img/products/pa3.jpg') }}" alt="Product">
                                    </div>
                                </div>
                            </div>
                            <div class="media mt-5 profile-timeline-media">
                                <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                                    <img src="{{ asset('cpanel/assets/img/user/u4.jpg') }}"
                                        alt="Generic placeholder image">
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 text-dark">Walter Reuter</h6>
                                    <span>Designer</span>
                                    <span class="float-right">2 hrs ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore
                                        magna aliqua. ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi
                                        ut aliquip.</p>

                                </div>
                            </div>
                            <div class="media mt-5 profile-timeline-media">
                                <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                                    <img src="{{ asset('cpanel/assets/img/user/u7.jpg') }}"
                                        alt="Generic placeholder image">
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 text-dark">Albrecht Straub</h6>
                                    <span>Designer</span>
                                    <span class="float-right">5 days ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore
                                        magna aliqua. ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi
                                        ut aliquip.</p>
                                    <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                        <img src="{{ asset('cpanel/assets/img/products/pa4.jpg') }}" alt="Product">
                                    </div>
                                </div>
                            </div>
                            <div class="media mt-5 profile-timeline-media">
                                <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                                    <img src="{{ asset('cpanel/assets/img/user/u8.jpg') }}"
                                        alt="Generic placeholder image">
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 text-dark">Selena Wagner</h6>
                                    <span>Designer</span>
                                    <span class="float-right">Mar 05, 2018</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore
                                        magna aliqua. ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi
                                        ut aliquip.</p>
                                    <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                        <img src="{{ asset('cpanel/assets/img/products/pa5.jpg') }}" alt="Product">
                                    </div>
                                    <div class="d-inline-block rounded overflow-hidden mt-4 mr-0 mr-lg-4">
                                        <img src="{{ asset('cpanel/assets/img/products/pa6.jpg') }}" alt="Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            {{-- START OF THE PROFILE --}}
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-header card-header-border-bottom">
                                        <h2>{{auth('admin')->user()->name}} </h2>
                                    </div>
                                    <div class="card-body">
                                        <form id="create-form">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                                    value="{{auth('admin')->user()->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="bio">Bio</label>
                                                <input type="text" class="form-control" id="bio" placeholder="Enter BIO"
                                                    value="{{auth('admin')->user()->bio}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Email address</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Enter Email" value="{{auth('admin')->user()->email}}">
                                                <span class="mt-2 d-block">We'll never share your email with anyone
                                                    else.</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="pin">PIN</label>
                                                <input type="text" class="form-control" id="pin"
                                                    placeholder="Enter Personal Identification Number"
                                                    value="{{auth('admin')->user()->pin}}">
                                                <span class="mt-2 d-block">We'll never share your PIN with anyone
                                                    else.</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone"
                                                    placeholder="Enter Phone" value="{{auth('admin')->user()->phone}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="age">Age</label>
                                                <input type="number" class="form-control" id="age" placeholder="Enter Age"
                                                    value="{{auth('admin')->user()->age}}">
                                                <span class="mt-2 d-block">New admin age should be between 18-80y
                                                    old.</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Admin Status</label>
                                                <select class="form-control" id="status">
                                                    <option value="active"
                                                        @if (auth('admin')->user()->status == 'active') selected @endif>Active</option>
                                                    <option value="blocked"
                                                        @if (auth('admin')->user()->status == 'blocked') selected @endif>Blocked</option>
                                                </select>
                                            </div>
                                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                                <button type="button" class="btn btn-primary btn-default"
                                                    onclick="update({{auth('admin')->user()->id}})">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- HERE IS YOUR SCRIPTS --}}
    <script>
        function update(id) {
            axios.put('/tusaned-cpanel/admin/' + id, {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    pin: document.getElementById('pin').value,
                    phone: document.getElementById('phone').value,
                    age: document.getElementById('age').value,
                    status: document.getElementById('status').value,
                    bio: document.getElementById('bio').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    document.getElementById('create-form').reset();
                    window.location.href = '/tusaned-cpanel/profile';
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
