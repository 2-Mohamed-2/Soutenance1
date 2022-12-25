<!-- Enable OTP Modal -->
<div class="modal fade" id="sectUpdt{{$sect->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-5">Modification de la Section</h3>
          </div>
          <h6>Veuillez reverifier ces informations</h6>

          <form id="enableOTPForm" class="row g-3" action="{{route('Sect.update', encrypt($sect->id))}}" method="POST">
            @method('PUT')
            @csrf

            <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Commissariat</label>
                <div class="input-group input-group-merge">
                 <select  class="form-control"  name="commissariat_id">
                  {{-- <option  value="{{$sect->commissariat->id}}">{{$sect->commissariat->libelle}}</option> --}}
                  @foreach ($coms as $k => $com)
                  <option value="{{$com->id}}">{{$com->libelle}}</option>

                  @endforeach
                 </select>
                </div>
              </div>

              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">libelle</label>
                <div class="input-group input-group-merge">
                  <input required autocomplete="off" type="text" value="{{$sect->libelle}}" name="libelle" class="form-control" placeholder="Libelle " />
                </div>

              </div>
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Sigle</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10"  value="{{$sect->sigle}}"  name="sigle" class="form-control phone-mask" placeholder="sigle " />
                </div>
              </div><br>

            <div class="col-12">
              <label class="form-label" for="modalEnableOTPPhone">Fonction</label>
              <div class="input-group input-group-merge">
                <input required type="text" autocomplete="off" maxlength="10"  value="{{$sect->fonction}}"  name="fonction" class="form-control phone-mask" placeholder="Fonction " />
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


