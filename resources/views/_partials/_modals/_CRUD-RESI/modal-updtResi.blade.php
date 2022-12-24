<!-- Enable OTP Modal -->
<div class="modal fade" id="resiUpdt{{$resi->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-5">Modification residence</h3>
          </div>
          <h6>Veuillez reverifier ces informations</h6>

          <form id="enableOTPForm" class="row g-3" action="{{route('Resi.update', encrypt($resi->id))}}" method="POST">
            @method('PUT')
            @csrf
            <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Inconnu</label>
                <div class="input-group input-group-merge" >
                    <select value="{{$resi->inconnu_id}}" class="form-control" name="inconnu_id">
                        <option value="{{$resi->inconnu_id}}">--  --</option>
                        @foreach($inconnus as $inconnu)
                        <option value="{{ $inconnu->id }}">{{ $inconnu->nomcomplet }}
                        </option>
                        @endforeach
                    </select>
                </div>
              </div>
             
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Numero</label>
                <div class="input-group input-group-merge">
                  <input required autocomplete="off" type="number" name="numero" value="{{$resi->numero}}" class="form-control" placeholder="Numero " />
                </div>
        
              </div>
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Certifions</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10" name="certifions" value="{{$resi->certifions}}" class="form-control phone-mask" placeholder="certifions " />
                </div>
              </div><br>
        
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Date Naissance</label>
                <div class="input-group input-group-merge">
                  <input required type="date" autocomplete="off" maxlength="10" name="ne" value="{{$resi->ne}}" class="form-control phone-mask" placeholder="Date de Naissance " />
                </div>
              </div>
        
        
            <div class="col-12">
              <label class="form-label" for="modalEnableOTPPhone">Lieu Naissance</label>
              <div class="input-group input-group-merge">
                <input required type="text" autocomplete="off" maxlength="10" name="a" value="{{$resi->a}}" class="form-control phone-mask" placeholder="Lieu de Naissance " />
              </div>
            </div>
        
            <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Nom  pere</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10" name="fils" value="{{$resi->fils}}" class="form-control phone-mask" placeholder="Nom du pere" />
                </div>
              </div>
        
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Nom  mere</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10" name="et"  value="{{$resi->et}}" class="form-control phone-mask" placeholder="Nom de la  mere" />
                </div>
              </div>
        
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Profession</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10" name="profession" value="{{$resi->profession}}" class="form-control phone-mask" placeholder="Profession" />
                </div>
              </div>
        
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Resulte</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10" name="resulte" value="{{$resi->resulte}}" class="form-control phone-mask" placeholder="resulte" />
                </div>
              </div>
        
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Domicile</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10" name="domicile" value="{{$resi->domicile}}" class="form-control phone-mask" placeholder="domicile" />
                </div>
              </div>
        
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Date de creation</label>
                <div class="input-group input-group-merge">
                  <input required type="date" autocomplete="off" maxlength="10" name="kati" value="{{$resi->kati}}" class="form-control phone-mask" placeholder="Date de creation" />
                </div>
              </div>
        
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Dossier</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10" name="dossier" value="{{$resi->dossier}}" class="form-control phone-mask" placeholder="Dossier" />
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
