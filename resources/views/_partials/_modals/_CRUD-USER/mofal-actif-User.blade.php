<!-- Enable OTP Modal -->
<div class="modal fade" id="userAct{{$user->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-3">Activation de compte</h3>
          </div>
  
          <form id="enableOTPForm" class="row g-3" action="{{route('active-mbr', encrypt($user->id))}}" method="POST">
            @method('put')
            @csrf
  
            <div class="col-12">
              <div class="text-wrap fs-6">
                Etes-vous sûr de vouloir activer le compte de : <b>{{$user->name}}</b> ?
              </div>
            </div>
            <br>
  
            <div class="col-12 text-end">
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Non</button>
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Oui</button>
            </div>
          </form>
  
        </div>
      </div>
    </div>
  </div>
  <!--/ Enable OTP Modal -->
  