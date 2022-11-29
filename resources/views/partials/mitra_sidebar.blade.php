<!-- Sidebar -->
<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <img src="{{asset('img/dashboard-store-logo.svg')}}" alt="" class="my-4" />
    </div>
    <div class="list-group list-group-flush">
        <a href="/db_mitra"
            class="list-group-item list-group-item-action {{($title === "| Dashboard") ? 'active' : ''}}">Dashboard</a>
        <a href="/db_product"
            class="list-group-item list-group-item-action {{($title === "| Product") ? 'active' : ''}}">My Products</a>
        <a href="/db_toko" class="list-group-item list-group-item-action {{($title === "| Mitra") ? 'active' : ''}}">My
            Store Account</a>
        <a href="/index.html" class="list-group-item list-group-item-action">Sign Out</a>
    </div>
</div>
<!-- /#sidebar-wrapper -->
