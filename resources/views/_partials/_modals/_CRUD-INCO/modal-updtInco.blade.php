<!-- Enable OTP Modal -->
<div class="modal fade" id="incoRMP{{$inco->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-3">Mot de passe</h3>
        </div>

        <form id="enableOTPForm" class="row g-3" action="{{route('reini-pwd', encrypt($inco->id))}}" method="POST">
          @csrf
          @method('put')

          <div class="col-12">
            <div class="text-wrap">
              Etes-vous sûr de vouloir réinitialiser le mot de passe de : <strong>{{$inco->nomcomplet}} </strong> ?
            </div>
          </div>
          <br>

          <div class="col-12 text-end">
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Non</button>
            <button type="submit" class="btn btn-info me-sm-3 me-1">Oui</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!--/ Enable OTP Modal -->
