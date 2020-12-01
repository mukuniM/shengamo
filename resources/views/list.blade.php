<style>
    body, html {
    background: #e2e9f4;height: 100%;place-items: center;
}  
            
@import url('https://fonts.googleapis.com/css?family=Orbitron&display=swap');
@import url('https://fonts.googleapis.com/css?family=Hind&display=swap');
* {
    -webkit-font-smoothing: antialiased;color: #acbdce;
}
:root {
    --border-radius: 10px;
}
</style>

@extends('layouts.list')

@section('content')
    <div class="container">
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:60px;">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif

    <div class="px-6 py-4 sm:block navigations">
        <div style="margin-bottom:15px">
            <form action="{{ route('shop') }}" method="POST">  
                {{ csrf_field() }}
                {{ method_field('GET') }}
                <button style="background-color:#e0e0e0;color:#808080;width:100%;height:45px" class="btn btn-secondary">View Shop</button>
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
        <nav aria-label="breadcrumb" style="width:97%">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create My List</li>
            </ol>
        </nav>
        <div>
            
            <form action="{{ route('cart.list') }}" method="POST">
                {{ csrf_field() }}
                <div class="Card">
                    <div class="CardInner">
                        <label>Add an Item</label>
                        <div class="container">
                            <div class="InputContainer">
                                <input placeholder="It just can't be pizza..." name="item" id="item"/>
                            </div>
                            <a href="#0" class="cd-add-to-cart js-cd-add-to-cart" data-price="25.99">Add To List</a>
                        </div>
                    </div>
                </div>
            </form>    
            
        </div>
    </div>

    
        <div class="cd-cart cd-cart--empty js-cd-cart">
            <a href="#0" class="cd-cart__trigger text-replace">
            <ul class="cd-cart__count"> <!-- cart items count -->
                <li>0</li>
                <li>0</li>
            </ul> <!-- .cd-cart__count -->
            </a>
            <div class="cd-cart__content">
                <div class="cd-cart__layout">
                    <header class="cd-cart__header">
                        <h2>My List</h2>
                        <span class="cd-cart__undo">Item removed. <a href="#0">Undo</a></span>
                    </header>
	
                    <div class="cd-cart__body">
                        <ul>
                            <!-- products added to the cart will be inserted here using JavaScript -->
                        </ul>
                    </div>

                    <footer class="cd-cart__footer">
                        <a href="{{ route('submit')}}" class="cd-cart__checkout">
                            <em>Done - $<span>0</span>
                                <svg class="icon icon--sm" viewBox="0 0 24 24"><g fill="none" stroke="currentColor"><line stroke-width="2" stroke-linecap="round" stroke-linejoin="round" x1="3" y1="12" x2="21" y2="12"/><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="15,6 21,12 15,18 "/></g>
                                </svg>
                            </em>
                        </a>
                    </footer>
                </div>
            </div> <!-- .cd-cart__content -->
        </div> <!-- cd-cart -->
</div>
@endsection