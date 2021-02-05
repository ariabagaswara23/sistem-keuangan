@extends('layouts.layout1')
@section('content')
    @php
        $breadcrumbs = Breadcrumbs::generate();
        function cekLink(){
            $breadcrumbs = Breadcrumbs::generate();
            if(strpos($breadcrumbs[0]->url, '/dashboard') !== false ){
                return 'Dashboard';
                
            }elseif (strpos($breadcrumbs[0]->url, "/submission") !== false) {
                return 'Submission';
                
            }elseif (strpos($breadcrumbs[0]->url, "/report") !== false) {
                return 'Report';
                
            }elseif (strpos($breadcrumbs[0]->url, "/manage-account") !== false) {
                return 'Manage Account';
                
            }
        }

    @endphp
    <div class="content" id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle" id="header-toggle">
                <i class="fas fa-bars" id="toggle-icon" onclick="sidebarIcon()"></i>
            </div>
            <div class="header__end">
                <div class="header__icon-list">
                    <a href="/edit-profil/{{ Auth::user()->nip }}"  class="header__icon" title="Edit Profile">
                        <i class="fa fa-user-edit"></i>
                    </a>
                </div>
                <div class="m-user_name">
                    <span class="m-name text-truncate">{{ session()->get('nama') }}</span>
                </div>
                <div class="header__img">
                    <img src="{{ URL::asset("img/avatar/".session()->get('picture') ) }}" alt="">
                </div>
            </div>
            
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="/dashboard" class="nav__logo">
                        <img src="{{ URL::asset("img/icon/stm.png") }}" class="nav__logo-icon" alt="">
                        <span class="nav__logo-name " id="logo_name">SMKN 1 Cimahi</span>
                    </a>
                    <div class="user_img" id="user-a">
                        <img id="user-a_img" src="{{ URL::asset("img/avatar/avatar.jpg") }}" alt="">
                        
                        <div class="user_profile">
                            <span class="user_name text-truncate" id="user_p">{{ session()->get('nama') }}</span>
                            <div class="user_status" id="user_s">
                                <i class="fas fa-square stat-icon"></i>
                                <span class="status" >online</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="nav__list">
                        <a href="/dashboard" class="nav__link {{ cekLink()=='Dashboard' ? 'active' : '' }}" id="Dashboard">
                            <i class="fas fa-tachometer-alt nav__icon"></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                        @if (session()->get('nama_jabatan') != 'Admin')
                            <a href="/submission" class="nav__link {{ cekLink()=='Submission' ? 'active' : '' }}" id="Submission">
                                <i class="fas fa-file-import nav__icon"></i>
                                <span class="nav_name">Submission</span>
                            </a>
                            <a href="/report" class="nav__link {{ cekLink()=='Report' ? 'active' : '' }}" id="Report">
                                <i class="fas fa-book-open nav__icon"></i>
                                <span class="nav_name">Report</span>
                            </a>
                        @endif
                        
                        @if (session()->get('nama_jabatan') == "Admin")
                            <a href="/manage-account" class="nav__link {{ cekLink()=='Manage Account' ? 'active' : '' }}" id="Manage Account">
                                <i class="fas fa-users-cog nav__icon"></i>
                                <span class="nav_name">Manage Account</span>
                            </a>
                        @endif
                        
                        
                    </div>
                </div>
                <a href="#" class="nav__link logout" data-toggle="modal" data-target="#confirmationLogout">
                    <i class="fas fa-sign-out-alt nav__icon"></i>
                    <span class="nav_name">Logout</span>
                </a>
            </nav>
        </div>
        
        <div class="dynamic-c">
            <div class="page_title">
                @if (count($breadcrumbs) > 1)
                    <div class="mr-3">
                        <a href="{{ $breadcrumbs[count($breadcrumbs)-2]->url }}" class="back_button"><i class="fas fa-arrow-left"></i></a>
                    </div>
                @endif
                <div class="">
                    <h3 class="p-title" id="p-title">{{ $title ?? '-' }}</h3>
                    {{ Breadcrumbs::render() }}
                </div>
                
            </div>
            <div class="container_content">
                @yield('web-content')
            </div>
        </div>
        <div class="modal fade" id="confirmationLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border: 0">
                <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="confirm"><strong>Confirmation</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times text-white"></i></span>
                </button>
                </div>
                <div class="modal-body text-center p-4">
                    Apakah anda yakin ingin keluar ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <a href="/logout" class="btn btn-primary" value="Edit Profile" name="submit">Sign Out</a>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection