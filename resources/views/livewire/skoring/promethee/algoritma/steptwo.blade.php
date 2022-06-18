<div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
    @if ($matriks_diff->count() > 0)
    <div class="my-3">
        <h6>Tabel Perbandingan Alternatif</h6>
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
                    @foreach ($matriks_diff as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->getFirstAlternative->getPendaftar->nama}} - {{$item->getSecondAlternative->getPendaftar->nama}}</td>
                            <td>{{$item->sta}}</td>
                            <td>{{$item->sti}}</td>
                            <td>{{$item->spa}}</td>
                            <td>{{$item->spi}}</td>
                            <td>{{$item->ska}}</td>
                            <td>{{$item->ski}}</td>
                            <td>{{$item->sha}}</td>
                            <td>{{$item->shi}}</td>
                            <td>{{$item->sho}}</td>
                            <td>{{$item->skr}}</td>
                            <td>{{$item->sjt}}</td>
                            <td>{{$item->skj}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
  </div>