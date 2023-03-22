<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addAvoir" aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion d'une nouvelle Affectation</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form id="enableOTPForm" class="row g-3" action="{{route('Avoir.store')}}" method="POST">
        @csrf



        {{-- <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">User</label>
            <div class="input-group input-group-merge">
                <select class="form-control" name="user_id">
                    <option value=""> --  --</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div> --}}

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
          </div>



          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Armement</label>
            <div class="input-group input-group-merge">
                <select class="form-control" name="armement_id">
                    <option value=""> --  --</option>
                    @foreach($armements as $armement)
                    <option value="{{ $armement->id }}">{{ $armement->modele }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div>

          {{-- <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Satut</label>
            <div class="input-group input-group-merge">
                <select class="form-control" name="statut_id">
                    <option value=""> --  --</option>
                    @foreach($statuts as $statut)
                    <option value="{{ $statut->id }}">{{ $statut->libelle }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div> --}}

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Date acquisition</label>
            <div class="input-group input-group-merge">
              <input required autocomplete="off" type="Date" name="date_acqui" class="form-control" placeholder="Acquisition " />
            </div> <br>



        <div class="col-12">
          <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
        </div>
      </form>
    </div>
  </div>
