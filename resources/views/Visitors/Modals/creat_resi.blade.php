<div class="modal-onboarding modal fade animate__animated" id="resicreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-center">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body p-0">
          <div class="onboarding-content mb-0">
            <h4 class="onboarding-title text-body">Demande d'un certificat de residence</h4>
            <div class="onboarding-info">Veuillez remplir ces champs afin que le traitement de votre certificat soit effectué</div>
            <form action="{{ route('citresistore') }}" method="post" class="row g-3">
                @csrf

                  <div class="col-12 col-md-12">
                        <label class="form-label">Choix du commissariat</label>
                        <select class="form-control" name="commissariat_id">
                          <option value="" selected disabled>- Choisissez le commissariat le plus proche de vous -</option>
                          @foreach($comms as $comm)
                          <option value="{{ $comm->id }}">{{ $comm->libelle }} de {{ $comm->localite }}
                          </option>
                          @endforeach
                        </select>
                  </div>

                  <div class="col-12 col-md-6">
                    <label class="form-label" for="">Adresse actuelle</label>
                    <input type="text" oninput="filtrerCaracteresSpeciaux(event)" minlength="2" autocomplete="off" value="{{ old('adresseactu') }}" required id="" name="adresseactu" class="form-control" placeholder="Votre adresse actuelle" />
                  </div>

                  <div class="col-12 col-md-6">
                    <label class="form-label" for="">Profession</label>
                    <input type="text" oninput="filtrerCaracteresSpeciaux(event)" minlength="5" autocomplete="off" value="{{ old('profession') }}" required id="" name="profession" class="form-control" placeholder="Exemple : Militaire" />
                  </div>

                  {{-- A mettre dans la case qui resulte dans le certificat --}}
                  {{-- Ainsi qu'il en resulte de la demande de celui-ci --}}


                  {{-- <div class="col-12 col-md-6">
                    <label class="form-label" for="">Motif de la demande</label>
                    <input type="text" oninput="filtrerCaracteresSpeciaux(event)" minlength="5" autocomplete="off" value="{{ old('profession') }}" required id="" name="profession" class="form-control" placeholder="" />
                  </div> --}}

          </div>
        </div>
        <br>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
        </form>
      </div>
    </div>
</div>

