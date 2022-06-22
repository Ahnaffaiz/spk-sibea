<div class="card">
    <div class="card-header">
        <h4>Kriteria</h4>
        <div class="card-header-form">
            <form>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" wire:model="search">
                <div class="input-group-btn">
                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        @if ($kriterias->count() > 0)
        <div class="table-responsive">
              <table class="table table-hover table-bordered">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($kriterias as $kriteria)
                      <tr>
                          <td>{{ ($kriterias->currentpage() - 1) * $kriterias->perpage() + $loop->index + 1 }}</td>
                          <td>{{ucWords($kriteria->nama)}}</td>
                          @endforeach
                      </tbody>
              </table>
              {{$kriterias->links()}}
          </div>
          @else
            <div class="empty-state" data-height="600">
                <img class="img-fluid" src="{{asset('backend/assets/img/empty.svg')}}" alt="image" style="height: 500px">
                <h2 class="mt-0">Belum ada pendaftar</h2>
            </div>
          @endif
    </div>
</div>