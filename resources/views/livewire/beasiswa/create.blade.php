
  <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="beasiswaModal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Buat Beasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" wire:model="nama" placeholder="masukkan nama beasiswa" class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
          <div class="bobot">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="bobot.sr1">Status Rumah</label>
                  <input type="number" name="bobot.sr1" wire:model="bobot.sr1" class="form-control @error('bobot.sr1') is-invalid @enderror">
                  @error('bobot.sr1')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="bobot.t01">Tanggungan</label>
                  <input type="number" name="bobot.t01" wire:model="bobot.t01" class="form-control @error('bobot.t01') is-invalid @enderror">
                  @error('bobot.t01')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="bobot.p01">Penghasilan</label>
                  <input type="number" name="bobot.p01" wire:model="bobot.p01" class="form-control @error('bobot.p01') is-invalid @enderror">
                  @error('bobot.p01')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="bobot.sj1">Skor Jiwa</label>
                  <input type="number" name="bobot.sj1" wire:model="bobot.sj1" class="form-control @error('bobot.sj1') is-invalid @enderror">
                  @error('bobot.sj1')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="bobot.sta">Status Ayah</label>
                  <input type="number" name="bobot.sta" wire:model="bobot.sta" class="form-control @error('bobot.sta') is-invalid @enderror">
                  @error('bobot.sta')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="bobot.spa">Pendidikan Ayah</label>
                  <input type="number" name="bobot.spa" wire:model="bobot.spa" class="form-control @error('bobot.spa') is-invalid @enderror">
                  @error('bobot.spa')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="bobot.ska">Pekerjaan Ayah</label>
                  <input type="number" name="bobot.ska" wire:model="bobot.ska" class="form-control @error('bobot.ska') is-invalid @enderror">
                  @error('bobot.ska')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="bobot.pa1">Penghasilan Ayah</label>
                  <input type="number" name="bobot.pa1" wire:model="bobot.pa1" class="form-control @error('bobot.pa1') is-invalid @enderror">
                  @error('bobot.pa1')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="bobot.sti">Status Ibu</label>
                  <input type="number" name="bobot.sti" wire:model="bobot.sti" class="form-control @error('bobot.sti') is-invalid @enderror">
                  @error('bobot.sti')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="bobot.spi">Pendidikan Ibu</label>
                  <input type="number" name="bobot.spi" wire:model="bobot.spi" class="form-control @error('bobot.spi') is-invalid @enderror">
                  @error('bobot.spi')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="sbobot.ki">Pekerjaan Ibu</label>
                  <input type="number" name="bobot.ski" wire:model="bobot.ski" class="form-control @error('bobot.ski') is-invalid @enderror">
                  @error('bobot.ski')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="bobot.pi1">Penghasilan Ibu</label>
                  <input type="number" name="bobot.pi1" wire:model="bobot.pi1" class="form-control @error('bobot.pi1') is-invalid @enderror">
                  @error('bobot.pi1')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <h6>Total : {{$total}}</h6>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer br">
        <button type="button" wire:click="store" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
