<!-- Enable OTP Modal -->
<div class="modal fade" id="vehiUpdt{{$vehi->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-5">Modification vehicule</h3>
          </div>
          <h6>Veuillez reverifier ces informations</h6>

          <form id="enableOTPForm" class="row g-3" action="{{route('Vehi.update', encrypt($vehi->id))}}" method="POST">
            @method('PUT')
            @csrf
            {{-- <div class="col-12">
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
              </div> --}}
             
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Type</label>
                <div class="input-group input-group-merge">
                  <input required autocomplete="off" type="text" name="type"  value="{{$vehi->type}}" class="form-control" placeholder="Type de Vehicule" />
                </div>
        
              </div>
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Identifient</label>
                <div class="input-group input-group-merge">
                  <input required type="number" autocomplete="off" maxlength="10"  value="{{$vehi->identifient}}"  name="identifient" class="form-control phone-mask" placeholder="Identifient " />
                </div>
              </div><br>
        
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Modele</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10"  value="{{$vehi->modele}}"  name="modele" class="form-control phone-mask" placeholder="Modele" />
                </div>
              </div>
        
        
            <div class="col-12">
              <label class="form-label" for="modalEnableOTPPhone">Plaque</label>
              <div class="input-group input-group-merge">
                <input required type="text" autocomplete="off" maxlength="10"  value="{{$vehi->mat_plaque}}"  name="mat_plaque" class="form-control phone-mask" placeholder="NUmero du plaque" />
              </div>
            </div>
        
            <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Revision</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10"  value="{{$vehi->revision}}"  name="revision" class="form-control phone-mask" placeholder="" />
                </div>
              </div>
              
              <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Commissariat</label>
                  <div class="input-group input-group-merge">
                      <select  value="{{$vehi->commissariats_id}}"  class="form-control" name="commissariats_id">
                          <option value="value="{{$vehi->commissariats_id}}""> --  --</option>
                          @foreach($comms as $comm)
                          <option value="{{ $comm->id }}">{{ $comm->libelle }}
                          </option>
                          @endforeach
                      </select>
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
