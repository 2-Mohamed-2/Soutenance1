<!-- Enable OTP Modal -->
<div class="modal fade" id="muniaffUpdt{{$muniaff->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-5">Modification du munition affecter</h3>
        </div>
        <h6>Veuillez reverifier ces informations</h6><br>

        <form id="enableOTPForm" class="row g-3" action="{{route('muniaff.update', encrypt($muniaff->id))}}"
          method="POST">
          @method('PUT')
          @csrf

          <div class="col-12 mb-4">
            <select class="form-control" name="commissariat_id">
              @foreach($comms as $comm)
              {{-- <option value="">{{ $comm->libelle }}</option> --}}
              <option value="{{ $comm->id }}">{{ $comm->libelle }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="col-12 mb-4">
            <select class="form-control" name="munition_id">
              @foreach($munition as $munition)
              {{-- <option value="">{{ $munition->type }}</option> --}}
              <option value="{{ $munition->id }}">{{ $munition->type }}
              </option>
              @endforeach
            </select>
          </div>


          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Date acquisition</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" value="{{ $muniaff->date_acqui }}" maxlength="255"
                name="date_acqui" disabled class="form-control phone-mask" />
            </div>
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Modifier</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
              aria-label="Close">Anuler</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!--/ Enable OTP Modal -->