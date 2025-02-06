@extends('admin.layouts.app')
@section('content')
<div class="col-12">
    <div class="card top-selling overflow-auto">
      <div class="card-body pb-0">
        <h5 class="card-title">Top Selling <span>| Today</span></h5>
        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">name</th>
              <th scope="col">Price</th>
              <th scope="col">quantity</th>
              <th scope="col">category</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category_id}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
