<!-- Login Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
              <div class="col">
                  <form action="">
                    <div class="form-group d-flex justify-content-evenly m-4">
                      <label for="usertype">Select Login Type</label>
                      <div>
                      <input type="radio" name="usertype" value="buyer">
                      <label for="usertype">Buyer</label>
                      </div>

                      <div>
                      <input type="radio" name="usertype" value="seller">
                      <label for="usertype">Seller</label>
                      </div>

                      <div>
                      <input type="radio" name="usertype" value="admin">
                      <label for="usertype">Admin</label>
                      </div>
                    </div>

                    <div class="form-group m-4">
                        <label for="">E-mail</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group m-4">
                        <label for="">Password</label>
                        <input type="text" class="form-control">
                    </div>
                  </form>
              </div>
            </div>
          </div>
      </div>

      <div class="modal-footer">
        <button type=="button" class="btn btn-primary">Login</button>
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
              <div class="col">
                  <form action="">                    
                    <div class="form-group m-4">
                      <label for="usertype">User Type : </label>
                      <select name="" id="" class="form-control">
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                      </select>
                    </div>
                    <div class="form-group m-4">
                        <label for="">First Name</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group m-4">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group m-4">
                        <label for="">E-mail</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group m-4">
                        <label for="">Password</label>
                        <input type="password" class="form-control">
                    </div>
                  </form>
              </div>
            </div>
          </div>
      </div>

      <div class="modal-footer">
        <button type=="button" class="btn btn-primary">Register</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal"  data-bs-dismiss="modal">Login Here!</button>        
      </div>

    </div>
  </div>
</div>


