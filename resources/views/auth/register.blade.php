@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center fw-light my-3">Register</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="name" type="text" placeholder="John Doe"
                                    required />
                                <label for="name">Nama</label>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email"
                                    placeholder="name@example.com" required />
                                <label for="email">Email</label>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" name="password" type="password"
                                    placeholder="password" />
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password_confirmation" name="password_confirmation"
                                    type="password" placeholder="password-confirmation" />
                                <label for="password">Password Confirmation</label>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
