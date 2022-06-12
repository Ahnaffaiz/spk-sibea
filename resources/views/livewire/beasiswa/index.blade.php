<div>
  <section class="section">
    <div class="section-header">
        <h1>@yield('title')</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">Beasiswa</div>
        </div>
    </div>

    <div class="section-body">
      <div class="row">
          <div class="col">
              <div class="card">
                  <div class="card-header">
                      <h4>Daftar Beasiswa</h4>
                      <div class="card-header-form">
                          <form>
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search" wire:model="search">
                              <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                              </div>
                            </div>
                          </form>
                      </div>
                      <button class="btn btn-primary text-end m-2" wire:click="$emit('add')">
                        <i class="fas fa-plus"></i> Beasiswa
                      </button>
                  </div>
                  <div class="card-body">
                      @if ($beasiswas->count() > 0)
                      <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($beasiswas as $beasiswa)
                                    <tr>
                                        <td>{{ ($beasiswas->currentpage() - 1) * $beasiswas->perpage() + $loop->index + 1 }}</td>
                                        <td>{{$beasiswa->nama}}</td>
                                        <td>
                                            <button class="btn btn-primary btn-action" wire:click="$emit('show', {{$beasiswa->id}})">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-danger btn-action" wire:click="$emit('confirmDelete',{{$beasiswa->id}})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            {{$beasiswas->links()}}
                        </div>
                        @else
                            <h6 class="text-danger">*Belum ada beasiswa</h6>
                        @endif
                  </div>
              </div>
          </div>
      </div>
    </div>
  </section>
  @livewire('beasiswa.create', ['user' => $user], key($user->id))    
</div>