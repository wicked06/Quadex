<?php
require_once('../connection.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Welcome to QuaDEX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../sweetalert/jquery-3.6.1.min.js"></script>
    <script src="../sweetalert/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    

    



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .home
      {
        color:#760a04;
        height:20px;
        width:20px;
      }
    </style>
    

    
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center" >
 

<main class="form w-100 m-auto" >
<div class="container">
<form id="category" method="POST" >
    <img class="mb-4" src="../img/sac.png" alt="" width="200" height="200">
    <div class="container text-center ">
    <a href="logout.php"><i class="fa-sharp fa-solid fa-house home"></i></a>
  <div class="row g-2 justify-content-center">
    <div class="col-4">
      <div class="p-3">
      <select class="form-select" aria-label="Default select example" name="exam_name" id="exam_name">
  <option selected>Select Exam</option>
  <option value="Diagnostic">Diagnostic</option>
  <option value="Qualifying">Qualifying</option>

</select>
      </div>
    </div>
    <div class="col-4">
      <div class="p-3">
      <select class="form-select" aria-label="Default select example" name="exam_time" id="exam_time" required>
  <option selected disabled>Time</option>
  <option value="60">1 hour</option>
  <option value="90">1 hour and 30 mins</option>
  <option value="120">2 hours</option>
</select>
      </div>
      
    </div>
    <div class="col-2">
      <div class="p-3">
      <center><button type="submit" name="post" class="btn btn-success mb-3">Post Exam</button></center>
      </div>
      
      
    </div>
    
  </div>
</div>
  
  <?php 
  if(isset($_POST["post"]))
  {
      
      $exam_name= $_POST["exam_name"];
      $exam_time= $_POST["exam_time"];
      $res=mysqli_query($link,"SELECT * FROM exam_category WHERE category='$exam_name' ");
      $count=mysqli_num_rows($res);
      if ($count==1) {
  ?>
        <script>
    Swal.fire({
    position: 'center',
    icon: 'warning',
    title: 'Exam has been Already Posted',
    showConfirmButton: false,
    timer: 2000
  })
        </script>
  <?php
      }else{
        $sql = "INSERT INTO exam_category(`category`,`exam_time_in_minutes`) VALUES ('$exam_name','$exam_time')";
        $query = $link->query($sql) or die($link->error); 
      }
  }
  ?>
 <div class="container">
 <table class="table  table-bordered" style="background:#f5e0c0; border:#760a04;">
  <thead >
    <tr style="background:#760a04; color:#f5e0c0;">
      <th>Exam Name</th>
      <th >Exam Time(Minutes)</th>
      <th colspan="2"></th>
    </tr>
  </thead>
  <tbody>
<?php
    $count=0;
    $res = mysqli_query($link,"SELECT * FROM exam_category");
    while($row = mysqli_fetch_array($res)){
?>
        <tr>
           
            <td><center><?php echo $row["category"];?></center></td>
            <td><center><?php echo $row["exam_time_in_minutes"];?>  Minutes</center></td>
            <td>
              <a href="dashboard.php?id=<?php echo $row["id"];?>" type="button" class="btn btn-success border-dark"><i class="fa-solid fa-eye"></i></a> 
              <a href="dashboard.php.php?id=<?php echo $row["id"];?>" type="button" class="btn btn-warning border-dark"><i class="fa-solid fa-pen-to-square"></i></a>
              <button type="button" class="del_category btn btn-danger border-dark" id=<?=$row['id']?>><i class="fa-solid fa-file-circle-xmark"></i></button>
            </td>  
        </tr>

<?php
    }
?>
       
       </form>
    </tbody>
</table>
 </div>
</div>
</main>


<script>
    $(document).ready(function(){
        //delete category
        $(document).on('click','.del_category',function(){
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "The Examination will be removed",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4d0000',
                cancelButtonColor: '#D5B895',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'handler/delete_category.php',
                    type: 'POST',
                    data: {id:id},
                    success:function(data){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Exam has been Removed',
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
        
    })
</script>
  </body>
</html>
