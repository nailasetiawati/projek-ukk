@extends('app.auth')


<div class="bg-login">
    <div class="container">
        @if (session('Error'))
    <div class="col-6 mx-auto alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('Error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
        <div class="card mt-login shadow-lg mx-auto p-4" style="width:33rem;">
            <img src="https://www.zarla.com/images/zarla-n-1x1-2400x2400-20220729-94gbt9wpqyv394dmkdrb.png?crop=1:1,smart&width=250&dpr=2" class="p-2 mx-auto border border-danger rounded-circle d-block icon">
            <form action="/" method="post">
                @csrf
                <label for="" class="text-dark">Username</label>
                <input type="text"  name="username" class="form-control mb-3  @error('username')
                is-invalid
            @enderror">
            @error('username')
            <div class="invalid-feedback">
                <p class="text-danger">{{ $message }}</p>
            </div>
        @enderror
                <label for="" class="text-dark">Password</label>
                <input type="password" class="form-control mb-3 @error('password')
                    is-invalid
                @enderror" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
                <button type="submit" class="btn btn-danger text-white col-12">Login</button>
            </form>
        </div>
    </div>
</div>
