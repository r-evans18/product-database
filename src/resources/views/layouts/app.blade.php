@extends('layouts.master')
@section('title', 'page')


@section('template')

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Product Database</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.catalogue.index')}}">Catalogue <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.products.index')}}">Master Stock <span class="sr-only"></span></a>
      </li>
    </ul>
    <form action="{{route('search-products')}}" class="form-inline my-2 my-lg-0 mr-sm-2" method="post">
        @csrf
      <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <a class="btn btn-secondary" href="{{route('logout')}}">Logout</a>
  </div>
</nav>

<div class="container-fluid staff-container">
    @if (Session::has('warning'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fa fa-info-circle"></i>&nbsp;&nbsp;{{Session::get('warning')}}
            </div>
        </div>
    </div>
    @endif
    @if (Session::has('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-info-circle"></i>&nbsp;&nbsp;{{Session::get('success')}}
            </div>
        </div>
    </div>
    @endif
    <div class="container" style="margin-top: 16px;">
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>
    </div>
</div>
@endsection
