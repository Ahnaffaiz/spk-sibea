<div>
    <section class="section">
      <div class="section-header">
          <h1>@yield('title')</h1>
          <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="{{route('admin.pendaftar')}}">Pendaftar</a></div>
              <div class="breadcrumb-item active">Import</div>
          </div>
      </div>
  
      <div class="section-body">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Import Pendaftar {{ucWords($beasiswa->nama)}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('data') is-invalid @enderror" id="customFile" wire:model="data" value="data">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @if($data)
                                    <span class="text-success"><small>File terpilih</small></span>
                                @endif
                                @error('data')
                                    <span class="text-danger error"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <select class="custom-select @error('is_update') is-invalid @enderror" wire:model="is_update">
                                    <option >--PILIH--</option>
                                    <option value="false">INSERT</option>
                                    <option value="true">UPDATE</option>
                                </select>
                                @error('is_update')
                                    <span class="text-danger error"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary  {{ $loading ? 'disabled btn-progress' : ''  }} " wire:click="confirmImport">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                      <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Jumlah Pendaftar</h4>
                      </div>
                      <div class="card-body">
                        <h2>{{$jmlPendaftar->count()}}</h2>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Pendaftar Beasiswa</h4>
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
                        <button class="btn btn-primary text-end m-2" wire:click="confirmDeleteAll()">
                            <i class="fas fa-trash"></i> Pendaftar
                        </button>
                    </div>
                    <div class="text-center my-2" wire:loading>
                        <img src="{{asset('backend/assets/img/loading.svg')}}" alt="" style="height: 200px">
                        <h4 class="text-primary">Importing....</h4>
                    </div>
                    <div class="card-body" wire:loading.attr="hidden">
                        <div class="table-responsive">
                            @if ($pendaftars->count() > 0)
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>sta</th>
                                        <th>sti</th>
                                        <th>spa</th>
                                        <th>spi</th>
                                        <th>ska</th>
                                        <th>ski</th>
                                        <th>sha</th>
                                        <th>shi</th>
                                        <th>sho</th>
                                        <th>skr</th>
                                        <th>sjt</th>
                                        <th>skj</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendaftars as $pendaftar)    
                                    <tr>
                                        <td>{{($pendaftars->currentpage() - 1) * $pendaftars->perpage() + $loop->index + 1}}</td>
                                        <td>{{$pendaftar->nama}}</td>
                                        <td>{{ucWords($pendaftar->getsta->nama_awal)}}</td>
                                        <td>{{ucWords($pendaftar->getsti->nama_awal)}}</td>
                                        <td>{{ucWords($pendaftar->getspa->nama_awal)}}</td>
                                        <td>{{ucWords($pendaftar->getspi->nama_awal)}}</td>
                                        <td>{{ucWords($pendaftar->getska->nama_awal)}}</td>
                                        <td>{{ucWords($pendaftar->getski->nama_awal)}}</td>
                                        <td>{{ucWords($pendaftar->getsha->nama_awal)}} - {{ucWords($pendaftar->getsha->nama_akhir)}}</td>
                                        <td>{{ucWords($pendaftar->getshi->nama_awal)}} - {{ucWords($pendaftar->getshi->nama_akhir)}}</td>
                                        <td>{{ucWords($pendaftar->getsho->nama_awal)}} - {{ucWords($pendaftar->getsho->nama_akhir)}}</td>
                                        <td>{{ucWords($pendaftar->getskr->nama_awal)}}</td>
                                        <td>{{ucWords($pendaftar->getsjt->nama_awal)}}</td>
                                        <td>{{ucWords($pendaftar->getskj->nama_awal)}}</td>
                                        <td>
                                            <button class="btn btn-primary" wire:click="show({{$pendaftar->id}})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <button class="btn btn-danger" wire:click="confirmDelete({{$pendaftar->id}})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$pendaftars->links()}}
                            @else
                            <div class="empty-state" data-height="600">
                                <img class="img-fluid" src="{{asset('backend/assets/img/empty.svg')}}" alt="image" style="height: 500px">
                                <h2 class="mt-0">Belum ada pendaftar</h2>
                            </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
  