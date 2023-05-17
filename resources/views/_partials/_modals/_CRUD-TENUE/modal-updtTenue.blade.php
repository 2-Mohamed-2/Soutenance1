<!-- Enable OTP Modal -->
<div class="modal fade" id="tenueUpdt{{$tenue->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-5">Modification tenue</h3>
          </div>
          <h6>Veuillez reverifier ces informations</h6>

          <form id="enableOTPForm" class="row g-3" action="{{route('Tenue.update', encrypt($tenue->id))}}" method="POST">
            @method('PUT')
            @csrf

            <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Type</label>
                <div class="input-group input-group-merge">
                  <input required autocomplete="off" type="text" value="{{$tenue->type}}" name="type" class="form-control" placeholder="Type de Vehicule" />
                </div>

              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Modele</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" minlength="5" name="modele" value="{{$tenue->modele}}" class="form-control phone-mask" placeholder="Modele" />
                </div>
              </div>


            <div class="col-12">
              <label class="form-label" for="modalEnableOTPPhone">Taille</label>
              <div class="input-group input-group-merge">
                <input required type="text" autocomplete="off" minlength="5" name="taille" value="{{$tenue->taille}}" class="form-control phone-mask" placeholder="Taille" />
              </div>
            </div>

                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Stock</label>
                  <div class="input-group input-group-merge">
                    <input required type="number" autocomplete="off" minlength="5" name="stock" value="{{$tenue->stock}}" class="form-control phone-mask" placeholder="" />
                  </div>
                </div>

                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Lieu de Stockage</label>
                  <div class="input-group input-group-merge">
                    <select class="form-control" name="lieu_stock_id">
                      @foreach($lieustock as $lieustock)
                      <option value="{{ $lieustock->id }}">{{ $lieustock->entrepot }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div> <br>

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
