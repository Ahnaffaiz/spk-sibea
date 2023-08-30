@extends('layouts.backend')
@section('title', 'Evaluasi')
@section('evaluasi-active', 'active')
@section('content')
<div class="main-content">
    @livewire('evaluasi.detail', ['user' => $user, 'beasiswa' => $beasiswa], key($user->id))    
</div>
@endsection