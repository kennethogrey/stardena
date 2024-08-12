<x-app-layout>
    @section('title', 'Dashboard - Stardena')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                <div class="row">
                    <div class="col-md-12">
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
                                                        <th class="bg-body-secondary">{{__('IP Address')}}</th>
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
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <svg class="icon">
                                                                        <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-options')}}"></use>
                                                                        </svg>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item text-info" href="#">Info</a>
                                                                        <a class="dropdown-item text-success" href="#">Edit</a>
                                                                        <a class="dropdown-item text-danger" href="#">Delete</a></div>
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
    @endsection
</x-app-layout>
