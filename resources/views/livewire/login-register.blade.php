
<div class="login-form">
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    @if($registerForm)
        <form action="{{ route('user.register') }}" method="POST">
        {{  csrf_field()  }}
            <h2 class="text-center">User Registration</h2>
            
            <div class="form-group">
                <input name="name" type="text" wire:model="name" class="form-control" placeholder="Full Name" required="required">
                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
               
            <div class="form-group">
                <input name="email" type="text" wire:model="email" class="form-control" placeholder="Email" required="required">
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
                
            <div class="form-group">
                <input name="password" type="password" wire:model="password" class="form-control" placeholder="Password" required="required">
                @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
                
            <div class="form-group">
                <button class="btn btn-primary btn-block" wire:click.prevent="registerStore">Register</button>
            </div>        
        </form>
        <p class="text-center">Already have an account? <a class="text-primary" wire:click.prevent="register"><strong>Login</strong></a></p>
    @else
    
    <form>
    {{  csrf_field()  }}
    {{ method_field('POST') }}
        <h2 class="text-center">User Login</h2>    
            
        <div class="form-group">
            <input type="text" wire:model="email" class="form-control" placeholder="Username" required="required">
            @error('email') <span class="text-danger error">{{ $message }}</span>>@enderror
        </div>
                
        <div class="form-group">
            <input type="password" wire:model="password" class="form-control" placeholder="Password" required="required">
            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
                
        <div class="form-group">
            <button class="btn btn-primary btn-block" wire:click.prevent="login">Login</button>
        </div>

        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div>               
    </form>
    <p class="text-center">Don't have account? <a class="text-primary" wire:click.prevent="register" style="cursor:pointer"><strong>Register Here</strong></a></p>
    <p class="text-center">Do you have a Key? <a href="/bypass" class="text-primary"><strong>Login Here</strong></a></p>
    @endif
</div>
