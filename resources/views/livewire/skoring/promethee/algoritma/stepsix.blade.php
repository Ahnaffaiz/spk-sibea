<div class="accordion-body collapse" id="panel-body-6" data-parent="#accordion">
    @if ($matriks_outranking->count() > 0)
    <div class="my-3">
        <h6>Tabel Outranking Flow</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Leaving Flow</th>
                        <th>Entering Flow</th>
                        <th>Outranking Flow</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriks_outranking as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->getPendaftar->nama}}</td>
                            <td>{{$item->leaving_flow}}</td>
                            <td>{{$item->entering_flow}}</td>
                            <td>{{$item->outranking_flow}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    @if ($matriks_ranking->count() > 0)
    <div class="my-3">
        <h6>Tabel Ranking Hasil Keputusan</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriks_ranking as $item)
                        <tr>
                            <td>{{$item->ranking}}</td>
                            <td>{{$item->getPendaftar->nama}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    
    
  </div>