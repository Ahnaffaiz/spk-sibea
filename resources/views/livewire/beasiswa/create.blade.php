<div>
  <section class="section">
    <div class="section-header">
        <h1>@yield('title')</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{route('admin.beasiswa')}}">Beasiswa</a></div>
            <div class="breadcrumb-item active">Create</div>
        </div>
    </div>

    <div class="section-body">
      <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h4>Buat Beasiswa</h4>
              </div>
              <div class="card-body">
                <div class="row mt-4">
                  <div class="col-12 col-lg-12">
                    <div class="wizard-steps">
                      <div class="wizard-step {{$step==1 ? 'wizard-step-active' : ''}}">
                        <div class="wizard-step-icon">
                          <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="wizard-step-label">
                          Detail Beasiswa
                        </div>
                      </div>
                      <div class="wizard-step {{$step==2 ? 'wizard-step-active' : ''}}">
                        <div class="wizard-step-icon">
                          <i class="fas fa-dumbbell"></i>
                        </div>
                        <div class="wizard-step-label">
                          Bobot Promethee
                        </div>
                      </div>
                      <div class="wizard-step {{$step==3 ? 'wizard-step-active' : ''}}">
                        <div class="wizard-step-icon">
                          <i class="fas fa-balance-scale"></i>
                        </div>
                        <div class="wizard-step-label">
                          Bobot AHP
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @if ($step==1)
                  @livewire('beasiswa.create-beasiswa', ['user' => $user, 'beasiswas_id'=>$beasiswas_id], key($user->id . 'beasiswa'))
                @elseif ($step==2)
                  @livewire('beasiswa.create-promethee', ['user' => $user, 'beasiswas_id'=>$beasiswas_id], key($user->id . 'promethee'))
                @elseif($step==3)
                  @livewire('beasiswa.create-ahp', ['user' => $user, 'beasiswas_id'=>$beasiswas_id], key($user->id . 'ahp'))
                @endif
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>
  