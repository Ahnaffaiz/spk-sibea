<div>
  <section class="section">
    <div class="section-header">
        <h1>@yield('title')</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">Beasiswa</div>
        </div>
    </div>

    <div class="section-body">
      <div class="row">
          <div class="col">
              <div class="card">
                  <div class="card-header">
                      <h4>Daftar Beasiswa</h4>
                      <div class="card-header-form">
                          <form>
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search">
                              <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                              </div>
                            </div>
                          </form>
                      </div>
                      <button class="btn btn-primary text-end m-2" wire:click="addBeasiswa">
                          <i class="fas fa-pencil-alt"></i> Buat Beasiswa
                      </button>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-hover table-bordered">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>1</td>
                                      <td>Prestasi</td>
                                      <td>
                                          
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </section>
  @include('livewire.beasiswa.create')    
</div>
