<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Kardusku</title>
    <link rel="icon" href={{ asset("auto2000.png") }}>

    @stack('prepend-style')
    @include('components.auth.style')
    @stack('addon-style')

</head>

<body class="login-page">
    <div class="login-box pb-5">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h5>Login</h5>
                <h2>KARDUSKU</h2>
            </div>
            <div class="card-body">
                <img src={{asset("assets/img/auto2000.png")}} class="img-fluid" alt="Responsive image">
            </div>
            <div class="card-body">
                <form action="{{ url('login/proses') }}" method="post">
                    @csrf
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
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                    <br>
                    <p class="text-center">Belum punya akun? <a href="/register">Register</a></p>
                </form>
            </div>
        </div>
    </div>

    <footer class="container-fluid py-2 bg-primary text-white d-flex align-items-center fixed-bottom">
        <div class="position-absolute d-flex gap-2">
        </div>
        <span class="mx-auto"><strong>Copyright &copy; 2023 <a href="#">TIM Auto 2000</a>.</strong></span>
    </footer>

</body>

</html>