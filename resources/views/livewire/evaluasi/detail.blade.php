<div>
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{route('admin.evaluasi')}}">Pendaftar</a></div>
                <div class="breadcrumb-item active">Detail</div>
            </div>
        </div>
    
        <div class="section-body">
          <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Penerima Beasiswa Aktual</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ranking</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendaftars_actual as $item)
                                            <tr>
                                                <td>{{$item->ranking_actual}}</td>
                                                <td>{{$item->nama}}</td>
                                                <td>
                                                    @if ($item->is_accepted_actual)
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
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Penerima Beasiswa PROMETHEE II</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ranking</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendaftars_promethee as $item)
                                            <tr>
                                                <td>{{$item->ranking_promethee}}</td>
                                                <td>{{$item->nama}}</td>
                                                <td>
                                                    @if ($item->is_accepted_promethee)
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
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Penerima Beasiswa AHP</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendaftars_ahp as $item)
                                            <tr>
                                                <td>{{$item->ranking_ahp}}</td>
                                                <td>{{$item->nama}}</td>
                                                <td>
                                                    @if ($item->is_accepted_ahp)
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
                    </div>
                </div>
          </div>
          @livewire('evaluasi.matriks', ['user' => $user, 'beasiswa'=>$beasiswa], key($user->id))
        </div>
      </section>    
</div>
