<div class="sidebar">
    <ul class="navigation-menu">
        <li class="nav-category-divider">MAIN</li>
        <li>
            <a href="{{route('dashboard')}}">
                <span class="link-title">{{__('Dashboard')}}</span>
                <i class="mdi mdi-gauge link-icon"></i>
            </a>
        </li>
        <li>
            <a href="#products" data-toggle="collapse" aria-expanded="false">
                <span class="link-title">{{__('Products')}}</span>
                <i class="mdi mdi-bullseye link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="products">
                <li>
                    <a href="{{route("products.index")}}" >{{__('Gestion des produits')}}</a>
                </li>
                <li>
                    <a href="#" >Produits en tendances</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#categories" data-toggle="collapse" aria-expanded="false">
                <span class="link-title">{{__('Categories')}}</span>
                <i class="mdi mdi-clipboard-outline link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="categories">
                <li>
                    <a href="{{route("categories.index")}}" >{{__('Categories management')}}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#orders" data-toggle="collapse" aria-expanded="false">
                <span class="link-title">{{__('Orders')}}</span>
                <i class="mdi mdi-clipboard-outline link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="orders">
                <li>
                    <a href="{{route('orders.index')}}" >{{__('Gestion des commandes')}}</a>
                </li>
            </ul>
        </li>
        <li class="nav-category-divider">APP</li>
        {{-- <li>
            <a href="#pages" data-toggle="collapse" aria-expanded="false">
                <span class="link-title">{{__('Pages')}}</span>
                <i class="mdi mdi-bullseye link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="pages">
                <li>
                    <a href="{{route("products.index")}}" >{{__('Home')}}</a>
                </li>
                <li>
                    <a href="#" >Produits en tendances</a>
                </li>
            </ul>
        </li> --}}

    </ul>
    <div class="sidebar_footer">
        <div class="user-account">
            {{-- <div class="user-profile-item-tittle">Switch User</div>
            <div class="user-profile-itemcategory">
                <a class="user-profile-item" href="#">
                    <div class="avatar">
                        <img class="profile-img img-rounded img-sm" src="http://www.placehold.it/50x50" alt="profile image"> Rodney Mann
                    </div>
                </a>
                <a class="user-profile-item" href="#">
                    <div class="avatar">
                        <img class="profile-img img-rounded img-sm" src="http://www.placehold.it/50x50" alt="profile image"> Sally Stone
                    </div>
                </a>
                <a class="user-profile-item" href="#">
                    <div class="avatar">
                        <img class="profile-img img-rounded img-sm" src="http://www.placehold.it/50x50" alt="profile image"> Olivia Collier </div>
                </a>
            </div> --}}
            <a class="user-profile-item" href="#"><i class="mdi mdi-account"></i> Profile</a>
            <a class="user-profile-item" href="#"><i class="mdi mdi-settings"></i> Account Settings</a>
            <form action="{{route("logout")}}" method="post">
                @csrf
                <button class="btn btn-primary btn-logout">Logout</button>
            </form>
        </div>
        <div class="btn-group admin-access-level">
            <div class="avatar">
                <img class="profile-img" src="http://www.placehold.it/50x50" alt="">
            </div>
            <div class="user-type-wrapper">
                <p class="user_name"></p>
                <div class="d-flex align-items-center">
                    <div class="status-indicator small rounded-indicator bg-success"></div>
                    <small class="user_access_level">Admin</small>
                </div>
            </div>
            <i class="arrow mdi mdi-chevron-right"></i>
        </div>
    </div>
</div>
