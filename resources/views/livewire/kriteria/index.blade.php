<div>
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">Kriteria</div>
            </div>
        </div>

        <div class="section-body">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                    @livewire('kriteria.kriteria.index', ['user' => $user], key($user->id))
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12">
                    @livewire('kriteria.nilai.index', ['user' => $user], key($user->id))    
            </div>
        </div>
        </div>
    </section>
    @livewire('kriteria.nilai.create', ['user' => $user], key($user->id))
</div>
  