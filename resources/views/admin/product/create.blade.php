@extends('admin.layouts.app')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">create an product</h5>
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                    <i class="bi bi-exclamation-octagon me-1"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="price" class="col-sm-2 col-form-label">Product price</label>
                            <input type="number" step="any" class="form-control" name="price">
                            @error('price')
                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                    <i class="bi bi-exclamation-octagon me-1"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Product quantity</label>
                            <input type="number" class="form-control" name="quantity">
                            @error('quantity')
                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                    <i class="bi bi-exclamation-octagon me-1"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="col-sm-2 col-form-label">Product Category</label>
                            <select class="form-select" aria-label="Default select example" name="category_id">
                                <option disabled selected value="">Open this select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                    <i class="bi bi-exclamation-octagon me-1"></i>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
