<div class="wizard-content mt-2">
    <div class="bobot">
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="bobot.sta">Status Tinggal Ayah (STA)</label>
            <input type="number" name="bobot.sta" wire:model="bobot.sta" class="form-control @error('bobot.sta') is-invalid @enderror">
            @error('bobot.sta')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="bobot.sti">Status Tinggal Ibu (STI)</label>
            <input type="number" name="bobot.sti" wire:model="bobot.sti" class="form-control @error('bobot.sti') is-invalid @enderror">
            @error('bobot.sti')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="bobot.spa">Pendidikan Ayah (SPA)</label>
            <input type="number" name="bobot.spa" wire:model="bobot.spa" class="form-control @error('bobot.spa') is-invalid @enderror">
            @error('bobot.spa')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="bobot.spi">Pendidikan Ibu (SPI)</label>
            <input type="number" name="bobot.spi" wire:model="bobot.spi" class="form-control @error('bobot.spi') is-invalid @enderror">
            @error('bobot.spi')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="bobot.ska">Pekerjaan Ayah (SKA)</label>
            <input type="number" name="bobot.ska" wire:model="bobot.ska" class="form-control @error('bobot.ska') is-invalid @enderror">
            @error('bobot.ska')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="bobot.ski">Pekerjaan Ibu (SKI)</label>
            <input type="number" name="bobot.ski" wire:model="bobot.ski" class="form-control @error('bobot.ski') is-invalid @enderror">
            @error('bobot.ski')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="bobot.sha">Penghasilan Ayah (SHA)</label>
            <input type="number" name="bobot.sha" wire:model="bobot.sha" class="form-control @error('bobot.sha') is-invalid @enderror">
            @error('bobot.sha')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="bobot.shi">Penghasilan Ibu (SHI)</label>
            <input type="number" name="bobot.shi" wire:model="bobot.shi" class="form-control @error('bobot.shi') is-invalid @enderror">
            @error('bobot.shi')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
        </div>  
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="bobot.sho">Penghasilan Orang Tua (SHO)</label>
            <input type="number" name="bobot.sho" wire:model="bobot.sho" class="form-control @error('bobot.sho') is-invalid @enderror">
            @error('bobot.sho')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="bobot.skr">Status Rumah (SKR)</label>
            <input type="number" name="bobot.skr" wire:model="bobot.skr" class="form-control @error('bobot.skr') is-invalid @enderror">
            @error('bobot.skr')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="bobot.sjt">Jumlah Tanggungan (SJT)</label>
            <input type="number" name="bobot.sjt" wire:model="bobot.sjt" class="form-control @error('bobot.sjt') is-invalid @enderror">
            @error('bobot.sjt')
              <span class="text-danger error"><small>{{ $message }}</small></span>
            @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="bobot.skj">Skor Jiwa (SKJ)</label>
            <input type="number" name="bobot.skj" wire:model="bobot.skj" class="form-control @error('bobot.skj') is-invalid @enderror">
            @error('bobot.skj')
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
    <div class="row justify-content-between">
      <div class="col text-left">
        <button wire:click="$emit('backToBeasiswa')" class="btn btn-icon icon-right btn-primary"><i class="fas fa-arrow-left"></i> Kembali</button>
      </div>
      <div class="col text-right">
        <button wire:click="store" class="btn btn-icon icon-right btn-primary">Selanjutnya <i class="fas fa-arrow-right"></i></button>
      </div>
    </div>
</div>