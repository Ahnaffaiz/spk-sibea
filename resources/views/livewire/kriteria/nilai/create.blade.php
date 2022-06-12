
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
                <label>Select</label>
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
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" wire:model="nama" placeholder="masukkan nama kriteria" class="form-control @error('nama') is-invalid @enderror">
                @error('nama')
                <span class="text-danger error"><small>{{ $message }}</small></span>
                @enderror
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
