<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('transaksi')}}" class="brand-link">
        <center>
            <img src={{asset("assets/img/auto2000.png")}} style="width:50%">
        </center> 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Hi, {{ auth()->user()->name }}</a>
                
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{url('transaksi')}}" class="nav-link ">
                        <i class="nav-icon fas fa-camera-retro"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('transaksi/report')}}" class="nav-link ">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            History Transaksi    
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('kardus')}}" class="nav-link ">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Master Data Kardus  
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    
</aside>
