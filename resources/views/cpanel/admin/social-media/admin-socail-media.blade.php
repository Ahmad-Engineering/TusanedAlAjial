@extends('cpanel.index')

@section('page-title', 'Admin Social Media')

@section('main-content')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Socail Medai</h2>
            </div>
            <div class="card-body">
                <form id="create-form">
                    <div class="form-group">
                        <label for="facebook">Facebook Link</label>
                        <input type="text" class="form-control" id="facebook" placeholder="Enter the link of your Facebook account"
                            @if ($social_count > 0)
                                value = "{{$social->facebook}}"
                            @else
                                value = "NULL"
                            @endif
                        >
                    </div>
                    <div class="form-group">
                        <label for="linkedin">LinedIn Link</label>
                        <input type="text" class="form-control" id="linkedin" placeholder="Enter the link of your LinkedIn account"
                        @if ($social_count > 0)
                            value = "{{$social->linkedin}}"
                        @else
                            value = "NULL"
                        @endif
                        >
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter Link</label>
                        <input type="text" class="form-control" id="twitter" placeholder="Enter the link of your Twitter account"
                        @if ($social_count > 0)
                            value = "{{$social->twitter}}"
                        @else
                            value = "NULL"
                        @endif
                        >
                    </div>
                    <div class="form-group">
                        <label for="skype">Skype Link</label>
                        <input type="text" class="form-control" id="skype" placeholder="Enter the link of your Skype account"
                        @if ($social_count > 0)
                            value = "{{$social->skype}}"
                        @else
                            value = "NULL"
                        @endif
                        >
                    </div>

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="button" class="btn btn-primary btn-default"
                            onclick="addSocialMedia()">Add</button>
                        <button type="button" class="btn btn-secondary btn-default"
                            onclick="{{ route('admin.dashbord') }}">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- HERE IS YOUR SCRIPTS --}}
    <script>
        function addSocialMedia() {
            // tusaned-cpanel/admin-social-media
            axios.post('/tusaned-cpanel/admin-social-media', {
                    facebook_link: document.getElementById('facebook').value,
                    linkedin_link: document.getElementById('linkedin').value,
                    twitter_link: document.getElementById('twitter').value,
                    skype_link: document.getElementById('skype').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    document.getElementById('create-form').reset();
                    window.location.href = '/tusaned-cpanel/admin-social-media';
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
