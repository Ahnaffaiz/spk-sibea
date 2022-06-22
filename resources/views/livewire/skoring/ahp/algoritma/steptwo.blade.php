<div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
    @if ($matriks_nilai_kriterias->count() > 0)
    <div class="my-3">
        <h6>Tabel Normalisasi Nilai Kriteria</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr class="bg-warning">
                        <th></th>              
                        @foreach ($kriterias as $item)
                        <th class="text-white text-center">
                            {{strtoupper($item->kode)}}
                        </th>
                        @endforeach
                        <th class="text-white text-center">Jumlah</th>
                        <th class="text-white text-center">Prioritas</th>
                        <th class="text-white text-center">Eigen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $item1)
                    <tr>
                        <td class="bg-warning text-center text-white">{{strtoupper($item1->kode)}}</td>
                        @foreach ($kriterias as $item2)
                            <td class="text-center {{$item1->id == $item2->id ? 'bg-secondary' : ''}}">{{$matriks_nilai_kriterias->where('first_ref_kriterias_id', $item1->id)->where('last_ref_kriterias_id', $item2->id)->first()->nilai}}</td>
                        @endforeach
                            <td class="text-center">{{$jumlah_kriterias->where('ref_kriterias_id', $item1->id)->first()->jumlah}}</td>
                            <td class="text-center">{{$jumlah_kriterias->where('ref_kriterias_id', $item1->id)->first()->prioritas}}</td>
                            <td class="text-center">{{$jumlah_kriterias->where('ref_kriterias_id', $item1->id)->first()->eigen}}</td>
                    </tr>
                    @endforeach
                    <tr class="bg-info text-white">
                        <td colspan="{{$kriterias->count() + 1}}" class="text-center">Jumlah</td>
                        <td class="text-center">{{$kriterias->count()}}</td>
                        <td class="text-center">{{$jumlah_kriterias->sum('prioritas')}}</td>
                        <td class="text-center">{{$jumlah_kriterias->sum('eigen')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif
  </div>