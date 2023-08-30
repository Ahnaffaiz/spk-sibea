<div>
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">Kriteria Ahp</div>
            </div>
        </div>

        <div class="section-body">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h4>Daftar Kriteria Beasiswa</h4>
                        <button wire:click="generatePrioritas" class="btn btn-primary text-end m-2" wire:target="generatePrioritas" wire:loading.class="disabled btn-progress">
                            <i class="fas fa-cogs"></i> Generate
                        </button>
                    </div>
                    <div class="card-body">
                        @if ($ahp_nilai_kriterias->count() > 0)
                        <div class="row">
                            @foreach ($ref_kriterias as $item)
                            <div class="my-2 col-6 col-sm-12 col-md-6 col-lg-6">
                                <h6>Daftar Kriteria {{ucWords($item->nama)}} ({{strtoupper($item->kode)}})</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>Prioritas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ahp_nilai_kriterias->whereIn('ref_nilai_kriterias_id', $ref_nilai_kriterias->where('ref_kriterias_id', $item->id)->pluck('id')->toArray()) as $nilai)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    @if ($item->kode == 'sho' || $item->kode == 'sha' || $item->kode == 'shi' || $item->kode == 'skj')
                                                    <td>{{$ref_nilai_kriterias->where('id', $nilai->ref_nilai_kriterias_id)->first()->nama_awal .'-'. $ref_nilai_kriterias->where('id', $nilai->ref_nilai_kriterias_id)->first()->nama_akhir}}</td>    
                                                    @else
                                                    <td>{{$ref_nilai_kriterias->where('id', $nilai->ref_nilai_kriterias_id)->first()->nama_awal}}</td>
                                                    @endif
                                                    <td>{{$nilai->prioritas}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="card-body">
                            <div class="empty-state" data-height="600">
                                <img class="img-fluid" src="{{asset('backend/assets/img/empty.svg')}}" alt="image" style="height: 500px">
                                <h2 class="mt-0">Data Kriteria Tidak ditemukan</h2>
                                <p class="lead">
                                    Silahkan Generate data kriteria
                                </p>
                                <button wire:click="generatePrioritas" class="btn btn-primary mt-4" wire:target="generatePrioritas" wire:loading.class="disabled btn-progress">
                                    <i class="fas fa-cogs"></i> Generate
                                </button>
                            </div>
                          </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>
  