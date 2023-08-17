<!-- End Offcanvas -->
<div class="modal fade" id="addImport" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Choisissez le fichier source</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="modal-body mx-0 flex-grow-0">
            <form id="enableOTPForm" class="row g-3" action="{{route('importCBExcel')}}" method="POST">
                @csrf
                <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Fichier</label>
                <div class="input-group input-group-merge">
                    <input required autocomplete="off" type="file" name="fichier" class="form-control" />
                </div>
                </div>  
        
                <div class="col-12">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">Importer</button>
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
                </div>

            </form>
        </div>
    </div>
</div>
  