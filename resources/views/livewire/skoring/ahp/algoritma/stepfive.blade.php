<div class="accordion-body collapse" id="panel-body-5" data-parent="#accordion">
    @if ($matriks_ranking->count() > 0)
    <div class="my-3">
        <h6>Matriks Alternatif</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        @foreach ($ref_kriterias as $kriteria)
                            <th>{{strtoupper($kriteria->kode)}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriks_ranking as $alternative)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$alternative->getPendaftar->nama}}</td>
                        @if ($alternative->getPendaftar->getsta != null)
                            <td>{{$alternative->getPendaftar->getsta->nama_awal}}</td>
                        @else    
                            <td>null</td>
                        @endif
                        @if ($alternative->getPendaftar->getsti != null)
                            <td>{{$alternative->getPendaftar->getsti->nama_awal}}</td>
                        @else    
                            <td>null</td>
                        @endif
                        @if ($alternative->getPendaftar->getspa != null)
                            <td>{{$alternative->getPendaftar->getspa->nama_awal}}</td>
                        @else    
                            <td>null</td>
                        @endif
                        @if ($alternative->getPendaftar->getspi != null)
                            <td>{{$alternative->getPendaftar->getspi->nama_awal}}</td>
                        @else    
                            <td>null</td>
                        @endif
                        @if ($alternative->getPendaftar->getska != null)
                            <td>{{$alternative->getPendaftar->getska->nama_awal}}</td>
                        @else    
                            <td>null</td>
                        @endif
                        @if ($alternative->getPendaftar->getski != null)
                            <td>{{$alternative->getPendaftar->getski->nama_awal}}</td>
                        @else    
                            <td>null</td>
                        @endif
                        @if ($alternative->getPendaftar->getsha != null)
                            <td>{{$alternative->getPendaftar->getsha->nama_awal}} - {{$alternative->getPendaftar->getsha->nama_akhir}}</td>
                        @else    
                            <td>null</td>
                        @endif
                        @if ($alternative->getPendaftar->getshi != null)
                            <td>{{$alternative->getPendaftar->getshi->nama_awal}} - {{$alternative->getPendaftar->getshi->nama_akhir}}</td>
                        @else    
                            <td>null</td>
                        @endif
                        @if ($alternative->getPendaftar->getsho != null)
                            <td>{{$alternative->getPendaftar->getsho->nama_awal}} - {{$alternative->getPendaftar->getsho->nama_akhir}}</td>
                        @else    
                            <td>null</td>
                        @endif
                        @if ($alternative->getPendaftar->getskr != null)
                            <td>{{$alternative->getPendaftar->getskr->nama_awal}}</td>
                        @else    
                            <td>null</td>
                        @endif
                        @if ($alternative->getPendaftar->getsjt != null)
                            <td>{{$alternative->getPendaftar->getsjt->nama_awal}}</td>
                        @else    
                            <td>null</td>
                        @endif
                        @if ($alternative->getPendaftar->getskj != null)
                            <td>{{$alternative->getPendaftar->getskj->nama_awal}}</td>
                        @else    
                            <td>null</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="my-3">
        <h6>Matrik Pembobotan Alternative</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        @foreach ($ref_kriterias as $kriteria)
                            <th>{{strtoupper($kriteria->kode)}}</th>
                        @endforeach
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriks_ranking as $alternative)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$alternative->getPendaftar->nama}}</td>
                        <td>{{$alternative->sta}}</td>
                        <td>{{$alternative->sti}}</td>
                        <td>{{$alternative->spa}}</td>
                        <td>{{$alternative->spi}}</td>
                        <td>{{$alternative->ska}}</td>
                        <td>{{$alternative->ski}}</td>
                        <td>{{$alternative->sha}}</td>
                        <td>{{$alternative->shi}}</td>
                        <td>{{$alternative->sho}}</td>
                        <td>{{$alternative->skr}}</td>
                        <td>{{$alternative->sjt}}</td>
                        <td>{{$alternative->skj}}</td>
                        <td>{{$alternative->total}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="my-3 col-6">
        <h6>Tabel Ranking Hasil Keputusan</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Nama</th>
                        <th>Total</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriks_ranking as $item)
                        <tr>
                            <td>{{$item->ranking}}</td>
                            <td>{{$item->getPendaftar->nama}}</td>
                            <td>{{$item->total}}</td>
                            <td class="text-center">
                                @if ($item->getPendaftar->is_accepted_ahp)
                                    <div class="badge badge-success">diterima</div>
                                @else
                                    <div class="badge badge-danger">ditolak</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    
    
  </div>