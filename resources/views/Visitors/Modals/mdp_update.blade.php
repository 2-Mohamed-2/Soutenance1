<div class="modal-onboarding modal fade animate__animated" id="mdpcitup{{ Auth::guard('inconnu')->user()->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-center">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body p-0">
          <div class="onboarding-content mb-0">
            <h4 class="onboarding-title text-body">Modification du mot de passe</h4>
            <div class="onboarding-info">ici, vous pourrez changer votre mot de passe au besoin</div>
            <form action="{{ route('cimdp', encrypt(Auth::guard('inconnu')->user()->id)) }}" method="post">
                @method('PUT')
                @csrf
              <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3 form-password-toggle">
                      <label class="form-label" for="modalEditUserLastName">Mot de passe actuel</label>
                        <div class="col-12 col-md-6 input-group input-group-merge">
                          <input type="password" required id="login-password" minlength="8" maxlength="12" autocomplete="off" name="password_actu" style="letter-spacing: 5px;" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                  </div>
                <div class="col-sm-6">
                  <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="modalEditUserLastName">Nouveau mot de passe</label>
                      <div class="col-12 col-md-6 input-group input-group-merge">
                        <input type="password" required id="login-password" minlength="8" maxlength="12" autocomplete="off" name="password" style="letter-spacing: 5px;" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                      </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="modalEditUserLastName">Confirmation</label>
                      <div class="col-12 col-md-6 input-group input-group-merge">
                        <input type="password" id="login-password" minlength="8" maxlength="12" autocomplete="off" required name="password_confirmation" style="letter-spacing: 5px;" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                      </div>
                  </div>
                </div>
              </div>
            
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
        </form>
      </div>
    </div>
</div>

