@extends('cpanel.index')

@section('page-title', 'Analysis')

@section('styles')
    {{-- HERE IS YOUR LEFT ITEMS --}}
@endsection



@section('main-content')
    {{-- HERE IS YOUR MAIN CONTENT PAGE --}}
    <div class="row">
        <div class="col-xl-4 col-sm-6">
            <div class="card card-mini mb-4">
                <div class="card-body">
                    <h2 class="mb-1"><a href="{{ route('admin.index') }}" style="color:black;">{{ $admin_count }}</a></h2>
                    <p>Admins</p>
                    <div class="chartjs-wrapper">
                        <div class="chartjs-size-monitor"
                            style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <canvas id="area-chart" width="250" height="100"
                            style="display: block; width: 250px; height: 100px;" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card card-mini  mb-4">
                <div class="card-body">
                    <h2 class="mb-1">{{$idea_count}}</h2>
                    <p>Ideas</p>
                    <div class="chartjs-wrapper">
                        <div class="chartjs-size-monitor"
                            style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <canvas id="dual-line" width="250" height="100" style="display: block; width: 250px; height: 100px;"
                            class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card card-mini mb-4">
                <div class="card-body">
                    <h2 class="mb-1"><a href="{{route('contact-us-sending.index')}}" style="color: black;">{{$contact_count}}</a></h2>
                    <p>Contact Request</p>
                    <div class="chartjs-wrapper">
                        <div class="chartjs-size-monitor"
                            style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <canvas id="line" width="250" height="100" style="display: block; width: 250px; height: 100px;"
                            class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- HERE IS YOUR SCRIPTS --}}
    <script>
        function confirmDestroy(id, refranec) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    destroy(id, refranec);
                }
            });
        }

        function destroy(id, refranec) {
            // circle/admin/teacher/{teacher}
            axios.delete('/tusaned-cpanel/admin/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    refranec.closest('tr').remove();
                    showDeletingResult(response.data);
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
    </script>
@endsection
