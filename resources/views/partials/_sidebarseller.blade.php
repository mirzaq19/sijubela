<div class="list-group mt-3">
    <a href="/dashboard" class="list-group-item list-group-item-action {{ Request::is('dashboard') ? 'active' : '' }}">
        Dashboard
    </a>
    <a href="/dashboard/offer"
        class="list-group-item list-group-item-action {{ Request::is('dashboard/offer') || Request::is('dashboard/offer/accepted') || Request::is('dashboard/offer/rejected') ? 'active' : '' }}">
        Offers
    </a>
    <a href="/dashboard/setting"
        class="list-group-item list-group-item-action {{ Request::is('dashboard/settings') ? 'active' : '' }}">
        Settings
    </a>
</div>
