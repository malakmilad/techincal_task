@extends('admin.layouts.app')
@section('content')
<div class="container">
    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
      <h2>welcome to technical task</h2>
      <img src="{{asset('assets/img/not-found.svg')}}" class="img-fluid py-5" alt="Page Not Found">
    </section>
  </div>
@endsection
