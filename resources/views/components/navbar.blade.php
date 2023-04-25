{{-- <!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src={{asset("dist/img/AdminLTELogo.png")}} alt="AdminLTELogo" height="60" width="60">
</div> --}}
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('profile.index') }}" class="nav-link">Profil</a>
        </li>
        <form action="{{url('logout')}}">
            @csrf
            <button type="submit" class="btn-sm btn-primary" style="background-color:#FF0000; border-color:aliceblue">
                <i class="fas fa-sign-out-alt"> Logout</i>
            </button>
        </form>

    </ul>
</nav>
<!-- /.navbar -->
