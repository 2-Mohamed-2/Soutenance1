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

          <form id="enableOTPForm" class="row g-3" action="{{route('vehi.update', encrypt($vehi->id))}}" method="POST">
            @method('PUT')
            @csrf


             {{-- <div class="col-12 mb-4">
             <select class="form-control" name="commissariat_id">

                    @foreach($comms as $comm)
                     <option value="">{{ $comm->libelle }}</option>
                    <option value="{{ $comm->id }}">{{ $comm->libelle }}
                    </option>
                    @endforeach
             </select>
          </div> --}}
      <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Type</label>
          <div class="input-group input-group-merge">
            <input required type="text" autocomplete="off" value="{{ $vehi->type }}" maxlength="255" name="type" class="form-control phone-mask" placeholder="Modele" />
          </div>
        </div>

        <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Modele</label>
          <div class="input-group input-group-merge">
            <input required type="text" autocomplete="off" value="{{ $vehi->modele }}" maxlength="255" name="modele" class="form-control phone-mask" placeholder="Modele" />
          </div>
        </div>

             {{-- <div class="col-12">
              <label class="form-label" for="modalEnableOTPPhone">Plaque</label>
              <div class="input-group input-group-merge">
                <input required type="text" disabled autocomplete="off" maxlength="10"  value="{{$vehi->plaque}}"  name="plaque" class="form-control phone-mask" placeholder="NUmero du plaque" />
              </div>
            </div> --}}

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
