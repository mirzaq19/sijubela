<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center" scope="col">No</th>
            <th class="text-center" scope="col">Laptop</th>
            <th class="text-center" scope="col">Condition</th>
            <th class="text-center" scope="col">Price</th>
            <th class="text-center" scope="col">Weight</th>
            <th class="text-center" scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        <div class="tab-content" id="nav-tabContent">
            @if (Request::is('dashboard/offer'))
                <div class="tab-pane fade show active" id="status-wait-confirmation" role="tabpanel"
                    aria-labelledby="status-wait-confirmation">
                    @foreach ($offers as $offer)
                        <tr>
                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                            <td class="text-center">{{ $offer->sell_laptop_name }}</td>
                            <td class="text-center">{{ $offer->sell_laptop_condition ? 'New' : 'Old' }}
                            </td>
                            <td class="text-center">Rp
                                {{ number_format($offer->sell_laptop_price, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $offer->sell_laptop_weight }}</td>
                            <td class="text-center">
                                <a href="/dashboard/offer/{{ $offer->id }}" class="badge bg-info"><i
                                        class="fas fa-info-circle"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </div>
            @endif
            @if (Request::is('dashboard/offer/accepted'))
                <div class="tab-pane fade show active" id="status-accepted" role="tabpanel"
                    aria-labelledby="status-accepted">
                    @foreach ($offers as $offer)
                        <tr>
                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                            <td class="text-center">{{ $offer->sell_laptop_name }}</td>
                            <td class="text-center">{{ $offer->sell_laptop_condition ? 'New' : 'Old' }}
                            </td>
                            <td class="text-center">Rp
                                {{ number_format($offer->sell_laptop_price, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $offer->sell_laptop_weight }}</td>
                            <td class="text-center">
                                <a href="/dashboard/offer/accepted/{{ $offer->id }}" class="badge bg-info"><i
                                        class="fas fa-info-circle"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </div>
            @endif
            @if (Request::is('dashboard/offer/rejected'))
                <div class="tab-pane fade show active" id="status-rejected" role="tabpanel"
                    aria-labelledby="status-rejected">
                    @foreach ($offers as $offer)
                        <tr>
                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                            <td class="text-center">{{ $offer->sell_laptop_name }}</td>
                            <td class="text-center">{{ $offer->sell_laptop_condition ? 'New' : 'Old' }}
                            </td>
                            <td class="text-center">Rp
                                {{ number_format($offer->sell_laptop_price, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $offer->sell_laptop_weight }}</td>
                            <td class="text-center">
                                <a href="/dashboard/offer/rejected/{{ $offer->id }}" class="badge bg-info"><i
                                        class="fas fa-info-circle"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </div>
            @endif
        </div>
    </tbody>
</table>
