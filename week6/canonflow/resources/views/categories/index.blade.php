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
                        <th scope="col">Name</th>
                        <th scope="col">Number of Food</th>
                        <th scope="col">List of Food Name</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cnt => $category)
                          <tr>
                            <td>{{ $cnt + 1 }}</td>
                            <td>{{ $category['category'] }}</td>
                            <td><strong>{{ $category['total'] }}</strong></td>
                            <td>
                              <ul>
                                  @foreach ($category['foods'] as $food)
                                      <li>
                                          {{ $food->name }}
                                      </li>
                                  @endforeach
                              </ul>
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
@endsection