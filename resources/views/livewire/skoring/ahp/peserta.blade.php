<div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4>Data Pendaftar</h4>
                    <button class="btn btn-primary text-end m-2" data-toggle="collapse" data-target="#collapsePendaftar" aria-expanded="false" aria-controls="collapsePendaftar">
                        <i class="fas fa-eye"></i> Pendaftar
                    </button>
                </div>
                <div class="card-body collapse" id="collapsePendaftar">
                    <div class="table-responsive">
                        @if ($pendaftars->count() > 0)
                        <table class="table table-sm table-hover table-bordered">
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$pendaftars->links()}}
                        @else
                        <h6 class="text-danger">*Belum ada data pendaftar</h6>    
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
