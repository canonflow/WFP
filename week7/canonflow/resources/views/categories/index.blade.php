@extends('layouts.adminlte4', [
    'title' => "Categories"
])

@section('content')
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class=mb-0>List of Category</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Categories
            </li>
          </ol>
        </div>
      </div>
    </div>

    <div class="app-content pt-2 px-0">
      <div class="container-fluid">
        <div class="card">
            <div class="card-body p-1">
                <table class="table table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Show Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Number of Food</th>
                        <th scope="col">List of Food Name</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cnt => $category)
                          <tr>
                            <td>{{ $cnt + 1 }}</td>
                            <td>
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal-{{ $category['category']->id }}">
                                Show
                              </button>
                              @push('modals')
                                <!-- Modal -->
                                <div class="modal fade" id="imageModal-{{ $category['category']->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Image for {{ $category['category']->name }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <img 
                                          class="img-fluid rounded"
                                          src="{{ asset('storage/categories/' . $category['category']->image) }}"
                                        />
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @endpush
                            </td>
                            <td>{{ $category['category']->name }}</td>
                            <td><strong>{{ $category['total'] }}</strong></td>
                            {{-- <td>
                              <ul>
                                  @foreach ($category['foods'] as $food)
                                      <li>
                                          {{ $food->name }}
                                      </li>
                                  @endforeach
                              </ul>
                            </td> --}}
                            <td>
                              <button
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#detailModal"
                                onclick="showDetail({{ $category['category']->id }})"  
                              >
                                Details
                              </button>
                            </td>
                          </tr>   
                        @endforeach
                    </tbody>
                </table>
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
  <script>
    function showDetail(id) {
      $.ajax({
        type: 'POST',
        url: '{{ route("category.showListFoods", ["category" => ":category"]) }}'.replace(":category", id),
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(data) {
          console.log(data);
          
          $('#detail-title').html(data.title);
          $('#detail-body').html(data.body);
        }
      });
    }
  </script>
@endpush