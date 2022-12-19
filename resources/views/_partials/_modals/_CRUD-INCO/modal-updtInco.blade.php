<!-- Enable OTP Modal -->
<div class="modal fade" id="incoUpdt{{$inco->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-5">Modification d' inconnu</h3>
          </div>
          <h6>Veuillez reverifier ces informations</h6>

          <form id="enableOTPForm" class="row g-3" action="{{route('Inco.update', encrypt($inco->id))}}" method="POST">
            @method('PUT')
            @csrf
            <div class="col-12">
              <label class="form-label" for="modalEnableOTPPhone">NomComplet</label>
              <div class="input-group input-group-merge">
                <input required autocomplete="off" type="text" name="nomcomplet" value="{{$inco->nomcomplet}}" class="form-control" />
              </div>
            </div>
            <div class="col-12">
              <label class="form-label" for="modalEnableOTPPhone">Adresse</label>
              <div class="input-group input-group-merge">
                <input required autocomplete="off" type="text" name="adresse" value="{{$inco->adresse}}" class="form-control" />
              </div>
            </div>
            <div class="col-12">
              <label class="form-label" for="modalEnableOTPPhone">Telephone</label>
              <div class="input-group input-group-merge">
                <input required autocomplete="off" type="text" name="telephone" value="{{$inco->telephone}}" class="form-control" />
              </div>
            </div>

            <div class="col-12" class="input-group input-group-merge">
                <label class="form-label" for="modalEnableOTPPhone">Genre</label>
                <select class="form-control" name="genre" value="{{$inco->genre}}"  id="">
                  <option value="">-- Genre --</option>
                  <option value="Homme">Homme</option>
                  <option value="Femme">Femme</option>
                 </select>
            </div>
        
            </div>
            <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Motif</label>
            <div class="input-group input-group-merge">
                <input required autocomplete="off" type="text" name="motif" value="{{$inco->motif}}" class="form-control" />
            </div>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Modifier</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Anuler</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  <!--/ Enable OTP Modal -->
