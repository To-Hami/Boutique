<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{config('app.name')}}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Main</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages category Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categories"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-list"></i>
            <span>Categories</span>
        </a>
        <div id="categories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.categories.index')}}"><i class="fa fa-list" aria-hidden="true"></i>    <span class="mx-2">Categories</span></a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages tags Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tags"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tag"></i>
            <span>Tags</span>
        </a>
        <div id="tags" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.tags.index')}}"><i class="fa fa-tag" aria-hidden="true"></i>    <span class="mx-2">Tags</span></a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages products Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
            <span>Products</span>
        </a>
        <div id="products" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.products.index')}}"> <i class="fa fa-cart-plus" aria-hidden="true"></i>    <span class="mx-2">Products</span></a>

            </div>
        </div>

    </li><!-- Nav Item - Pages products Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#coupons"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-gift" aria-hidden="true"></i>
            <span>Coupons</span>
        </a>
        <div id="coupons" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.coupons.index')}}"> <i class="fa fa-gift" aria-hidden="true"></i>  <span class="mx-2"> Coupons </span> </a>

            </div>
        </div>

    </li>

    <!-- Nav Item - Pages reviews Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reviews"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-comments" aria-hidden="true"></i>
            <span>Reviews</span>
        </a>
        <div id="reviews" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.reviews.index')}}"> <i class="fa fa-comments" aria-hidden="true"></i>  <span class="mx-2">Reviews </span></a>
            </div>
        </div>

    </li>





    <!-- Nav Item - Pages customers Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customers"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span>
        </a>
        <div id="customers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.customers.index')}}"><i class="fas fa-fw fa-users"></i> <span class="mx-2">Customers</span></a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages customer_addresses Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer_addresses"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-location-arrow"></i>
            <span>Addresses</span>
        </a>
        <div id="customer_addresses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.customer_addresses.index')}}"><i class="fas fa-fw fa-location-arrow"></i> <span class="mx-2"> Customers Address</span></a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages countries Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#countries"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-globe"></i>
            <span>Countries</span>
        </a>
        <div id="countries" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.countries.index')}}"><i class="fa fa-globe" aria-hidden="true"></i>    <span class="mx-2">Countries</span></a>
            </div>

        </div>
    </li>

    <!-- Nav Item - Pages states Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#states"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-map-marker"></i>
            <span>States</span>
        </a>
        <div id="states" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.states.index')}}"><i class="fa fa-map-marker" aria-hidden="true"></i>    <span class="mx-2">States</span></a>
            </div>

        </div>
    </li>
    <!-- Nav Item - Pages states Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cities"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-university"></i>
            <span>Cities</span>
        </a>
        <div id="cities" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.cities.index')}}"><i class="fa fa-university" aria-hidden="true"></i>    <span class="mx-2">Cities</span></a>

            </div>

        </div>
    </li>

    <!-- Nav Item - Pages company Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#company"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-train"></i>
            <span>Shipping Companies</span>
        </a>
        <div id="company" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.shipping_companies.index')}}"><i class="fa fa-train" aria-hidden="true"></i>    <span class="mx-2">Shipping Companies</span></a>

            </div>

        </div>
    </li>


</ul>
