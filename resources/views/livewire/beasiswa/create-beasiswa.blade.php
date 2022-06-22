<div class="wizard-content mt-2">
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" wire:model="nama" placeholder="masukkan nama beasiswa" class="form-control @error('nama') is-invalid @enderror">
        @error('nama')
          <span class="text-danger error"><small>{{ $message }}</small></span>
        @enderror
      </div>
      <div class="form-group">
        <label for="kuota">Kuota</label>
        <input type="number" name="kuota" wire:model="kuota" placeholder="masukkan kuota beasiswa" class="form-control @error('kuota') is-invalid @enderror">
        @error('kuota')
          <span class="text-danger error"><small>{{ $message }}</small></span>
        @enderror
      </div>
      <div class="form-group row justify-content-between">
        <div class="col">
          <a href="{{route('admin.beasiswa')}}" class="btn btn-icon icon-right btn-primary" wire:click="store"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col text-right">
          <button class="btn btn-icon icon-right btn-primary" wire:click="store">Selanjutnya <i class="fas fa-arrow-right"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>
