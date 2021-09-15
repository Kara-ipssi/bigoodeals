<x-admin-layout>
    <x-slot name="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb has-arrow">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route("dashboard")}}">{{__("Dashboard")}}</a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <x-slot name="slot">
        <div class="row">
            <div class="col-md-6 equel-grid order-md-2">
                <div class="grid d-flex flex-column justify-content-between overflow-hidden">
                    <div class="grid-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Sales Revenue</p>
                            <div class="chartjs-legend" id="sales-revenue-chart-legend"></div>
                        </div>
                        <div class="d-flex">
                            <p class="d-none d-xl-block">12.5% Growth compared to the last week</p>
                            <div class="ml-auto">
                            <h2 class="font-weight-medium text-gray"><i class="mdi mdi-menu-up text-success"></i><span class="animated-count">25.04</span>%</h2>
                            </div>
                        </div>
                    </div>
                    <canvas class="mt-4" id="sales-revenue-chart" height="245"></canvas>
                </div>
            </div>
            <div class="col-md-6 equel-grid">
                <div class="grid">
                <div class="grid-body py-3">
                    <p class="card-title ml-n1">Order History</p>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                    <thead>
                        <tr class="solid-header">
                        <th colspan="2" class="pl-4">Customer</th>
                        <th>Order No</th>
                        <th>Purchased On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td class="pr-0 pl-4">
                            <img class="profile-img img-sm" src="http://www.placehold.it/50x50" alt="profile image">
                        </td>
                        <td class="pl-md-0">
                            <small class="text-black font-weight-medium d-block">Barbara Curtis</small>
                            <span>
                            <span class="status-indicator rounded-indicator small bg-primary"></span>Account Deactivated </span>
                        </td>
                        <td>
                            <small>8523537435</small>
                        </td>
                        <td> Just Now </td>
                        </tr>
                        <tr>
                        <td class="pr-0 pl-4">
                            <img class="profile-img img-sm" src="http://www.placehold.it/50x50" alt="profile image">
                        </td>
                        <td class="pl-md-0">
                            <small class="text-black font-weight-medium d-block">Charlie Hawkins</small>
                            <span>
                            <span class="status-indicator rounded-indicator small bg-success"></span>Email Verified </span>
                        </td>
                        <td>
                            <small>9537537436</small>
                        </td>
                        <td> Mar 04, 2018 11:37am </td>
                        </tr>
                        <tr>
                        <td class="pr-0 pl-4">
                            <img class="profile-img img-sm" src="http://www.placehold.it/50x50" alt="profile image">
                        </td>
                        <td class="pl-md-0">
                            <small class="text-black font-weight-medium d-block">Nina Bates</small>
                            <span>
                            <span class="status-indicator rounded-indicator small bg-warning"></span>Payment On Hold </span>
                        </td>
                        <td>
                            <small>7533567437</small>
                        </td>
                        <td> Mar 13, 2018 9:41am </td>
                        </tr>
                        <tr>
                        <td class="pr-0 pl-4">
                            <img class="profile-img img-sm" src="http://www.placehold.it/50x50" alt="profile image">
                        </td>
                        <td class="pl-md-0">
                            <small class="text-black font-weight-medium d-block">Hester Richards</small>
                            <span>
                            <span class="status-indicator rounded-indicator small bg-success"></span>Email Verified </span>
                        </td>
                        <td>
                            <small>5673467743</small>
                        </td>
                        <td> Feb 21, 2018 8:34am </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <a class="border-top px-3 py-2 d-block text-gray" href="#"><small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i>View All Order History</small></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 equel-grid">
                <div class="grid">
                <div class="grid-body py-3">
                    <p class="card-title ml-n1"> Je ne sais pas encore </p>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                    <thead>
                        <tr class="solid-header">
                        <th colspan="2" class="pl-4">Customer</th>
                        <th>Order No</th>
                        <th>Purchased On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td class="pr-0 pl-4">
                            <img class="profile-img img-sm" src="http://www.placehold.it/50x50" alt="profile image">
                        </td>
                        <td class="pl-md-0">
                            <small class="text-black font-weight-medium d-block">Barbara Curtis</small>
                            <span>
                            <span class="status-indicator rounded-indicator small bg-primary"></span>Account Deactivated </span>
                        </td>
                        <td>
                            <small>8523537435</small>
                        </td>
                        <td> Just Now </td>
                        </tr>
                        <tr>
                        <td class="pr-0 pl-4">
                            <img class="profile-img img-sm" src="http://www.placehold.it/50x50" alt="profile image">
                        </td>
                        <td class="pl-md-0">
                            <small class="text-black font-weight-medium d-block">Charlie Hawkins</small>
                            <span>
                            <span class="status-indicator rounded-indicator small bg-success"></span>Email Verified </span>
                        </td>
                        <td>
                            <small>9537537436</small>
                        </td>
                        <td> Mar 04, 2018 11:37am </td>
                        </tr>
                        <tr>
                        <td class="pr-0 pl-4">
                            <img class="profile-img img-sm" src="http://www.placehold.it/50x50" alt="profile image">
                        </td>
                        <td class="pl-md-0">
                            <small class="text-black font-weight-medium d-block">Nina Bates</small>
                            <span>
                            <span class="status-indicator rounded-indicator small bg-warning"></span>Payment On Hold </span>
                        </td>
                        <td>
                            <small>7533567437</small>
                        </td>
                        <td> Mar 13, 2018 9:41am </td>
                        </tr>
                        <tr>
                        <td class="pr-0 pl-4">
                            <img class="profile-img img-sm" src="http://www.placehold.it/50x50" alt="profile image">
                        </td>
                        <td class="pl-md-0">
                            <small class="text-black font-weight-medium d-block">Hester Richards</small>
                            <span>
                            <span class="status-indicator rounded-indicator small bg-success"></span>Email Verified </span>
                        </td>
                        <td>
                            <small>5673467743</small>
                        </td>
                        <td> Feb 21, 2018 8:34am </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <a class="border-top px-3 py-2 d-block text-gray" href="#"><small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i>View All Order History</small></a>
                </div>
            </div>
        </div>
    </x-slot>

</x-admin-layout>
