<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Ajouter un membre</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
    <form class="add-new-user pt-0" id="addNewUserForm" method="POST" action="{{route('Mbr.store')}}">
      @csrf

      <div class="mb-3">
        <label class="form-label" for="add-user-fullname">Matricule</label>
        <input type="text" class="form-control" id="add-user-fullname" placeholder="Matricule" name="matricule"/>
      </div>
      <div class="mb-3">
        <label class="form-label" for="add-user-fullname">Nom complet</label>
        <input type="text" class="form-control" id="add-user-fullname" placeholder="Nom complet" name="name"/>
      </div>
      <div class="mb-3">
        <label class="form-label" for="add-user-email">Email</label>
        <input type="text" id="add-user-email" class="form-control" placeholder="police@police.com"
          aria-label="john.doe@example.com" name="email" />
      </div>
      <div class="mb-3">
        <label class="form-label" for="add-user-contact">Contact</label>
        <input type="tel" id="space" class="form-control" required placeholder="00 00 00 00"  autocomplete="off" maxlength="11" name="telephone"/>
      </div>
      <div class="mb-3">
        <label class="form-label" for="add-user-company">Adresse</label>
        <input type="text" id="add-user-company" class="form-control" placeholder="Adresse" name="adresse" />
      </div>
      <div class="mb-3">
        <label class="form-label" for="country">Genre</label>
        <select name="genre" class="form-select">
          <option selected disabled>Le genre</option>
          <option value="H">Homme</option>
          <option value="F">Femme</option>
        </select>
      </div>
      {{-- <div class="mb-3">
        <label class="form-label" for="user-role">User Role</label>
        <select id="user-role" class="form-select">
          <option value="subscriber">Subscriber</option>
          <option value="editor">Editor</option>
          <option value="maintainer">Maintainer</option>
          <option value="author">Author</option>
          <option value="admin">Admin</option>
        </select>
      </div>
      <div class="mb-4">
        <label class="form-label" for="user-plan">Select Plan</label>
        <select id="user-plan" class="form-select">
          <option value="basic">Basic</option>
          <option value="enterprise">Enterprise</option>
          <option value="company">Company</option>
          <option value="team">Team</option>
        </select>
      </div> --}}
      <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Enregistrer</button>
      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Supprimer</button>
    </form>
  </div>
</div>

<script>
  document.getElementById('space').addEventListener('input', function (e) {
  e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{2})/g, '$1 ').trim();
});
</script>
