<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <span class="logo logo-light">
                    <span class="logo-sm" style="color: aliceblue;">
                       <a href="{{ route('home') }}" style="color: white"> FI</a>
                    </span>
                    <span class="logo-lg" style="color: aliceblue;">
                     <a href="{{ route('home') }}" style="color: white">  FINANCIERA IBEROAMERICANA S.A</a>
                    </span>
                </span>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse"
                data-bs-target="#topnav-menu-content">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="ri-apps-2-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <div class="px-lg-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">

                                    <i class="ri-mail-send-line" style="font-size: x-large; color: #168E78"></i>
                                    <span> Correo</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="https://www.dropbox.com/es/">
                                    {{-- <img src="assets/images/brands/dropbox.png" alt="dropbox"> --}}
                                    <i class="ri-dropbox-fill" style="font-size: x-large; color: #004F83"></i>
                                    <span>Nube</span>
                                </a>
                            </div>
                            @hasrole('super-admin')
                            <div class="col">
                                <a class="dropdown-icon-item" href="{{ route('admin.home') }}" target="_blank">
                                    <i class="ri-window-line" style="font-size: x-large; color: #252B3B"></i>
                                    <span>Administración</span>
                                </a>
                            </div>
                            @endhasrole
                           
                        </div>

                    </div>
                </div>
            </div>
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>




            @auth



<div class="dropdown d-inline-block user-dropdown">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{-- <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar"> --}}
        <i class="ri-user-line me-1"></i>
        <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name }}</span>
        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
        <a class="dropdown-item" href="#"><i class="ri-account-box-line align-middle me-1"></i> Perfil</a>
        {{-- <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My Wallet</a>
        <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i
                class="ri-settings-2-line align-middle me-1"></i> Settings</a>
        <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a> --}}
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="ri-shut-down-line align-middle me-1 text-danger"></i>Salir</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </div>
</div>

           
            @else

            <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            ENTRAR
                        </button>
                        <div class="dropdown-menu  dropdown-menu-lg dropdown-menu-end">
                    
                            <div class="container">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                    
                                    <div class="mb-3">
                                        <input id="email" type="email"
                                            class="form-control form-control-sm @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="fasle" autofocus>
                    
                                        <div class="mb-3">
                                            <input id="password" type="password" class="form-control form-control-sm" @error('password')
                                                is-invalid @enderror" name="password" required autocomplete="current-password">
                    
                                        </div>
                    
                                        <div class="d-grid gap-2 mb-3">
                                            <input class="btn btn-primary btn-sm" type="submit" value="Login">
                    
                                        </div>
                                </form>
                            </div>
                    
                        </div>
                    </div>

            @endauth


 


        </div>
    </div>
</header>