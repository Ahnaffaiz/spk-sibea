<div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header row justify-content-between">
                    <h4>Skoring</h4>
                    <button class="btn btn-primary text-end m-2 {{$pendaftars->count() <= 0 ? 'disabled' : ''}}" wire:click="{{$pendaftars->count() <= 0 ? '' : 'generateAlert'}}" wire:loading.class="disabled btn-progress" wire:target="generate">
                        <i class="fas fa-cogs"></i> Generate
                    </button>
                </div>
                <div class="text-center my-2" wire:loading>
                  <img src="{{asset('backend/assets/img/loading.svg')}}" alt="" style="height: 200px">
                  <h4 class="text-primary">Generating....</h4>
                </div>
                <div class="card-body" wire:loading.attr="hidden">
                    @if ($matriks_ranking->count() > 0)
                    <div id="accordion">
                        <div class="accordion">
                          <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                            <h4>Tahap 1 : Normalisasi Matrik Keputusan </h4>
                          </div>
                          @include('livewire.skoring.promethee.algoritma.stepone')
                        </div>
                        <div class="accordion">
                          <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                            <h4>Tahap 2 : Perbandingan Kriteria</h4>
                          </div>
                          @include('livewire.skoring.promethee.algoritma.steptwo')
                        </div>
                        <div class="accordion">
                          <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                            <h4>Tahap 3 : Menghitung fungsi preferensi</h4>
                          </div>
                          @include('livewire.skoring.promethee.algoritma.stepthree')
                        </div>
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-4">
                              <h4>Tahap 4 : fungsi preferensi agregat dengan mempertimbangkan bobot kriteria </h4>
                            </div>
                            @include('livewire.skoring.promethee.algoritma.stepfour')
                        </div>
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-5">
                              <h4>Tahap 5 : Menghitung Leaving Flow dan Entering Flow</h4>
                            </div>
                            @include('livewire.skoring.promethee.algoritma.stepfive')
                        </div>
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-6">
                              <h4>Tahap 6 : Outranking Flow dan Menentukan Ranking</h4>
                            </div>
                            @include('livewire.skoring.promethee.algoritma.stepsix')
                        </div>
                    </div>
                    @else
                    <div class="empty-state" data-height="600">
                      <img class="img-fluid" src="{{asset('backend/assets/img/empty.svg')}}" alt="image" style="height: 500px">
                      <h2 class="mt-0">Belum ada pendaftar</h2>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
