<div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
    @if ($matriks_ranking->count() > 0)
    <div class="my-3">
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
                                @if ($item->getPendaftar->is_accepted_actual)
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