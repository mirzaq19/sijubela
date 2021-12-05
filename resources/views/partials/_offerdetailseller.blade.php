<div class="container my-5 bg-white rounded px-3">
    <div class="d-flex justify-content-between py-3">
        <div class="p-2">
            <a href="/dashboard/offer" class="btn btn-outline-primary">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
        </div>
        @if (Request::is('dashboard/offer/detail/*'))
            <div class="p-2"></div>
            <div class="p-2">
                <a href="/dashboard/offer/edit/{{ $sell_laptop->id }}" class="btn btn-warning"><i
                        class="far fa-edit"></i> Edit</a>
                <form action="/dashboard/offer/detail/{{ $sell_laptop->id }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Are you sure want to delete {{ $sell_laptop->sell_laptop_name }}?')"><i
                            class="far fa-trash-alt"></i> Delete</button>
                </form>
            </div>
        @endif
    </div>
    <p class="h2">Offer Detail of {{ $sell_laptop->sell_laptop_name }}</p>
    <div class="row g-3 pb-3">
        <div class="col-12">
            <label for="sell_laptop_name" class="form-label">Name</label>

            <input type="text" class="form-control" id="sell_laptop_name"
                placeholder="{{ $sell_laptop->sell_laptop_name }}" aria-label="Disabled input example" disabled
                readonly>
        </div>

        <div class="col-md-6">
            <label for="sell_laptop_brand" class="form-label">Brand</label>

            <input type="text" class="form-control" id="sell_laptop_brand"
                placeholder="{{ $sell_laptop->sell_laptop_brand }}" aria-label="Disabled input example" disabled
                readonly>
        </div>
        <div class="col-md-6">
            <label for="sell_laptop_type" class="form-label">Type</label>

            <input type="text" class="form-control" id="sell_laptop_type"
                placeholder="{{ $sell_laptop->sell_laptop_type }}" aria-label="Disabled input example" disabled
                readonly>
        </div>
        <div class="col-md-6">
            <label for="sell_laptop_price" class="form-label">Price (Rp)</label>

            <input type="text" class="form-control" id="sell_laptop_price"
                placeholder="{{ number_format($sell_laptop->sell_laptop_price, 0, ',', '.') }}"
                aria-label="Disabled input example" disabled readonly>
        </div>

        <div class="col-md-6">
            <label for="sell_laptop_weight" class="form-label">Weight (kg)</label>

            <input type="text" class="form-control" id="sell_laptop_weight"
                placeholder="{{ $sell_laptop->sell_laptop_weight }}" aria-label="Disabled input example" disabled
                readonly>
        </div>

        <div class="col-md-6">
            <label for="sell_laptop_condition" class="form-label">Condition</label>

            <input type="text" class="form-control" id="sell_laptop_condition"
                placeholder="{{ $sell_laptop->sell_laptop_condition ? 'New' : 'Old' }}"
                aria-label="Disabled input example" disabled readonly>
        </div>



        <div class="col-md-6">
            <label for="sell_laptop_usage_time" class="form-label">Usage (Months)</label>

            <input type="text" class="form-control" id="sell_laptop_usage_time"
                placeholder="{{ $sell_laptop->sell_laptop_condition ? '-' : $sell_laptop->sell_laptop_usage_time }}"
                aria-label="Disabled input example" disabled readonly>
        </div>


        <div class="col-12">
            <label for="sell_laptop_desc" class="form-label">Description</label>
            <div id="sell_laptop_desc">
                {!! nl2br($sell_laptop->sell_laptop_desc) !!}
            </div>
        </div>

    </div>
</div>
