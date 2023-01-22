@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <h2 class="mb-4 fw-semibold">Detail Product</h2>

        <div class="card mb-4">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('storage') . '/' . $product->image }}" class="img-fluid rounded-start">
              </div>
              <div class="col-md-8 p-4">
                <div class="card-body">
                  <h3 class="card-title fw-semibold">{{ $product->name }}</h3>
                  <p class="card-text">{!! $product->description !!}</p>
                  <p class="card-text">
                    @foreach ($product->category as $category)
                        <small class="badge bg-dark">{{ $category->name }}</small>
                    @endforeach
                  </p>
                  <p class="card-text">
                    @foreach ($product->platform as $platform)
                        <small class="badge bg-light text-dark">{{ $platform->name }}</small>
                    @endforeach
                  </p>
                  <p class="d-inline-block text-dark fw-semibold">
                    Price : {{ $product->price }}
                  </p>
                </div>
              </div>
            </div>
        </div>

        <h3 class="fw-semibold">Stock</h3>

        <a href="#" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#insertModal">Create new stock</a>

        @if (session()->has('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('fail'))
          <div class="alert alert-danger mb-3">
              {{ session('fail') }}
          </div>
        @endif

        {{-- If error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <table class="table">
            <thead>
              <tr class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Platform</th>
                <th scope="col">Stock</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($product->stock as $stock)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $stock->platform->name }}</td>
                  <td>{{ $stock->stock }}</td>
                  <td class="col-2">
                    <a href="#" class="badge bg-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editData(event)" data-id="{{ $stock->id }}">Update</a>
                    <form class="d-inline" action="/dashboard/stock/{{ $stock->id }}" onsubmit="return confirm('Are you sure?');" method="POST">
                      @csrf
                      @method('delete')
                      <button class="badge bg-danger border-0" type="submit">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>

    <!-- Insert Modal -->
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="insertModalLabel">Create stock</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/dashboard/stock" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputPlatform" class="form-label">Platform</label>
                            <select class="form-select @error('platform_id') is-invalid @enderror" name="platform_id" id="inputPlatform">
                                <option value="">Choose a platform</option>
                                @foreach ($product->platform as $platform)
                                    <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputStock" class="form-label">Stock</label>
                            <input type="text" class="form-control" name="stock" id="inputStock">
                        </div> 

                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="insertModalLabel">Update stock</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/dashboard/stock" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <input type="hidden" name="id" value="" id="stock_id">
                        <div class="mb-3">
                            <label for="updatePlatform" class="form-label">Platform</label>
                            <select class="form-select" name="platform_id" id="updatePlatform">
                              {{-- Option --}}
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="updateStock" class="form-label">Stock</label>
                            <input type="text" class="form-control" name="stock" id="updateStock">
                        </div> 

                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
      function editData(event)
      {
        event.preventDefault();
        const dataId = event.target.dataset.id;
        fetch(`/dashboard/stock/${dataId}/edit`)
          .then(response => response.json())
          .then(data => {
            // Stock id
            document.getElementById("stock_id").value = data.stock.id;

            // Platform select
            let select = document.getElementById("updatePlatform");
            select.innerHTML = "";
            let option = document.createElement("option");
            option.value = data.stock.platform_id;
            option.innerHTML = data.platform_name;
            select.appendChild(option);

            document.getElementById("updateStock").value = data.stock.stock;
            $("#editModal").modal("show");
          });
      }
    </script>
@endsection