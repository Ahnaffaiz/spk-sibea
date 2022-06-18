@extends('layouts.backend')
@section('title', 'Metode AHP ' . ucWords($beasiswa->nama))
@section('skoring-active', 'active')
@section('content')
<div class="main-content">
    @livewire('skoring.ahp.index', ['user' => $user, 'beasiswa' => $beasiswa], key($user->id))    
</div>
@endsection