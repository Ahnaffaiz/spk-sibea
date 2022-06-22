@extends('layouts.backend')
@section('title', 'Kriteria Promethee')
@section('kriteria-active', 'active')
@section('kriteria-promethee-active', 'active')
@section('content')
<div class="main-content">
    @livewire('kriteria.promethee.index', ['user' => $user], key($user->id))    
</div>
@endsection

@push('addon-script')
    <script>
        window.addEventListener('hideCreateModalNilaiKriteria', event => {
            $("#nilaiKriteriaModal").modal('hide');
        })
        window.addEventListener('showCreateModalNilaiKriteria', event => {
            $("#nilaiKriteriaModal").modal('show');
        })
    </script>
@endpush