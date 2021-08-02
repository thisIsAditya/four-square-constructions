<!-- Login Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearLoginField()"></button>
      </div>

      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
              <div class="col">
                  <form id="loginForm">
                  <div class="form-group m-4">
                      <label for="logUsertype">User Type : </label>
                      <select name="logUsertype" id="logUsertype" class="form-control">
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                        <option value="admin">Admin</option>
                      </select>
                    </div>

                    <div class="form-group m-4">
                        <label for="logEmail">E-mail</label>
                        <input type="text" class="form-control" name="logEmail" id="logEmail">
                    </div>
                    <div class="form-group m-4">
                        <label for="logPassword">Password</label>
                        <input type="password" class="form-control" name="logPassword" id="logPassword">
                    </div>
                  </form>
              </div>
            </div>
          </div>
      </div>

      <div class="modal-footer">
        <small id ="statusLogMsg"></small>
        <button type="button" class="btn btn-primary" onclick="loginCustomer()" id="loginBtn">Login</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal"  data-bs-dismiss="modal">Register Here!</button>
      </div>

    </div>
  </div>
</div>


<!-- Register Modal --> 

 <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearRegField()"></button>
      </div>

      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
              <div class="col">
                  <form id="RegForm">                    
                    <div class="form-group m-4">
                      <label for="usertype">User Type : </label>
                      <select name="usertype" id="usertype" class="form-control">
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                      </select>
                    </div>
                    <div class="form-group m-4">
                        <label for="">First Name</label>
                        <small id="statusMsg1"></small>
                        <input type="text" class="form-control" name="fname" id="fname">
                    </div>

                    <div class="form-group m-4">
                        <label for="">Last Name</label>
                        <small id="statusMsg2"></small>
                        <input type="text" class="form-control" name="lname" id="lname">
                    </div>

                    <div class="form-group m-4">
                        <label for="">E-mail</label>
                        <small id="statusMsg3"></small>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group m-4">
                        <label for="">Password</label>
                        <small id="statusMsg4"></small>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                  </form>
              </div>
            </div>
          </div>
      </div>

      <div class="modal-footer">
        <span id="successMsg"></span>
        <button type="button" class="btn btn-primary" onclick="addCustomer()" id="regBtn">Register</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal"  data-bs-dismiss="modal">Login Here!</button>        
      </div>

    </div>
  </div>
</div>


