
  <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="beasiswaModal">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Buat Beasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row mt-4">
            <div class="col-12 col-lg-8 offset-lg-2">
              <div class="wizard-steps">
                <div class="wizard-step wizard-step-active">
                  <div class="wizard-step-icon">
                    <i class="fas fa-graduation-cap"></i>
                  </div>
                  <div class="wizard-step-label">
                    Detail Beassiswa
                  </div>
                </div>
                <div class="wizard-step">
                  <div class="wizard-step-icon">
                    <i class="fas fa-box-open"></i>
                  </div>
                  <div class="wizard-step-label">
                    Create an App
                  </div>
                </div>
                <div class="wizard-step">
                  <div class="wizard-step-icon">
                    <i class="fas fa-server"></i>
                  </div>
                  <div class="wizard-step-label">
                    Server Information
                  </div>
                </div>
              </div>
            </div>
          </div>

          <form class="wizard-content mt-2">
            <div class="wizard-pane">
              <div class="form-group row align-items-center">
                <label class="col-md-4 text-md-right text-left">Name</label>
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="name" class="form-control">
                </div>
              </div>
              <div class="form-group row align-items-center">
                <label class="col-md-4 text-md-right text-left">Email</label>
                <div class="col-lg-4 col-md-6">
                  <input type="email" name="email" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-4 text-md-right text-left mt-2">Address</label>
                <div class="col-lg-4 col-md-6">
                  <textarea class="form-control" name="address"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-4 text-md-right text-left mt-2">Role</label>
                <div class="col-lg-4 col-md-6">
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="value" value="developer" class="selectgroup-input">
                      <span class="selectgroup-button">Developer</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="value" value="ceo" class="selectgroup-input">
                      <span class="selectgroup-button">CEO</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4"></div>
                <div class="col-lg-4 col-md-6">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                    <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-4"></div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="#" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
