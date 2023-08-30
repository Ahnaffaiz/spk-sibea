<div class="accordion-body collapse show" id="panel-body-2" data-parent="#accordion">
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
                            <td>{{$item->total}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>