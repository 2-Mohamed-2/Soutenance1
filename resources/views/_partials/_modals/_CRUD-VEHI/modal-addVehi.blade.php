<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addVehi" aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion d'un nouveau vehicule</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form id="enableOTPForm" class="row g-3" action="{{route('vehi.store')}}" method="POST">
        @csrf

        <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Nom</label>
          <div class="input-group input-group-merge">
            <input required autocomplete="off" type="text" name="type" class="form-control" placeholder="Type de Vehicule" />
          </div>

        </div>
        {{-- <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Identifiant</label>
          <div class="input-group input-group-merge">
            <input required type="number" autocomplete="off" maxlength="10" name="identifiant" class="form-control phone-mask" placeholder="Identifient " />
          </div>
        </div><br> --}}

        <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Modele</label>
          <div class="input-group input-group-merge">
            <input required type="text" autocomplete="off" maxlength="10" name="modele" class="form-control phone-mask" placeholder="Modele" />
          </div>
        </div>


       <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Plaque</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" maxlength="10" name="plaque" class="form-control phone-mask" placeholder="NUmero du plaque" />
        </div>
      </div>

      {{-- <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Revision</label>
          <div class="input-group input-group-merge">
            <input required type="text" autocomplete="off" maxlength="10" name="revision" class="form-control phone-mask" placeholder="" />
          </div>
        </div> --}}
{{--
        <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Commissariat</label>
            <div class="input-group input-group-merge">
                <select class="form-control" name="commissariat_id">
                    <option value=""> --  --</option>
                    @foreach($comms as $comm)
                    <option value="{{ $comm->id }}">{{ $comm->libelle }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div> --}}



        <div class="col-12">
          <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
        </div>
      </form>
    </div>
  </div>
