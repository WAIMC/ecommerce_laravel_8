@extends('layouts.adminAuth')

@section('main')
    <div class="container-fluid">
        <div class="row bg-dark">
            <div class="col-10 m-auto">
                <div class="row bg-light my-3 d-flex align-content-center" style="height:600px;border-radius:2%;">
                    <div class="col-6 m-0 p-0  m-auto">
                        <div class="row">
                            <img src="{{ url('public/dashboard/image/logo_login.png') }}" class="m-auto" alt="">
                        </div>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <div class="row d-block col-8 m-auto text-center">
                            {{-- alert result affter register a item --}}
                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{Session::get('error')}}</strong>
                                </div>
                            @elseif (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    <strong>{{Session::get('success')}}</strong>
                                </div>
                            @endif
                            <!-- Default box -->
                            <form action="{{ route('admin.register') }}" method="post">
                                @csrf
                                <h3 class="">Register For Admin</h3>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-white "> <i class="fa fa-users"
                                                    aria-hidden="true"></i> </div>
                                        </div>
                                        <input type="text" name="name" id="name" aria-describedby="helpId"
                                            placeholder="Full Name" value="{{ old('name') }}" required autocomplete="name"
                                            autofocus
                                            class="form-control form-control-lg @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-white "> <i class="fa fa-users"
                                                    aria-hidden="true"></i> </div>
                                        </div>
                                        <input type="text" name="email" id="email" aria-describedby="helpId"
                                            placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-light "> <i class="fas fa-lock"
                                                    aria-hidden="true"></i> </div>
                                        </div>
                                        <input type="password" name="password" id="password" aria-describedby="helpId"
                                            placeholder="Password" required autocomplete="new-password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-light "> <i class="fas fa-lock"
                                                    aria-hidden="true"></i> </div>
                                        </div>
                                        <input type="password" class="form-control form-control-lg"
                                            name="password_confirmation" id="password-confirm" aria-describedby="helpId"
                                            placeholder="Confirm Password" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <button type="submit" class="form-control btn-lg btn-outline-primary">REGISTER</button>
                                    <a href="{{ route('admin.login') }}"
                                        class=" form-control btn-lg btn-outline-primary mt-2">Go To Login</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
