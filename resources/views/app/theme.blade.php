<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <link rel="stylesheet" href="{{asset('/assets/css/atlantis.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/assets/css/fonts.min.css')}}"/>
    <link rel="icon" type="image/png" href="#"/>
</head>

<body>

<div class="wrapper">
    <div class="main-header">
        <div class="logo-header" data-background-color="blue">

            <a href="{{url('/app')}}" class="logo">
                <img style="width: 180px;" src="{{asset('/assets/img/logo.png')}}" alt="navbar brand" class="navbar-brand">
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="icon-menu"></i>
                </button>
            </div>
        </div>

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

            <div class="container-fluid">
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="{{asset('/assets/img/admin.png')}}" alt="image profile"
                                     class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="u-text ml-auto mr-auto">
                                            <a href="{{url('/logout')}}" class="btn btn-xs btn-danger">Sair</a>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <div class="user">
                    <div class="avatar-sm float-left mr-2">
                        <img src="{{asset('/assets/img/admin.png')}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{Session::get('auth')->name}}
									<span class="user-level">Operador</span>
									<span class="caret"></span>
								</span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#profile">
                                        <span class="link-collapse">My Profile</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-primary">
                    <li class="nav-item {{ Request::is('app') ? 'active' : '' }}">
                        <a href="{{url('/app')}}" class="collapsed">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('app/customers') ? 'active' : '' }}">
                        <a href="{{url('/app/customers')}}" class="collapsed">
                            <i class="fas fa-users"></i>
                            <p>Clientes</p>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::is('app/plans') ? 'active' : '' }}">
                        <a href="{{url('/app/plans')}}" class="collapsed">
                            <i class="fas fa-cart-plus"></i>
                            <p>Planos</p>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::is('app/invoices') ? 'active' : '' }}">
                        <a href="{{url('/app/invoices')}}" class="collapsed">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <p>Faturas</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="collapsed">
                            <i class="fas fa-chart-line"></i>
                            <p>Despesas</p>
                        </a>
                    </li>

                    <!--
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Base</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="components/avatars.html">
                                        <span class="sub-item">Avatars</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    -->


                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="content">
            @yield('content')
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright ml-auto">
                    DX Financial Powered by <b><a target="_blank" href="#">DX Dev</a></b>
                </div>
            </div>
        </footer>

    </div>
</div>

<script src="{{asset('/assets/js/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('/assets/js/atlantis.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/chart.min.js')}}"></script>
<script src="{{asset('/assets/js/circles.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('/assets/js/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('/assets/js/sweetalert2@10.js')}}"></script>
<script src="{{asset('/assets/js/webfont.min.js')}}"></script>

@yield('scripts')

</body>
</html>