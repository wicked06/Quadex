
<?php
  include "include/header.php";
    include "../connection.php";
  $id=$_GET["id"];
  $exam_category='';
  $res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
  while($row=mysqli_fetch_array($res))
  {
      $exam_category=$row["category"];
  }

// password generator  
  if (isset($_POST['gen'])) {
    $result='';
  if (isset($_POST['chkone'])) {
    PassGenerator(6);

  }elseif (isset($_POST['chktwo'])) {
  PassGenerator(10);
  }elseif (isset($_POST['chkthree'])){
    PassGenerator(12);
  }else{
    PassGenerator(8);
  }
  }
  function PassGenerator($lenght)
  {
    global $result;
    $_ValidChar='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
    while (0 <$lenght--){
      $result.=$_ValidChar[random_int(0,strlen($_ValidChar)-1)];
    }
  }
?>









      <div class="container wrapper-box" >
  <form class=""   method="POST" >
  <button type="button" class="buts btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#add"><i class="fa-solid fa-user-plus"></i></button>

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#archive"><i class="fa-sharp fa-solid fa-box-archive"></i></button>
    <div class=" generate d-flex flex-row" >
    <div class=""><input class="form-control"type="text" name="result" value="<?php echo(@$result);?>" disabled placeholder="Copy Generated Code"></div>
    <div class=""><button class="form-control btn btn-outline-success" type="submit" name="gen" value="Generate" class="generate btn-warning" ><i class="fa-sharp fa-solid fa-lock"></i></button></div>
    </div>
  </form>



<!-- make another page for print view   -->


<!-- start of archive -->
 
<?php
  if (isset($_POST['archive'])) {
    date_default_timezone_set("Etc/GMT+8");
    $query = mysqli_query($link, "SELECT * FROM students WHERE category='$exam_category'");
    $date = date("Y-m-d");
    while($fetch = mysqli_fetch_array($query)){
        mysqli_query($link, "INSERT INTO archive_code VALUES( '','$fetch[email]','$fetch[name]','$fetch[lrn]','$fetch[code]','$date','$fetch[category]')")or die(mysqli_error($link));
        mysqli_query($link, "DELETE FROM students WHERE category = '$fetch[category]'") or die(mysqli_error($conn));	
      ?>
      <script>
        Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Your work has been saved',
    showConfirmButton: false,
    timer: 1500
  })
      </script>
<?php	
  }
  }
?>
    
  
  <!-- end of archive  -->

  


<!-- Modal add account-->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
      <div class="form-floating">
        <input type="email" class="form-control mb-3" id="floatingInput" name="email" placeholder="StudentEmail@sac.edu.ph">
        <label for="floatingInput">Enter Student Email</label>
      </div>
      <div class="form-floating">
      <input type="text" class="form-control mb-3" id="floatingInput" name="name"placeholder="Student Name">
      <label for="floatingInput">Enter Student Name</label>
    </div>
    <div class="form-floating ">
      <input type="text" class="form-control mb-3" id="floatingInput" name="lrn" placeholder="Enter Student LRN">
      <label for="floatingInput">Enter Student LRN</label>
    </div>
    <div class="form-floating ">
      <input type="text" class="form-control mb-3" id="floatingInput" name="code" placeholder="Enter Generated Code">
      <label for="floatingInput">Enter Generated Code</label>
    </div>
        
      </div>
      <div class="modal-footer">
        
        <button type="submit" name="student" class="btn btn-success"><i class="fa-solid fa-user-plus mb"></i> Add Student</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- end -->
</div>

<!-- archive Modal -->
<div class="modal fade" id="archive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Warning!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form metbhod="POST">
      <h3>Are you sure you want to move all of the accounts to archive?</h3>
      </div>
      <div class="modal-footer">
      <button type="submit" name="archive"  class="btn btn-outline-warning"><i class="fa-solid fa-box-archive"></i> Confirm</button>
      </form>
      </div>
    </div>
  </div>
</div>

<?php 
  if(isset($_POST["student"]))
  {
      
      $email= $_POST["email"];
      $name= $_POST["name"];
      $lrn= $_POST["lrn"];
      $code= $_POST["code"];
      
      $res=mysqli_query($link,"SELECT * FROM students WHERE name='$name'");
      $count=mysqli_num_rows($res);
      if ($count == 1) {
  ?>
        <script>
    Swal.fire({
    position: 'center',
    icon: 'warning',
    title: 'Student already existed',
    showConfirmButton: false,
    timer: 2000
  })
        </script>
  <?php
      }else{
        $sql = "INSERT INTO students(email,name,lrn,code,category)VALUES('$email','$name','$lrn','$code','$exam_category')";
        $query = $link->query($sql) or die($link->error); 
      }
  }
  ?>
<div class="container-fluid">
<table class="table table-bordered text-center">
  <thead>
    <tr style="background:#760a04; color:#f5e0c0;">
      <th scope="col">Email</th>
      <th scope="col">Name</th>
      <th scope="col">LRN</th>
      <th scope="col">Code</th>
      <th scope="col">Category</th>
      <th colspan="2"></th>
    </tr>
  </thead>
  <tbody>
  <?php
             $res=mysqli_query($link,"SELECT * FROM students WHERE category='$exam_category' ORDER BY id asc");
             while($row=mysqli_fetch_array($res))
             {
            ?>
    <tr style="background:#fff; color:#333">
      
      <td>  <?= $row['email']?></td>
      <td> <?= $row['name']?></td>
      <td> <?= $row['lrn']?></td>
      <td> <?= $row['code']?></td>
      <td> <?= $row['category']?></td>
      <td><center>
      <a href="edit_student.php?id=<?php echo $row["id"];?>&id1=<?php echo $id;?>" type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
        <button type="button" class="del_code btn btn-danger" id=<?=$row['id']?>><i class="fa-solid fa-trash"></i></button>
      </center></td>
    </tr>
 
    <?php
           }
           ?>
  </tbody>
</table>

</div>

<script>
    $(document).ready(function(){
        // Delete
        $(document).on('click','.del_code',function(e){
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "The account will be Deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4d0000',
                cancelButtonColor: '#D5B895',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'handler/delete_code.php',
                    type: 'POST',
                    data: {id:id},
                    success:function(data){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'code has been Deleted',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(()=>{
                            window.location.reload();
                        })
                    }
                })
            }
            })
        })

    

      
      
    }); 
</script>

<?php  include "include/footer.php";?>



