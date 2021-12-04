@extends('dashboard.pembeli.layout-buyer')
@section('title')
    Formulir testimoni
@endsection

@section('aftercss')
    <style>
        .star-label {
            cursor: pointer;
        }

        .star-input {
            display: none;
        }

    </style>
@endsection

@section('buyer-content')
    <div class="bg-white mt-3 m-md-0 p-4 rounded">
        <h3 class="text-blue mb-3">Formulir testimoni</h3>

        <p><strong>Nama produk:</strong></p>
        <div class="row mb-3">
            <div class="col-md-3">
                <img class="img-fluid" src="{{ asset($laptop->laptop_image()->first()->laptop_image) }}"
                    alt="{{ $laptop->laptop_name }}">
            </div>
            <div class="col-md-9 mt-3 m-md-0">
                <p><strong>{{ $laptop->laptop_name }}</strong></p>
                <p><strong>Jumlah:</strong> {{ $amount }}</p>
                <p><strong>Subtotal:</strong> Rp. {{ number_format($total, 0, ',', '.') }}</p>
            </div>
        </div>
        <form action="{{ route('buyer-order.addtestimoni') }}" method="POST">
            @csrf
            <input required type="hidden" name="buyer_user_id" value="{{ $buyer_id }}">
            <input required type="hidden" name="order_detail_id" value="{{ $order_detail_id }}">
            <input required type="hidden" name="laptop_id" value="{{ $laptop->id }}">
            <p><strong>Rating:</strong></p>
            <div class="stars mb-3">
                <input class="star-input star-1" id="star-1" type="radio" name="rating" value="1" required />
                <label class="star-label text-secondary star-1" for="star-1"><i class="fs-3 fas fa-star"></i></label>
                <input class="star-input star-2" id="star-2" type="radio" name="rating" value="2" />
                <label class="star-label text-secondary star-2" for="star-2"><i class="fs-3 fas fa-star"></i></label>
                <input class="star-input star-3" id="star-3" type="radio" name="rating" value="3" />
                <label class="star-label text-secondary star-3" for="star-3"><i class="fs-3 fas fa-star"></i></label>
                <input class="star-input star-4" id="star-4" type="radio" name="rating" value="4" />
                <label class="star-label text-secondary star-4" for="star-4"><i class="fs-3 fas fa-star"></i></label>
                <input class="star-input star-5" id="star-5" type="radio" name="rating" value="5" />
                <label class="star-label text-secondary star-5" for="star-5"><i class="fs-3 fas fa-star"></i></label>
            </div>
            <div class="mb-3">
                <label for="testimonial_desc" class="form-label"><strong>Testimoni:</strong></label>
                <textarea class="form-control" name="testimonial_desc" id="testimonial_desc" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-blue">Kirim</button>
            </div>
        </form>
    </div>
@endsection

@section('afterscript')
    <script>
        const stars = document.querySelectorAll('.star-label');
        stars.forEach(star => {
            star.addEventListener('click', function() {
                const starId = this.getAttribute('for');
                const starInput = document.getElementById(starId);
                starInput.checked = true;

                stars.forEach(item => {
                    item.classList.add('text-secondary');
                    item.classList.remove('text-warning');
                });

                this.classList.add('text-warning');
                this.classList.remove('text-secondary');

                let prevStar = this.previousElementSibling;
                while (prevStar) {
                    prevStar.classList.add('text-warning');
                    prevStar.classList.remove('text-secondary');
                    prevStar = prevStar.previousElementSibling;
                }

            });
        });
    </script>
@endsection
