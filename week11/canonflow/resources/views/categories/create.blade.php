@extends('layouts.adminlte4', [
    'title' => "Add | Categories"
])

@section('content')
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class=mb-0>Add Category</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <a href="{{ route('categories.index') }}">Categories</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Create
            </li>
          </ol>
        </div>
      </div>
    </div>

    <div class="app-content pt-2 px-0">
      <div class="container-fluid">
        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('categories.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="lblName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="lblName" placeholder="Enter category name" name="category">
                    </div>
                    <div class="mb-3">
                        <label for="lblImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="lblImage" placeholder="Enter image url" name="image">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>

  @push('modals')
  <!-- Modal -->
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="detail-title">List of </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="detail-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endpush
@endsection

@push('scripts')

@endpush