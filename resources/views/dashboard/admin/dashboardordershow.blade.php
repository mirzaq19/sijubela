@extends('layout')
@section('title', 'Detail Order')

@section('aftercss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Demo styles -->
    <style>
        .content {
            min-height: 0;
        }

    </style>
@endsection

@section('content')
    <div class="container my-5 bg-white rounded px-3">
        <div class="d-flex justify-content-between py-3">
            <div class="p-2">
                <a href="/admin-dashboard/orders" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-circle-left"></i>
                </a>
            </div>
            <div class="p-2"></div>
            <div class="p-2">
                <div class="p-2">

                    <a href="/admin-dashboard/orders/{{ $order->id }}/edit"
                        class="btn btn-primary {{ $order->order_status == 'not_paid' ? 'disabled' : '' }}">Change
                        Delivery
                        Status</a>
                </div>
            </div>
        </div>
        <p class="h2 pb-3">Order #{{ $order->id }} from {{ $buyer->buyer_username }}</p>
        <div class="row g-3 pb-3">
            @foreach ($orderdetails as $orderdetail)
                @if ($orderdetails->count() > 1)
                    <p class="h4">Order {{ $loop->iteration }}</p>
                @endif

                <div class="col-md-6">
                    <label for="laptop_name" class="form-label">Laptop Name</label>

                    <input type="text" class="form-control" id="laptop_name"
                        placeholder="{{ $laptops->where('id', '==', $orderdetail->laptop_id)->pluck('laptop_name')->first() }}"
                        disabled readonly>
                </div>

                <div class="col-md-6">
                    <label for="order_detail_amount" class="form-label">Amount</label>

                    <input type="text" class="form-control" id="order_detail_amount"
                        placeholder="{{ $orderdetail->order_detail_amount }}" disabled readonly>
                </div>

                <div class="col-md-6">
                    <label for="price_subtotal" class="form-label">Price (Rp)</label>

                    <input type="text" class="form-control" id="price_subtotal"
                        placeholder="{{ number_format($orderdetail->price_subtotal, 0, ',', '.') }}" disabled readonly>
                </div>

                <div class="col-md-6">
                    <label for="weight_subtotal" class="form-label">Weight (Kg)</label>

                    <input type="text" class="form-control" id="weight_subtotal"
                        placeholder="{{ $orderdetail->weight_subtotal }}" disabled readonly>
                </div>

                <div class="col-12 mb-2">
                    <label for="order_detail_note" class="form-label">Note</label>
                    <textarea type="text" class="form-control" id="order_detail_note"
                        placeholder="{{ $orderdetail->order_detail_note }}" rows="3" disabled readonly></textarea>
                </div>

            @endforeach

            @if ($order->order_status != 'not_paid')
                <p class="h4">Payment</p>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <img class="img-thumbnail" src="{{ asset($payment->payment_image) }}" alt="Payment">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <label for="payment_account_name" class="form-label">Account Name</label>
                                <input type="text" class="form-control" id="payment_account_name"
                                    placeholder="{{ $payment->payment_account_name }}" disabled readonly>
                            </div>
                            <div class="col-12">
                                <label for="payment_account_number" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="payment_account_number"
                                    placeholder="{{ $payment->payment_account_number }}" disabled readonly>
                            </div>
                            <div class="col-12">
                                <label for="payment_bank_name" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="payment_bank_name"
                                    placeholder="{{ Str::upper($payment->payment_bank_name) }}" disabled readonly>
                            </div>
                            <div class="col-12">
                                <label for="payment_status" class="form-label">Payment Status</label>
                                <input type="text" class="form-control" id="payment_status"
                                    placeholder="{{ Str::ucfirst($payment->payment_status) }}" disabled readonly>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <p class="h4">Summary</p>

            <div class="col-md-6">
                <label for="order_status" class="form-label">Order Status</label>

                <input type="text" class="form-control" id="order_status"
                    placeholder="{{ Str::ucfirst(str_replace('_', ' ', $order->order_status)) }}" disabled readonly>
            </div>

            <div class="col-md-6">
                <label for="shipping_status" class="form-label">Shipping Status</label>

                <input type="text" class="form-control" id="shipping_status"
                    placeholder="{{ Str::ucfirst($order->shipping_status) }}" disabled readonly>
            </div>

            <div class="col-md-6">
                <label for="shipping_cost" class="form-label">Shipping Cost (Rp)</label>

                <input type="text" class="form-control" id="shipping_cost"
                    placeholder="{{ number_format($order->shipping_cost, 0, ',', '.') }}" disabled readonly>
            </div>

            <div class="col-md-6">
                <label for="total_price" class="form-label">Total Price (Rp)</label>

                <input type="text" class="form-control" id="total_price"
                    placeholder="{{ number_format($order->total_price, 0, ',', '.') }}" disabled readonly>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')

@endsection
