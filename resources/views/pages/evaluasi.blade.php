@extends('layouts.backend')
@section('title', 'Evaluasi')
@section('evaluasi-active', 'active')
@section('content')
<div class="main-content">
    @livewire('evaluasi.index', ['user' => $user], key($user->id))    
</div>
@endsection