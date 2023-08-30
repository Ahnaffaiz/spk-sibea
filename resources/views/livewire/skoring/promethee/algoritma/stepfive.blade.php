<div class="accordion-body collapse" id="panel-body-5" data-parent="#accordion">
    @if ($matriks_agregate->count() > 0)
    <div class="my-3">
        <h6>Tabel Perhitungan Leaving Flow Entering Flow</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th></th>
                    @foreach ($matriks_outranking as $item)
                        <th>{{$item->getPendaftar->nama}}</th>
                    @endforeach
                        <th>Leaving Flow</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriks_outranking as $item1)
                        <tr>
                            <td>{{$item1->getPendaftar->nama}}</td>
                            @foreach ($matriks_outranking as $item2)
                                @if ($item1 != $item2)
                                    <td>{{$matriks_agregate->where('first_alternatives_id',$item1->id)->where('second_alternatives_id', $item2->id)->first()->agregate_function }}</td>
                                @else
                                    <td>-</td>
                                @endif
                            @endforeach
                            <td>{{$item1->leaving_flow}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Entering Flow</td>
                        @foreach ($matriks_outranking as $item2)
                            <td>{{$item2->entering_flow}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif
    
    
  </div>