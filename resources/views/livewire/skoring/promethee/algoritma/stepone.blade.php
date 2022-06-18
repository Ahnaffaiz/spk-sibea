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
                            <td>{{$pendaftar->getsta->nilai}}</td>
                            <td>{{$pendaftar->getsti->nilai}}</td>
                            <td>{{$pendaftar->getspa->nilai}}</td>
                            <td>{{$pendaftar->getspi->nilai}}</td>
                            <td>{{$pendaftar->getska->nilai}}</td>
                            <td>{{$pendaftar->getski->nilai}}</td>
                            <td>{{$pendaftar->getsha->nilai}}</td>
                            <td>{{$pendaftar->getshi->nilai}}</td>
                            <td>{{$pendaftar->getsho->nilai}}</td>
                            <td>{{$pendaftar->getskr->nilai}}</td>
                            <td>{{$pendaftar->getsjt->nilai}}</td>
                            <td>{{$pendaftar->getskj->nilai}}</td>
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
        <h6>Tabel Bobot dan Kriteria</h6>
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
                            <td>{{$item->getDecisionMatrices->sta}}</td>
                            <td>{{$item->getDecisionMatrices->sti}}</td>
                            <td>{{$item->getDecisionMatrices->spa}}</td>
                            <td>{{$item->getDecisionMatrices->spi}}</td>
                            <td>{{$item->getDecisionMatrices->ska}}</td>
                            <td>{{$item->getDecisionMatrices->ski}}</td>
                            <td>{{$item->getDecisionMatrices->sha}}</td>
                            <td>{{$item->getDecisionMatrices->shi}}</td>
                            <td>{{$item->getDecisionMatrices->sho}}</td>
                            <td>{{$item->getDecisionMatrices->skr}}</td>
                            <td>{{$item->getDecisionMatrices->sjt}}</td>
                            <td>{{$item->getDecisionMatrices->skj}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>