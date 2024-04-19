@extends('app.auth')


<div class="bg-login">
    <div class="container">
        <div class="card mt-login shadow-lg mx-auto p-4" style="width:33rem;">
            <div class="p-2 mx-auto bg-dark rounded-circle d-block icon">jsdas</div>
            <form action="">
                <label for="" class="text-dark">Username</label>
                <input type="text"  name="name" class="form-control mb-3">
                <label for="" class="text-dark">Password</label>
                <input type="password" class="form-control mb-3 @error('password')
                    is-invalid
                @enderror" name="password" required>
                <div class="invalid-feedback">
                    Please fill in your password
                </div>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-primary text-white col-12">Login</button>
            </form>
            <a class="text-center" href="/register">Belum Punya Akun? Klik Register!</a>
        </div>
    </div>
</div>
