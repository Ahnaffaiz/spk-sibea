<div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
    @if ($matriks_conditional != null)
    <div class="my-3">
        <h6>Tabel Kondisional</h6>
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
                    @foreach ($matriks_conditional as $key => $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$matriks_diff->where('id', $key)->first()->getFirstAlternative->getPendaftar->nama}} - {{$matriks_diff->where('id', $key)->first()->getSecondAlternative->getPendaftar->nama}}</td>
                            <td>{{$item['sta']}}</td>
                            <td>{{$item['sti']}}</td>
                            <td>{{$item['spa']}}</td>
                            <td>{{$item['spi']}}</td>
                            <td>{{$item['ska']}}</td>
                            <td>{{$item['ski']}}</td>
                            <td>{{$item['sha']}}</td>
                            <td>{{$item['shi']}}</td>
                            <td>{{$item['sho']}}</td>
                            <td>{{$item['skr']}}</td>
                            <td>{{$item['sjt']}}</td>
                            <td>{{$item['skj']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
  </div>