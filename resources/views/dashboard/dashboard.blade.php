<x-app-layout>
    @section('title', 'Dashboard - Stardena')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6 col-xl-3">
                                <div class="card text-white bg-primary">
                                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="fs-4 fw-semibold">{{ $user_count }} <span class="fs-6 fw-normal">(-12.4%
                                                <svg class="icon">
                                                <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-arrow-bottom') }}"></use>
                                                </svg>)</span></div>
                                            <div>{{__('Users')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-sm-6 col-xl-3">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="fs-4 fw-semibold">{{ $income }}/= <span class="fs-6 fw-normal">(40.9%
                                                <svg class="icon">
                                                <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-arrow-top') }}"></use>
                                                </svg>)</span></div>
                                            <div>{{__('Income')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-sm-6 col-xl-3">
                                <div class="card text-white bg-warning">
                                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="fs-4 fw-semibold">{{__('3700/=')}}<span class="fs-6 fw-normal"> (0.6.7%
                                                <svg class="icon">
                                                <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-arrow-top') }}"></use>
                                                </svg>)</span></div>
                                            <div>{{__('Conversion Rate')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-sm-6 col-xl-3">
                                <div class="card text-white bg-danger">
                                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="fs-4 fw-semibold">{{ $sessionz }} <span class="fs-6 fw-normal">(-23.6%
                                                <svg class="icon">
                                                <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-arrow-bottom') }}"></use>
                                                </svg>)</span></div>
                                            <div>{{__('Visitors')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <div class="card mb-4">
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">{{__('Traffic')}} &amp; {{__('Sales')}}</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table border mb-0">
                                                <thead class="fw-semibold text-nowrap">
                                                    <tr class="align-middle">
                                                        <th class="bg-body-secondary text-center">
                                                            <svg class="icon">
                                                            <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-people') }}"></use>
                                                            </svg>
                                                        </th>
                                                        <th class="bg-body-secondary">{{__('Name')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sessions as $session)
                                                        <tr class="align-middle">
                                                            <td class="text-center">
                                                                <div class="avatar avatar-md">
                                                                    @if ($session->profile_photo)
                                                                        <img class="avatar-img" src="{{ asset('storage/profile-photos/' . $session->profile_photo) }}" alt="">
                                                                    @else
                                                                        <img class="avatar-img" src="{{ asset('panel/assets/img/avatars/2.jpg') }}" alt="">
                                                                    @endif
                                                                    <span class="avatar-status bg-success"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-nowrap">{{ $session->name }}</div>
                                                                <div class="small text-body-secondary text-nowrap"><span>{{__('Last Seen')}}</span> | {{ \Carbon\Carbon::createFromTimestamp($session->last_activity)->toDateTimeString() }}</div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table border mb-0">
                                                <thead class="fw-semibold text-nowrap">
                                                    <tr class="align-middle">
                                                        <th class="bg-body-secondary">{{__('Visitor ID')}}</th>
                                                        <th class="bg-body-secondary">{{__('IP')}}</th>
                                                        <th class="bg-body-secondary">{{__('#')}}</th>
                                                        <th class="bg-body-secondary">{{__('')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($visitors as $visitor)
                                                        <tr class="align-middle">
                                                            <td class="text-center">
                                                                <div class="avatar avatar-md">
                                                                    <div class="text-nowrap">{{ $visitor->visitor_id }}</div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-nowrap">{{ $visitor->ip_address }}</div>
                                                                <div class="small text-body-secondary text-nowrap"><span>{{__('Last Seen')}}</span> | {{ $visitor->updated_at }}</div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="text-nowrap">{{ $visitor->counter }}</div>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <svg class="icon">
                                                                        <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-options')}}"></use>
                                                                        </svg>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item text-info" href="">Info</a>
                                                                        <a class="dropdown-item text-danger" href="{{ route('destroy-visitor', $visitor->id) }}">Delete</a></div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script>
            window.onload = function () {
                // Fetch data from the server
                fetch('/partners/chart') 
                    .then(response => response.json())
                    .then(dataPoints => {
                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            theme: "light2",
                            title: {
                                text: "Total Amount Paid by Month"
                            },
                            axisY: {
                                title: "Total Amount Paid",
                                includeZero: true,
                            },
                            data: [{
                                type: "line", // You can change this to "bar" if you want bar chart
                                dataPoints: dataPoints
                            }]
                        });
                        chart.render();
                    })
                    .catch(error => console.error('Error fetching data:', error));
            }
        </script>

    @endsection
</x-app-layout>
