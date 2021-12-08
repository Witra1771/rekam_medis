@extends('layouts.app')
@include('common.header', ['titlePage' => 'Login'])

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5  text-primary">
                <br><br>
                <center>
                <img src="{{ asset('img/dash.png') }}" alt="" style="width:80%;">
                <p><b>Jl. Arya Wiratanudatar</b></p>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <br><br><br>
                <div class="col-md-6 margin-top-md text-primary"><center><h2>Login</h2></center>
                            <center>Silahkan Login untuk Melanjutkan</center><br>
                <form method="POST" action="{{ route('login.custom') }}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="text" placeholder="Username" id="email" class="form-control" name="username" required
                                                autofocus>
                                            @if ($errors->has('username'))
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group mb-3">
                                            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
