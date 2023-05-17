<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addResi" aria-labelledby="offcanvasEndLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion d'une nouvelle residence</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
    <form id="enableOTPForm" class="row g-3" action="{{route('Resi.store')}}" method="POST">
      @csrf

      {{-- <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Inconnu</label>
        <div class="input-group input-group-merge">
            <select class="form-control" name="inconnu_id">
                <option value=""> --  --</option>
                @foreach($inconnus as $inconnu)
                <option value="{{ $inconnu->id }}">{{ $inconnu->nomcomplet }}
                </option>
                @endforeach
            </select>
        </div>
      </div> --}}

      {{-- <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Numero</label>
        <div class="input-group input-group-merge">
          <input required autocomplete="off" type="number" name="numero" class="form-control" placeholder="Numero " />
        </div> --}}

      </div>
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Nom et Prenom</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" minlength="3" name="certifions" class="form-control phone-mask" placeholder="certifions " />
        </div>
      </div><br>

      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Date Naissance</label>
        <div class="input-group input-group-merge">
          <input required type="date" autocomplete="off" minlength="3" name="ne" class="form-control phone-mask" placeholder="Date de Naissance " />
        </div>
      </div>


    <div class="col-12">
      <label class="form-label" for="modalEnableOTPPhone">Lieu Naissance</label>
      <div class="input-group input-group-merge">
        <input required type="text" autocomplete="off" minlength="3" name="a" class="form-control phone-mask" placeholder="Lieu de Naissance " />
      </div>
    </div>

    <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Nom  pere</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" minlength="3" name="fils" class="form-control phone-mask" placeholder="Nom du pere" />
        </div>
      </div>

      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Nom  mere</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" minlength="3" name="et" class="form-control phone-mask" placeholder="Nom de la  mere" />
        </div>
      </div>

      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Profession</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" minlength="3" name="profession" class="form-control phone-mask" placeholder="Profession" />
        </div>
      </div>

      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Resulte</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" minlength="3" name="resulte" class="form-control phone-mask" placeholder="resulte" />
        </div>
      </div>

      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Domicile</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" minlength="3" name="domicile" class="form-control phone-mask" placeholder="domicile" />
        </div>
      </div>

      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Date de creation</label>
        <div class="input-group input-group-merge">
          <input required type="date" autocomplete="off" minlength="3" name="kati" class="form-control phone-mask" placeholder="Date de creation" />
        </div>
      </div>

      {{-- <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Dossier</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" maxlength="10" name="dossier" class="form-control phone-mask" placeholder="Dossier" />
        </div>
      </div> --}}


      <div class="col-12">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
      </div>
    </form>
  </div>
</div>
