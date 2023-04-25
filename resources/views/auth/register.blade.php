<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Kardusku</title>
    <link rel="icon" href="{{asset("auto2000.png")}}">

    @stack('prepend-style')
    @include('components.style')
    @stack('addon-style')

</head>

<body class="hold-transition login-page">
    @include('sweetalert::alert')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h5>Register</h5>
                <h2>KARDUSKU</h2>
            </div>
            <div class="card-body">
                <img src={{asset("assets/img/auto2000.png")}}>
            </div>
            <div class="card-body">
                <form action="{{ url('register/store') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input autofocus type="text" class="form-control
                          @error('name')
                              is-invalid
                          @enderror
                          " placeholder="Nama" name="name" value="{{ old('name') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input autofocus type="text" class="form-control
                          @error('email')
                              is-invalid
                          @enderror
                          " placeholder="Email" name="email" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-text">Password minimal 8 karakter.</div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control
                        @error('password')
                            is-invalid
                        @enderror
                        " placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control
                        @error('password_confirmation')
                            is-invalid
                        @enderror
                        " placeholder="Ulangi Password" name="password_confirmation" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block"><li class="fa fa-save"></li>&nbsp; Register</button>
                    </div>
                    <!-- /.col -->
                    <br>
                    <p class="text-center">Sudah Punya Akun? <a href="/">Login</a></p>
            </div>
            </form>


            <!-- /.social-auth-links -->


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->
    @stack('prepend-script')
    @include('components.script')
    @stack('addon-script')

</body>

</html>
