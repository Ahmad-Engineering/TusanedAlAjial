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
                                aria-controls="timeline" aria-selected="true">Community</a>
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
                            {{-- THIS IS THE COMUNITY CODE --}}
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-header card-header-border-bottom">
                                        <h2>Let's creating new post</h2>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="post">What's in your mind ?!</label>
                                                <textarea class="form-control" id="post" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="post_image">Add an image</label>
                                                <input type="file" class="form-control-file" id="post_image">
                                            </div>
                                            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                                                <button type="button" onclick="posting()" class="btn btn-primary btn-default">Post</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            {{-- START OF THE PROFILE --}}
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-header card-header-border-bottom">
                                        <h2>{{ auth('admin')->user()->name }} </h2>
                                    </div>
                                    <div class="card-body">
                                        <form id="create-form">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                                    value="{{ auth('admin')->user()->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="bio">Bio</label>
                                                <input type="text" class="form-control" id="bio" placeholder="Enter BIO"
                                                    value="{{ auth('admin')->user()->bio }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Email address</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Enter Email" value="{{ auth('admin')->user()->email }}">
                                                <span class="mt-2 d-block">We'll never share your email with anyone
                                                    else.</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="pin">PIN</label>
                                                <input type="text" class="form-control" id="pin"
                                                    placeholder="Enter Personal Identification Number"
                                                    value="{{ auth('admin')->user()->pin }}">
                                                <span class="mt-2 d-block">We'll never share your PIN with anyone
                                                    else.</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone"
                                                    placeholder="Enter Phone" value="{{ auth('admin')->user()->phone }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="age">Age</label>
                                                <input type="number" class="form-control" id="age" placeholder="Enter Age"
                                                    value="{{ auth('admin')->user()->age }}">
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
                                                    onclick="update({{ auth('admin')->user()->id }})">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="col-lg-12">
                                <!--Outline Icon Buttons -->
                                <div class="card card-default">
                                    <div class="card-header card-header-border-bottom">
                                        <h2>Delete Account</h2>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-5">Be careful, you are about to delete your account on the
                                            <span style="font-weight:bold;color:red;">Tusaned.com</span> platform, you will
                                            not be able to get it back again
                                        </p>
                                        @php
                                            $username = explode('@', auth('admin')->user()->email);
                                        @endphp
                                        <p class="mb-5"> Enter the
                                            <code>delete.my.auth.account.{{ $username[0] }}.sure</code> in the field, and
                                            make sure
                                            that you're cannt access this moment from now on.
                                            documentaion <a href="https://getbootstrap.com/docs/4.1/components/badge/"
                                                target="_blank"> more details.</a>
                                        </p>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" id="code"
                                                placeholder="delete.my.auth.account.{{ $username[0] }}.sure" required="">
                                        </div>
                                        <button type="button" class="mb-1 btn btn-outline-danger"
                                            onclick="confirmDestroy({{ auth('admin')->user()->id }})">
                                            <i class=" mdi mdi-close-circle-outline mr-1"></i> Danger</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <!--Outline Icon Buttons -->
                                <div class="card card-default">
                                    <div class="card-header card-header-border-bottom">
                                        <h2>Subscribe My Account</h2>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-5">You are trying to make another account getting access
                                            with your account
                                        </p>
                                        <div class="col-md-12 mb-3">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter email you want to subscribe with" value="" required="">
                                        </div>
                                        @php
                                            $username = explode('@', auth('admin')->user()->email);
                                        @endphp
                                        <p class="mb-5"> Enter the
                                            <code>subscribe.my.account.{{ $username[0] }}.sure</code> in the field, and
                                            make sure
                                            that you're both can access to the same account.
                                            <a href="https://getbootstrap.com/docs/4.1/components/badge/" target="_blank">
                                                more details.</a>
                                        </p>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control" id="code"
                                                placeholder="subscribe.my.account.{{ $username[0] }}.sure" required="">
                                        </div>
                                        <button type="button" class="mb-1 btn btn-outline-info" onclick="">
                                            <i class=" mdi mdi-close-circle-outline mr-1"></i> Sent Invite</button>
                                    </div>
                                </div>
                            </div>
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

        function confirmDestroy(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to retrive to your account this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    destroy(id);
                }
            });
        }

        function destroy(id) {
            // circle/admin/teacher/{teacher}
            axios.post('/tusaned-cpanel/delete-my-auth-account/' + id + '/admin', {
                    code: document.getElementById('code').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    showDeletingResult(response.data);
                    window.location.href = '/tusaned-cpanel/';
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

        function posting() {
            // tusaned-cpanel/post
            formData = new FormData();
            formData.append('post', document.getElementById('post').value);
            formData.append('post_image', document.getElementById('post_image').files[0]);

            axios.post('/tusaned-cpanel/post/', formData)
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
