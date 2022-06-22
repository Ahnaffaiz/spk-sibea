@extends('layouts.backend')
@section('title', 'Kriteria Ahp')
@section('kriteria-active', 'active')
@section('kriteria-ahp-active', 'active')
@section('content')
<div class="main-content">
    @livewire('kriteria.ahp.index', ['user' => $user], key($user->id))
</div>
@endsection