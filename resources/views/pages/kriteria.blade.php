@extends('layouts.backend')
@section('title', 'Kriteria')
@section('kriteria-active', 'active')
@section('content')
<div class="main-content">
    @livewire('kriteria.index', ['user' => $user], key($user->id))    
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