@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="sm:block navigations">
        <div style="margin-bottom:15px;margin-top:25px">
            <form action="{{ route('cart.index') }}" method="POST">  
                {{ csrf_field() }}
                {{ method_field('GET') }}
                <button style="background-color:#e0e0e0;color:#808080;width:100%;height:45px" class="btn btn-secondary">View Cart</button>
            </form>
        </div>
        <div style="margin-bottom:15px">
            <form action="{{ route('list') }}" method="POST">  
                {{ csrf_field() }}
                {{ method_field('GET') }}
                <button style="background-color:#e0e0e0;color:#808080;width:100%;height:45px" class="btn btn-secondary">View List</button>
            </form>
        </div>
        <div style="margin-bottom:15px">
            <form action="{{ route('logout') }}" method="POST">  
            {{ csrf_field() }}
            {{ method_field('PUT') }}  
                <button style="background-color:#e0e0e0;color:#808080;width:100%;height:45px" class="btn btn-secondary">Logout</button>
            </form>
        </div>
    </div> 


    <div class="main">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/list">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>Products In Our Store</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($products as $pro)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <img src="/images/{{ $pro->image_path }}"
                                     class="card-img-top mx-auto"
                                     style="height: 150px; width: 150px;display: block;"
                                     alt="{{ $pro->image_path }}"
                                >
                                <div class="card-body">
                                    <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a>
                                    <p>${{ $pro->price }}</p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                                        <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                              <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection