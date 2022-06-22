<div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
    @if ($konsistensi != null)
    <div class="my-3">
        <div class="row justify-content-between">
            <div class="col-6">
                <table class="table table-sm table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td>Konsistensi Index (CI)</td>
                            <td>{{$konsistensi['konsistensi_index']}}</td>
                        </tr>
                        <tr>
                            <td>Random Index (RI)</td>
                            <td>{{$konsistensi['random_index']}}</td>
                        </tr>
                        <tr>
                            <td>Konsistensi Index (CR)</td>
                            <td>{{$konsistensi['konsistensi_rasio']}}</td>
                        </tr>
                    </tbody>
                </table>
                <h6>Konsistensi : <span class="{{$konsistensi['konsisten'] == 'KONSISTEN' ? 'text-success' : 'text-danger'}}">{{$konsistensi['konsisten']}}</span></h6>    
            </div>
            <div class="col-6">
                <h6>Tabel Random Indek (RI)</h6>
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>Ukuran Matriks</th>
                            <th>Random Indek (RI)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($RI_tables as $item)
                        <tr>
                            <td>{{$item->ukuran_matriks}}</td>
                            <td>{{$item->random_indek}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
  </div>