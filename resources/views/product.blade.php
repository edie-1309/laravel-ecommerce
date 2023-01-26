@extends('layouts.main')

@section('container')
    <div class="container my-5">
        <div class="mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('storage') . '/' . $product->image }}" class="img-fluid rounded-start">
              </div>
              <div class="col-md-8 px-5">
                  <form action="{{ route('insert.cart') }}" method="post" class="d-inline">
                    @csrf
                    <h3 class="fw-semibold">{{ $product->name }}</h3>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <p>{!! $product->description !!}</p>

                    <p class="fw-semibold">Genre : </p>
                    <p class="mb-5">
                      @foreach ($product->category as $category)
                          <small class="badge bg-blue py-2 px-3 rounded-4">{{ $category->name }}</small>
                      @endforeach
                    </p>

                    <div class="d-block mb-5">
                        <p class="fw-semibold">Platform : </p>
                        @foreach ($product->stock as $stock)
                            @if ($stock->stock > 0)
                              <input type="radio" class="btn-check" name="platform_id" value="{{ $stock->platform->id }}" id="option{{ $stock->platform->id }}" autocomplete="off" checked>
                              <label class="btn fw-semibold" for="option{{ $stock->platform->id }}">{{ $stock->platform->name }}</label>
                            @endif
                        @endforeach
                    </div>

                    <div class="mb-5" id="qty">
                      <label for="" class="fw-semibold d-block mb-2">Qty : </label>
                      <input type="number" name="qty" class="qty-input" min="1" value="1">
                    </div>

                    <p class="fw-semibold">Price : </p>
                    <p class="fw-semibold mb-3">
                      @currency($product->price)
                      <input type="hidden" name="total" value="{{ $product->price }}">
                    </p>
                  
                    <button type="submit" class="py-2 px-4 button-primary rounded-5 d-block" id="button-cart">Add to cart</button>
                  </form>
              </div>
            </div>
        </div>
    </div>

    <script>
      $(document).ready(function () {
        let input = $('input[name=platform_id]');

        input.each(function() {
          let id = $(this);

          id.click(function() {
            let platform_id = id.val();
            let product_id = $('input[name=product_id]').val();

            $.ajax({
              url: 'http://localhost:8000/product/checkStock/' + product_id + '/' + platform_id,
              type: 'GET',
              dataType: 'json',
              success: function(result) {
                if(result.stock > 0)
                {
                  $('#button-cart').html('Add to cart');
                  $('#button-cart').removeAttr("disabled", "disabled");
                  $('#qty').show();
                }else{
                  $('#button-cart').html('Sold Out');
                  $('#button-cart').attr("disabled", "disabled");
                  $('#qty').hide();
                }
              }
            });
          });
        });
      });
    </script>
@endsection