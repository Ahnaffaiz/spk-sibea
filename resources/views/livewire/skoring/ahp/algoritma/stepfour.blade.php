<div class="accordion-body collapse" id="panel-body-4" data-parent="#accordion">
    @if ($nilai_prioritas_kriterias->count() > 0)
    <div class="my-3">
        <h6>Matrik Prioritas Kriteria</h6>
            <div class="row">
                @foreach ($ref_kriterias as $item)
                <div class="my-2 col-6">
                    <h6>Daftar Kriteria {{ucWords($item->nama)}} ({{strtoupper($item->kode)}})</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Prioritas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilai_prioritas_kriterias->whereIn('ref_nilai_kriterias_id', $ref_nilai_kriterias->where('ref_kriterias_id', $item->id)->pluck('id')->toArray()) as $nilai)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        @if ($item->kode == 'sho' || $item->kode == 'sha' || $item->kode == 'shi' || $item->kode == 'skj')
                                        <td>{{$ref_nilai_kriterias->where('id', $nilai->ref_nilai_kriterias_id)->first()->nama_awal .'-'. $ref_nilai_kriterias->where('id', $nilai->ref_nilai_kriterias_id)->first()->nama_akhir}}</td>    
                                        @else
                                        <td>{{$ref_nilai_kriterias->where('id', $nilai->ref_nilai_kriterias_id)->first()->nama_awal}}</td>
                                        @endif
                                        <td>{{$nilai->prioritas}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
  </div>