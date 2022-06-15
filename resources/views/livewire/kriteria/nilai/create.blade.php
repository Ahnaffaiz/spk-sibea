
  <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="nilaiKriteriaModal">
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
                <label for="kriterias_id">Kriteria</label>
                <select class="form-control" wire:model="ref_kriterias_id">
                    <option disabled selected value>Pilih</option>
                    @foreach ($kriterias as $kriteria)
                        <option value="{{$kriteria->id}}">{{$kriteria->nama}}</option>
                    @endforeach
                </select>
                @error('kriteriaId')
                <span class="text-danger error"><small>{{ $message }}</small></span>
                @enderror
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                    <label for="nama_awal">Nama Awal</label>
                    <input type="text" name="nama_awal" wire:model="nama_awal" placeholder="masukkan nama awal kriteria" class="form-control @error('nama_awal') is-invalid @enderror">
                    @error('nama_awal')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                    @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                    <label for="nama_akhir">Nama Akhir</label>
                    <input type="text" name="nama_akhir" wire:model="nama_akhir" placeholder="masukkan nama akhir kriteria" class="form-control @error('nama_akhir') is-invalid @enderror">
                    @error('nama_akhir')
                    <span class="text-danger error"><small>{{ $message }}</small></span>
                    @enderror
                </div>
              </div>
            </div>
            <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="number" name="nilai" wire:model="nilai" placeholder="masukkan nilai kriteria" class="form-control @error('nilai') is-invalid @enderror">
                @error('nilai')
                <span class="text-danger error"><small>{{ $message }}</small></span>
                @enderror
            </div>
      </div>
      <div class="modal-footer br">
        <button type="button" wire:click="store" class="btn btn-primary">Simpan</button>
      </div>
    </div>
</div>
