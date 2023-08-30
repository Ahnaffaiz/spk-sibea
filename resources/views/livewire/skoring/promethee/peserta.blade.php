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
                                <tbody>
                                    @foreach ($pendaftars as $pendaftar)    
                                    <tr>
                                        <td>{{($pendaftars->currentpage() - 1) * $pendaftars->perpage() + $loop->index + 1}}</td>
                                        <td>{{$pendaftar->nama}}</td>
                                        <td>
                                            @if ($pendaftar->getsta != null)
                                            {{ucWords($pendaftar->getsta->nama_awal)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pendaftar->getsti != null)
                                            {{ucWords($pendaftar->getsti->nama_awal)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pendaftar->getspa != null)
                                            {{ucWords($pendaftar->getspa->nama_awal)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pendaftar->getspi != null)
                                            {{ucWords($pendaftar->getspi->nama_awal)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pendaftar->getska != null)
                                            {{ucWords($pendaftar->getska->nama_awal)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pendaftar->getski != null)
                                            {{ucWords($pendaftar->getski->nama_awal)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pendaftar->getsha != null)
                                            {{ucWords($pendaftar->getsha->nama_awal)}} - {{ucWords($pendaftar->getsha->nama_akhir)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pendaftar->getshi != null)
                                            {{ucWords($pendaftar->getshi->nama_awal)}} - {{ucWords($pendaftar->getshi->nama_akhir)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pendaftar->getsho != null)
                                            {{ucWords($pendaftar->getsho->nama_awal)}} - {{ucWords($pendaftar->getsho->nama_akhir)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pendaftar->getskr != null)
                                            {{ucWords($pendaftar->getskr->nama_awal)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pendaftar->getsjt != null)
                                            {{ucWords($pendaftar->getsjt->nama_awal)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pendaftar->getskj != null)
                                            {{ucWords($pendaftar->getskj->nama_awal)}}
                                            @else 
                                            0
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
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
