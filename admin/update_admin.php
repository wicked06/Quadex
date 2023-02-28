<?php
include "include/header.php";
?>


 

  <div class="container px-4 ">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3">
     <img src="../img/edit.svg">
     </div>
    </div>
    <div class="col">
      <div class="p-3">
      <form method="POST">
              <div class="text-center">
              <img src="../img/sac.png">
              <h2 class="title">Admin</h2>
              
              </div>

              
                  <div class="input-div one focus text-center">
                    
                      <div class="div">
                          <h5 class="editst"><i class="icon fas fa-user"></i>Username</h5>
                          <input type="text" class="form-control" name="Aid" >
                      </div>
                  </div>

                
                      <div class="div text-center">
                          <h5 class="editst"><i class="icon fas fa-lock"></i>Password</h5>
                          <input type="password" class="form-control" name="Apass">
                      </div>
                  </div>
                 
                  <div class="editbt">
                  <center><button class="btn btn-outline-success fw-bold">Update</button></center>
                  </div>
          </form>
            
      </div>
      </div>
    </div>
  </div>
</div>
<?php
include "include/footer.php";
?>