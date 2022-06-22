@extends('layouts.backend')
@section('title', 'Beasiswa')
@section('beasiswa-active', 'active')
@section('content')
<div class="main-content">
    @if (isset($beasiswa))
        @livewire('beasiswa.create', ['user' => $user, 'beasiswas_id'=>$beasiswa->id], key($user->id))    
    @else
        @livewire('beasiswa.create', ['user' => $user], key($user->id))    
    @endif
</div>
@endsection