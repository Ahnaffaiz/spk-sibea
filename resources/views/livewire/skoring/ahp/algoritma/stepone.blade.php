<div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
    <div class="my-3">
        <h6>Matrik Perbandingan Kriteria</h6>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $item1)
                    <tr>
                        <td class="bg-warning text-center text-white">{{strtoupper($item1->kode)}}</td>
                        @foreach ($kriterias as $item2)
                                <td class="text-center {{$item1->id == $item2->id ? 'bg-secondary' : ''}}">{{$matriks_perbandingan_kriterias->where('first_ref_kriterias_id', $item1->id)->where('last_ref_kriterias_id', $item2->id)->first()->bobot}}</td>
                        @endforeach
                    </tr>
                    @endforeach
                    <tr>
                        <td class="bg-warning"></td>
                        @foreach ($kriterias as $item1)
                            <td class="bg-info text-center text-white">{{$total_bobots[$item1->kode]}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>