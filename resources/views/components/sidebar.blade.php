<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('transaksi')}}" class="brand-link">
                <center>
                    <img src={{asset("assets/img/auto2000.png")}} style="width:50%" class="img-fluid">
                </center>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_info">
                @if (auth()->user()->name == null)
                {{url('/login')}}
                @else
                <span>Welcome,</span>
                <h2>{{ auth()->user()->name }}</h2>
                @endif

            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{url('/')}}" class="nav-link ">
                            <i class="fa fa-camera-retro"></i>
                            Transaksi
                        </a>
                    </li>
                    <li>
                        <a href="{{url('transaksi/report')}}" class="nav-link ">
                            <i class="fa fa-list-ul"></i>
                            History Transaksi
                        </a>
                    </li>
                    <li>
                        <a href="{{url('kardus')}}" class="nav-link ">
                            <i class="fa fa-cubes"></i>
                            Master Data Kardus
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>