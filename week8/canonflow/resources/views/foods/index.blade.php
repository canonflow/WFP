@extends('layouts.adminlte4', [
  'title' => 'Foods'
])

@section('content')
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class=mb-0>List of Food</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Foods
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
                  <th scope="col">Category</th>
                  <th scope="col">Description</th>
                  <th scope="col">Nutrition Facts</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($foods as $cnt => $food)
                    <tr>
                      <td>{{ $cnt + 1 }}</td>
                      <td>{{ $food->name }}</td>
                      <td><strong>{{ $food->category->name }}</strong></td>
                      <td>{{ $food->description }}</td>
                      <td>{{ $food->nutritional_fact }}</td>
                      <td>{{ $food->price }}</td>
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