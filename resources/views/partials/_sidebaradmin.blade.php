<div class="list-group">
    <a href="/admin-dashboard"
        class="list-group-item list-group-item-action {{ Request::is('admin-dashboard') ? 'active' : '' }}">
        Dashboard
    </a>
    <a href="/admin-dashboard/order_details"
        class="list-group-item list-group-item-action {{ Request::is('admin-dashboard/order_details') ? 'active' : '' }}">
        Order List
    </a>
    <a href="/admin-dashboard/laptops"
        class="list-group-item list-group-item-action {{ Request::is('admin-dashboard/laptops') ? 'active' : '' }}">
        Product Catalog
    </a>
    <a href="/admin-dashboard/sell_laptops"
        class="list-group-item list-group-item-action {{ Request::is('admin-dashboard/sell_laptops') ? 'active' : '' }}">Offer
        List</a>
    <a href="#" class="list-group-item list-group-item-action">Finance Report</a>
</div>
