@extends('cpanel.index')


@section('page-title', 'Community')

@section('styles')
    {{-- HERE IS YOUR STYLES --}}
@endsection

@section('main-content')
    {{-- HERE IS YOUR MAIN CONTENT PAGE --}}
    <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
            <h2>{{ $admin->name . ' Posts'}}</h2>
            <div class="date-range-report ">
                <span>Jan 17, 2022 - Feb 15, 2022</span>
            </div>
        </div>
        <div class="card-body pt-0 pb-5">
            @foreach ($posts as $post)
                <div class="media mt-5 profile-timeline-media">
                    <div class="align-self-start iconbox-45 overflow-hidden mr-3">
                        <img src="{{ asset('/images/admins/' . $post->admin->image) }}"
                            alt="Generic placeholder image">
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
@endsection


{{-- <div class="tab-content px-3 px-xl-5" id="myTabContent">
    <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
        @foreach ($posts as $post)
        @endforeach
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
</div> --}}
