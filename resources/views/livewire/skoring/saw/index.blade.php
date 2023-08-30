<div>
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{route('admin.skoring')}}">Skoring</a></div>
                <div class="breadcrumb-item active">SAW</div>
            </div>
        </div>
    
        <div class="section-body">
            @livewire('skoring.saw.peserta', ['user' => $user, 'beasiswa'=>$beasiswa], key($user->id . 'peserta'))
            @livewire('skoring.saw.skoring', ['user' => $user, 'beasiswa'=>$beasiswa], key($user->id . 'skoring'))
        </div>
      </section>
</div>
