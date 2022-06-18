<div class="accordion-body collapse" id="panel-body-4" data-parent="#accordion">
    @if ($matriks_bobot_agregate != null)
    <div class="my-3">
        <h6>Bobot dan Agregate Function</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr class="bg-warning">
                        <th colspan="2"></th>              
                        @foreach ($kriterias as $item)
                        <th class="text-white text-center align-middle">
                            {{$item->is_benefit == 1 ? 'benefit' : 'non benefit'}}
                        </th>
                        @endforeach
                        <th rowspan="2" class="text-white text-center align-middle">Agregate</th>
                    </tr>
                    <tr>
                        <th class="text-center align-middle">No</th>
                        <th class="text-center align-middle">Nama</th>
                        @foreach ($kriterias as $kriteria)
                            <th class="text-center align-middle">{{strtoupper($kriteria->kode)}} ({{$bobotKriterias->where('ref_kriterias_id', $kriteria->id)->first()->bobot}})</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriks_bobot_agregate as $key => $item)
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
                            <td>{{$item['agregate']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    
    
  </div>