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
                      <a href="{{route('admin.beasiswa-create')}}" class="btn btn-primary text-end m-2">
                        <i class="fas fa-plus"></i> Beasiswa
                      </a>
                  </div>
                  <div class="card-body">
                      @if ($beasiswas->count() > 0)
                      <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($beasiswas as $beasiswa)
                                    <tr>
                                        <td>{{ ($beasiswas->currentpage() - 1) * $beasiswas->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ucWords($beasiswa->nama)}}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.beasiswa-update', $beasiswa->id)}}" class="btn btn-primary btn-action">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button class="btn btn-danger btn-action" wire:click="confirmDelete({{$beasiswa->id}})">
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
                        <div class="empty-state" data-height="600">
                            <img class="img-fluid" src="{{asset('backend/assets/img/empty.svg')}}" alt="image" style="height: 500px">
                            <h2 class="mt-0">Belum ada beasiswa</h2>
                        </div>
                        @endif
                  </div>
              </div>
          </div>
      </div>
    </div>
  </section> 
</div>
