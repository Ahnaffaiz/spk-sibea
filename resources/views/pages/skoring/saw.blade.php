@extends('layouts.backend')
@section('title', 'Metode SAW ' . ucWords($beasiswa->nama))
@section('skoring-active', 'active')
@section('content')
<div class="main-content">
    @livewire('skoring.saw.index', ['user' => $user, 'beasiswa' => $beasiswa], key($user->id))    
</div>
@endsection