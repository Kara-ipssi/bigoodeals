<div class="row">
    {{-- Graph --}}
    <div class="col-md-7 equel-grid order-md-2">
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

    {{-- others stats --}}
    <div class="col-md-5 order-md-0">
        <div class="row">
            <div class="col-6 equel-grid">
                <div class="grid d-flex flex-column align-items-center justify-content-center">
                    <div class="grid-body text-center">
                        <div class="profile-img img-rounded bg-inverse-primary no-avatar component-flat mx-auto mb-4"><i class="mdi mdi-account-group mdi-2x"></i></div>
                        <h2 class="font-weight-medium text-3xl"><span class="animated-count">{{count($usersList)}}</span></h2>
                        <small class="text-gray d-block mt-3">Total des utilisateurs</small>
                        <small class="font-weight-medium text-success"><i class="mdi mdi-menu-up"></i><span class="animated-count">100</span>%</small>
                    </div>
                </div>
            </div>
            <div class="col-6 equel-grid">
                <div class="grid d-flex flex-column align-items-center justify-content-center">
                    <div class="grid-body text-center">
                        <div class="profile-img img-rounded bg-inverse-danger no-avatar component-flat mx-auto mb-4"><i class="mdi mdi-currency-eur mdi-2x"></i></div>
                        <h2 class="font-weight-medium text-3xl"><span class="animated-count">{{$CA}}</span>€</h2>
                        <small class="text-gray d-block mt-3">Chiffre d'affaire total</small>
                        <small class="font-weight-medium text-danger"><i class="mdi mdi-menu-up"></i><span class="animated-count">100</span>%</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 equel-grid">
                <div class="grid d-flex flex-column align-items-center justify-content-center">
                    <div class="grid-body text-center">
                        <div class="profile-img img-rounded bg-inverse-warning no-avatar component-flat mx-auto mb-4"><i class="mdi mdi-fire mdi-2x"></i></div>
                        <h2 class="font-weight-medium animated-count text-3xl">{{count($ordersList)}}</h2>
                        <small class="text-gray d-block mt-3">Nombre total de commande</small>
                        <small class="font-weight-medium text-danger"><i class="mdi mdi-menu-up"></i><span class="animated-count">100</span>%</small>
                    </div>
                </div>
            </div>
            <div class="col-6 equel-grid">
                <div class="grid d-flex flex-column align-items-center justify-content-center">
                    <div class="grid-body text-center">
                        <div class="profile-img img-rounded bg-inverse-success no-avatar component-flat mx-auto mb-4"><i class="mdi mdi-charity mdi-2x"></i></div>
                        <h2 class="font-weight-medium"><span class="animated-count text-3xl">{{$todayCa}}</span>€</h2>
                        {{-- <h2 class="font-weight-medium"><span class="animated-count">Pour {{count($todayOrdersList)}}</span>{{count($todayOrdersList) > 1 ? "commandes" : "commande"}}</h2> --}}
                        <small class="text-gray d-block mt-3">Chiffre d'affaire du jour</small>
                        <small class="font-weight-medium text-success"><i class="mdi mdi-menu-up"></i><span class=""></span></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>