<div class="mb-3">
    <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
        <a href="/dashboard/offer"
            class="list-group-item list-group-item-action text-center {{ Request::is('dashboard/offer') ? 'active' : '' }}">
            Waiting Confirmation
        </a>

        <a href="/dashboard/offer/accepted"
            class="list-group-item list-group-item-action text-center {{ Request::is('dashboard/offer/accepted') ? 'active' : '' }}">
            Accepted
        </a>

        <a href="/dashboard/offer/rejected"
            class="list-group-item list-group-item-action text-center {{ Request::is('dashboard/offer/rejected') ? 'active' : '' }}">
            Rejected
        </a>

    </div>
</div>
