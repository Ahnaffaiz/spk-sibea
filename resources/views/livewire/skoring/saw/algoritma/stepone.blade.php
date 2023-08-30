<div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
    <div class="my-3">
        <h6>Tabel Bobot dan Kriteria</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr class="bg-warning">
                        <th colspan="2"></th>              
                        @foreach ($kriterias as $item)
                        <th class="text-white">
                            {{$item->is_benefit == 1 ? 'benefit' : 'non benefit'}}
                        </th>
                        @endforeach
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{strtoupper($kriteria->kode)}} ({{$bobotKriterias->where('ref_kriterias_id', $kriteria->id)->first()->bobot}})</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftars as $pendaftar)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$pendaftar->nama}}</td>
                            <td>{{($pendaftar->getsta != null)? $pendaftar->getsta->nilai : 0}}</td>
                            <td>{{($pendaftar->getsti != null)? $pendaftar->getsti->nilai : 0}}</td>
                            <td>{{($pendaftar->getspa != null)? $pendaftar->getspa->nilai : 0}}</td>
                            <td>{{($pendaftar->getspi != null)? $pendaftar->getspi->nilai : 0}}</td>
                            <td>{{($pendaftar->getska != null)? $pendaftar->getska->nilai : 0}}</td>
                            <td>{{($pendaftar->getski != null)? $pendaftar->getski->nilai : 0}}</td>
                            <td>{{($pendaftar->getsha != null)? $pendaftar->getsha->nilai : 0}}</td>
                            <td>{{($pendaftar->getshi != null)? $pendaftar->getshi->nilai : 0}}</td>
                            <td>{{($pendaftar->getsho != null)? $pendaftar->getsho->nilai : 0}}</td>
                            <td>{{($pendaftar->getskr != null)? $pendaftar->getskr->nilai : 0}}</td>
                            <td>{{($pendaftar->getsjt != null)? $pendaftar->getsjt->nilai : 0}}</td>
                            <td>{{($pendaftar->getskj != null)? $pendaftar->getskj->nilai : 0}}</td>
                        </tr>
                    @endforeach
                        <tr class="bg-info text-white">
                            <td colspan="2">Nilai Maksimal</td>
                            <td>{{$pendaftars->max('getsta.nilai')}}</td>
                            <td>{{$pendaftars->max('getsti.nilai')}}</td>
                            <td>{{$pendaftars->max('getspa.nilai')}}</td>
                            <td>{{$pendaftars->max('getspi.nilai')}}</td>
                            <td>{{$pendaftars->max('getska.nilai')}}</td>
                            <td>{{$pendaftars->max('getski.nilai')}}</td>
                            <td>{{$pendaftars->max('getsha.nilai')}}</td>
                            <td>{{$pendaftars->max('getshi.nilai')}}</td>
                            <td>{{$pendaftars->max('getsho.nilai')}}</td>
                            <td>{{$pendaftars->max('getskr.nilai')}}</td>
                            <td>{{$pendaftars->max('getsjt.nilai')}}</td>
                            <td>{{$pendaftars->max('getskj.nilai')}}</td>
                        </tr>
                        <tr class="bg-info text-white">
                            <td colspan="2">Nilai Minimal</td>
                            <td>{{$pendaftars->min('getsta.nilai')}}</td>
                            <td>{{$pendaftars->min('getsti.nilai')}}</td>
                            <td>{{$pendaftars->min('getspa.nilai')}}</td>
                            <td>{{$pendaftars->min('getspi.nilai')}}</td>
                            <td>{{$pendaftars->min('getska.nilai')}}</td>
                            <td>{{$pendaftars->min('getski.nilai')}}</td>
                            <td>{{$pendaftars->min('getsha.nilai')}}</td>
                            <td>{{$pendaftars->min('getshi.nilai')}}</td>
                            <td>{{$pendaftars->min('getsho.nilai')}}</td>
                            <td>{{$pendaftars->min('getskr.nilai')}}</td>
                            <td>{{$pendaftars->min('getsjt.nilai')}}</td>
                            <td>{{$pendaftars->min('getskj.nilai')}}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    @if ($matriks_normalisasi->count() > 0)
    <div class="my-3">
        <h6>Tabel Bobot dan Kriteria yang Dinormalisasi</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        @foreach ($kriterias as $kriteria)
                        <th>{{strtoupper($kriteria->kode)}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriks_normalisasi as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->getPendaftar->nama}}</td>
                            <td>{{$item->getNormalizedMatrices->sta}}</td>
                            <td>{{$item->getNormalizedMatrices->sti}}</td>
                            <td>{{$item->getNormalizedMatrices->spa}}</td>
                            <td>{{$item->getNormalizedMatrices->spi}}</td>
                            <td>{{$item->getNormalizedMatrices->ska}}</td>
                            <td>{{$item->getNormalizedMatrices->ski}}</td>
                            <td>{{$item->getNormalizedMatrices->sha}}</td>
                            <td>{{$item->getNormalizedMatrices->shi}}</td>
                            <td>{{$item->getNormalizedMatrices->sho}}</td>
                            <td>{{$item->getNormalizedMatrices->skr}}</td>
                            <td>{{$item->getNormalizedMatrices->sjt}}</td>
                            <td>{{$item->getNormalizedMatrices->skj}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>