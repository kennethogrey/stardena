<x-app-layout>
    @section('title', 'Dashboard - Stardena')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">Traffic &amp; Sales</div>
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
                                                <th class="bg-body-secondary">User</th>
                                                <th class="bg-body-secondary text-center">Country</th>
                                                <th class="bg-body-secondary">Usage</th>
                                                <th class="bg-body-secondary text-center">Payment Method</th>
                                                <th class="bg-body-secondary">Activity</th>
                                                <th class="bg-body-secondary"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="align-middle">
                                                <td class="text-center">
                                                    <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('panel/assets/img/avatars/2.jpg') }}" alt="user@email.com"><span class="avatar-status bg-danger"></span></div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">Avram Tarasios</div>
                                                    <div class="small text-body-secondary text-nowrap"><span>Recurring</span> | Registered: Jan 1, 2023</div>
                                                </td>
                                                <td class="text-center">
                                                    <svg class="icon icon-xl">
                                                    <use xlink:href="{{ asset('panel/icons/sprites/flag.svg#cif-br') }}"></use>
                                                    </svg>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-between align-items-baseline">
                                                        <div class="fw-semibold">10%</div>
                                                        <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                                                    </div>
                                                    <div class="progress progress-thin">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <svg class="icon icon-xl">
                                                    <use xlink:href="{{ asset('panel/icons/sprites/brand.svg#cib-cc-visa') }}"></use>
                                                    </svg>
                                                </td>
                                                <td>
                                                    <div class="small text-body-secondary">Last login</div>
                                                    <div class="fw-semibold text-nowrap">5 minutes ago</div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <svg class="icon">
                                                            <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-options')}}"></use>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="align-middle">
                                                <td class="text-center">
                                                    <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('panel/assets/img/avatars/3.jpg')}}" alt="user@email.com"><span class="avatar-status bg-warning"></span></div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">Quintin Ed</div>
                                                    <div class="small text-body-secondary text-nowrap"><span>New</span> | Registered: Jan 1, 2023</div>
                                                </td>
                                                <td class="text-center">
                                                    <svg class="icon icon-xl">
                                                    <use xlink:href="{{ asset('panel/icons/sprites/flag.svg#cif-in') }}"></use>
                                                    </svg>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-between align-items-baseline">
                                                        <div class="fw-semibold">74%</div>
                                                        <div class="text-nowrap small text-body-secondary ms-3">Jun 11, 2023 - Jul 10, 2023</div>
                                                    </div>
                                                    <div class="progress progress-thin">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <svg class="icon icon-xl">
                                                    <use xlink:href="{{ asset('panel/icons/sprites/brand.svg#cib-cc-stripe')}}"></use>
                                                    </svg>
                                                </td>
                                                <td>
                                                    <div class="small text-body-secondary">Last login</div>
                                                    <div class="fw-semibold text-nowrap">1 hour ago</div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                    <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="icon">
                                                        <use xlink:href="{{ asset('panel/icons/sprites/free.svg#cil-options') }}"></use>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item text-danger" href="#">Delete</a></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
