@extends('layouts.backend')
@section('title', 'Sibea - Beranda')
@section('beranda-active', 'active')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">Beranda</div>
            </div>
        </div>
    
        <div class="section-body">
            <div class="row">
                @auth    
                <div class="col-12 mb-4">
                    <div class="hero bg-primary text-white">
                      <div class="hero-inner">
                        <h2>Hello, {{ucWords(Auth::user()->name)}}</h2>
                        <p class="lead">Selamat datang di sistem pendukung keputusan beasiswa</p>
                      </div>
                    </div>
                </div>
                @endauth
                @guest
                <div class="col-12 mb-4">
                    <div class="hero bg-primary text-white">
                      <div class="hero-inner">
                        <h2>SIBEA</h2>
                        <p class="lead">Sistem Pendukung Keputusan Penentuan Penerimaan Beasiswa</p>
                        <div class="mt-4">
                          <a href="{{route('login')}}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </div>
                      </div>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </section> 
</div>
@endsection