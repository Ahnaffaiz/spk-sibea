@extends('layouts.backend')
@section('title', 'Pendaftar')
@section('pendaftar-active', 'active')
@section('content')
<div class="main-content">
    @livewire('pendaftar.index', ['user' => $user], key($user->id))    
</div>
@endsection