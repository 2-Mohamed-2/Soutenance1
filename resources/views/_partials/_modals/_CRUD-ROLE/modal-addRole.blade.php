<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalScrollableTitle">Ajout d'un role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{route('role.store')}}" method="post">
          @csrf

          <div class="col-12 mb-4">
            <label class="form-label" for="modalRoleName">Role Name</label>
            <input type="text" id="modalRoleName" name="RoleName" class="form-control"
                    placeholder="Enter a role name" autocomplete="off" tabindex="-1" />
          </div>

          <div class="col-12">
            <h4>Role Permissions</h4>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="text-nowrap fw-semibold">Reservé à l'administrateur <i class="bx bx-info-circle bx-xs"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Acces total sur la plateforme"></i></td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" name="" type="checkbox" id="selectAll" />
                        <label class="form-check-label" for="selectAll">
                          Tout selectionné
                        </label>
                      </div>
                    </td>
                  </tr>
                  @forelse ($permissions as $permission)
                  <tr>
                    <td class="text-nowrap fw-semibold">
                      {{$permission->desc}}</td>
                    <td>
                    <td>
                      <div class="d-inline-flex">
                        <div class="form-check me-3 me-lg-3">
                          <input class="form-check-input selectOne" name="permission[]" value="{{$permission->id}}" type="checkbox" />
                        </div>
                      </div>
                    </td>
                  </tr>
                  @empty
                  Pas de permission enregistrée pour le moment, <a href="{{route('app-access-permission')}}">ici</a>
                  @endforelse

                </tbody>
              </table>
            </div>
            <!-- Permission table -->
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
      </div>

      </form>

    </div>
  </div>
</div>







{{-- <!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="role-title">Add New Role</h3>
          <p>Set role permissions</p>
        </div>
        <!-- Add role form -->
        <form id="addRoleForm" class="row g-3" onsubmit="return false">
          <div class="col-12 mb-4">
            <label class="form-label" for="modalRoleName">Role Name</label>
            <input type="text" id="modalRoleName" name="modalRoleName" class="form-control" placeholder="Enter a role name" tabindex="-1" />
          </div>
          <div class="col-12">
            <h4>Role Permissions</h4>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="text-nowrap fw-semibold">Administrator Access <i class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i></td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="selectAll" />
                        <label class="form-check-label" for="selectAll">
                          Select All
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap fw-semibold">User Management</td>
                    <td>
                      <div class="d-flex">
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="userManagementRead" />
                          <label class="form-check-label" for="userManagementRead">
                            Read
                          </label>
                        </div>
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                          <label class="form-check-label" for="userManagementWrite">
                            Write
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                          <label class="form-check-label" for="userManagementCreate">
                            Create
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap fw-semibold">Content Management</td>
                    <td>
                      <div class="d-flex">
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="contentManagementRead" />
                          <label class="form-check-label" for="contentManagementRead">
                            Read
                          </label>
                        </div>
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="contentManagementWrite" />
                          <label class="form-check-label" for="contentManagementWrite">
                            Write
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="contentManagementCreate" />
                          <label class="form-check-label" for="contentManagementCreate">
                            Create
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap fw-semibold">Disputes Management</td>
                    <td>
                      <div class="d-flex">
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="dispManagementRead" />
                          <label class="form-check-label" for="dispManagementRead">
                            Read
                          </label>
                        </div>
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="dispManagementWrite" />
                          <label class="form-check-label" for="dispManagementWrite">
                            Write
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="dispManagementCreate" />
                          <label class="form-check-label" for="dispManagementCreate">
                            Create
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap fw-semibold">Database Management</td>
                    <td>
                      <div class="d-flex">
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="dbManagementRead" />
                          <label class="form-check-label" for="dbManagementRead">
                            Read
                          </label>
                        </div>
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="dbManagementWrite" />
                          <label class="form-check-label" for="dbManagementWrite">
                            Write
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="dbManagementCreate" />
                          <label class="form-check-label" for="dbManagementCreate">
                            Create
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap fw-semibold">Financial Management</td>
                    <td>
                      <div class="d-flex">
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="finManagementRead" />
                          <label class="form-check-label" for="finManagementRead">
                            Read
                          </label>
                        </div>
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="finManagementWrite" />
                          <label class="form-check-label" for="finManagementWrite">
                            Write
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="finManagementCreate" />
                          <label class="form-check-label" for="finManagementCreate">
                            Create
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap fw-semibold">Reporting</td>
                    <td>
                      <div class="d-flex">
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="reportingRead" />
                          <label class="form-check-label" for="reportingRead">
                            Read
                          </label>
                        </div>
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="reportingWrite" />
                          <label class="form-check-label" for="reportingWrite">
                            Write
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="reportingCreate" />
                          <label class="form-check-label" for="reportingCreate">
                            Create
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap fw-semibold">API Control</td>
                    <td>
                      <div class="d-flex">
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="apiRead" />
                          <label class="form-check-label" for="apiRead">
                            Read
                          </label>
                        </div>
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="apiWrite" />
                          <label class="form-check-label" for="apiWrite">
                            Write
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="apiCreate" />
                          <label class="form-check-label" for="apiCreate">
                            Create
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap fw-semibold">Repository Management</td>
                    <td>
                      <div class="d-flex">
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="repoRead" />
                          <label class="form-check-label" for="repoRead">
                            Read
                          </label>
                        </div>
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="repoWrite" />
                          <label class="form-check-label" for="repoWrite">
                            Write
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="repoCreate" />
                          <label class="form-check-label" for="repoCreate">
                            Create
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-nowrap fw-semibold">Payroll</td>
                    <td>
                      <div class="d-flex">
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="payrollRead" />
                          <label class="form-check-label" for="payrollRead">
                            Read
                          </label>
                        </div>
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" id="payrollWrite" />
                          <label class="form-check-label" for="payrollWrite">
                            Write
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="payrollCreate" />
                          <label class="form-check-label" for="payrollCreate">
                            Create
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- Permission table -->
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
        <!--/ Add role form -->
      </div>
    </div>
  </div>
</div>
<!--/ Add Role Modal --> --}}
