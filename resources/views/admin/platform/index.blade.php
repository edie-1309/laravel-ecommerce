@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2>Platform</h2>

    <a href="#" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#insertModal">Create new platform</a>

    @if (session()->has('success'))
        <div class="alert alert-success mb-3">
          {{ session('success') }}
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

    <table class="table" id="platformTable">
        <thead>
          <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($platform as $platform)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $platform->name }}</td>
              <td>
                <form class="d-inline" action="/dashboard/platform/{{ $platform->slug }}" onsubmit="return confirm('Are you sure?');" method="POST">
                  @csrf
                  @method('delete')
                  <button class="badge bg-danger border-0" type="submit">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
  
<!-- Insert Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="insertModalLabel">Create platform</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/dashboard/platform" method="post">
                @csrf
                <div class="modal-body">
                    <label for="inputName" class="form-label">Platform</label>
                    <input type="text" class="form-control" id="inputName" name="name">             
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
  $(document).ready(function () {
    $('#platformTable').DataTable();
  });
</script>
@endsection