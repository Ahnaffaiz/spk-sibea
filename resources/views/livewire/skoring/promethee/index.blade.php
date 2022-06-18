<div>
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{route('admin.skoring')}}">Skoring</a></div>
                <div class="breadcrumb-item active">Promethee</div>
            </div>
        </div>
    
        <div class="section-body">
            @livewire('skoring.promethee.peserta', ['user' => $user, 'beasiswa'=>$beasiswa], key($user->id . 'peserta'))
            @livewire('skoring.promethee.skoring', ['user' => $user, 'beasiswa'=>$beasiswa], key($user->id . 'skoring'))
        </div>
      </section>
</div>
