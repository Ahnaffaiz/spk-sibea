@extends('layouts.backend')
@section('title', 'Import Pendaftar ' . ucWords($beasiswa->nama))
@section('pendaftar-active', 'active')
@section('content')
<div class="main-content">
    @livewire('pendaftar.import', ['user' => $user, 'beasiswa' => $beasiswa], key($user->id))    
</div>
@endsection

@push('addon-script')
    <script src="{{asset('backend/assets/js/page/bs-custom-file-input.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
    </script>
@endpush