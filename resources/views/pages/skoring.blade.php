@extends('layouts.backend')
@section('title', 'Skoring')
@section('skoring-active', 'active')
@section('content')
<div class="main-content">
    @livewire('skoring.index', ['user' => $user], key($user->id))    
</div>
@endsection