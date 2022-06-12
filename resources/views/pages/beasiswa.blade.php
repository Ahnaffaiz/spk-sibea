@extends('layouts.backend')
@section('title', 'Beasiswa')
@section('beasiswa-active', 'active')
@section('content')
<div class="main-content">
    @livewire('beasiswa.index', ['user' => $user], key($user->id))    
</div>
@endsection

@push('addon-script')
    <script>
        window.addEventListener('hideCreateModalBeasiswa', event => {
            $("#beasiswaModal").modal('hide');
        })
        window.addEventListener('showCreateModalBeasiswa', event => {
            $("#beasiswaModal").modal('show');
        })
    </script>
@endpush