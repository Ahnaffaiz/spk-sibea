<div class="card">
    <div class="card-header">
        <h4>Nilai Kriteria</h4>
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
        <button class="btn btn-sm btn-primary text-end m-2" wire:click="$emit('add')">
            <i class="fas fa-plus"></i> Kriteria
        </button>
    </div>
    <div class="card-body">
        @if ($nilaiKriterias->count() > 0)
        <div class="table-responsive">
              <table class="table table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kriteria</th>
                          <th>Awal</th>
                          <th>Akhir</th>
                          <th>Nilai</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($nilaiKriterias as $nilai)
                      <tr>
                          <td>{{ ($nilaiKriterias->currentpage() - 1) * $nilaiKriterias->perpage() + $loop->index + 1 }}</td>
                          <td>{{ucWords($nilai->getKriteria->nama)}}</td>
                          <td>{{ucWords($nilai->nama_awal)}}</td>
                          <td>{{ucWOrds($nilai->nama_akhir)}}</td>
                          <td>{{$nilai->nilai}}</td>
                          <td>
                            <button class="btn btn-primary btn-action" wire:click="$emit('show', {{$nilai->id}})">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn btn-danger btn-action" wire:click="$emit('confirmDelete',{{$nilai->id}})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                      </tr>
                        @endforeach
                      </tbody>
              </table>
              {{$nilaiKriterias->links()}}
          </div>
          @else
            <div class="empty-state" data-height="600">
                <img class="img-fluid" src="{{asset('backend/assets/img/empty.svg')}}" alt="image" style="height: 500px">
                <h2 class="mt-0">Belum ada pendaftar</h2>
            </div>
          @endif
    </div>
</div>