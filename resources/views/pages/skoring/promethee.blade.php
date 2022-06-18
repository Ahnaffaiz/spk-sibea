@extends('layouts.backend')
@section('title', 'Metode Promethee ' . ucWords($beasiswa->nama))
@section('skoring-active', 'active')
@section('content')
<div class="main-content">
    @livewire('skoring.promethee.index', ['user' => $user, 'beasiswa' => $beasiswa], key($user->id))    
</div>
@endsection