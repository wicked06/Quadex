<?php
require "../connection.php";
include "include/header.php";
?>
<!-- Content -->
<?php
    
    $id=$_GET["id"];
    $exam_category='';
    $res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $exam_category=$row["category"];
    }
?>

<?php
if (isset($_POST['archive'])) {
    date_default_timezone_set("Etc/GMT+8");
	$query = mysqli_query($link, "SELECT * FROM exam_results");
    $date=date("Y-m-d");
	while($fetch = mysqli_fetch_array($query)){
			mysqli_query($link, "INSERT INTO archive_result VALUES( NULL, '$fetch[name]','$fetch[exam_type]','$fetch[total_question]','$fetch[correct_answer]','$fetch[wrong_answer]','$fetch[exam_time]','$date')")or die(mysqli_error($link));
			mysqli_query($link, "DELETE FROM exam_results WHERE id = '$fetch[id]'") or die(mysqli_error($conn));	

	}?>
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
?>

    <div class="container">
    <div class="d-flex justify-content-end" style="margin-bottom: 20px;">
    <form method="POST">
    <input type="submit" name="archive" value="Save to Archive" class="btn btn-warning" style="color:#000; margin-top: 30px; margin-left: 20px; margin-bottom: 20px;">
</form>
    </div>
 
        <?php
        $count=0;
        $res=mysqli_query($link,"SELECT * FROM exam_results WHERE exam_type = '$exam_category'");
        // WHERE name='$_SESSION[name]' ORDER by id desc
        $count=mysqli_num_rows($res);



        if ($count==0) 
        {
            ?>
            <center><h1 style="margin-top:10px;">No Results Available</h1></center>
            <?php
        }else {
           ?>

<table class="table table-bordered table-striped table-hovered table-light" id="results" style="margin-top:10px;">
                    <thead>
                       <tr>
                          <th>Name</th>
                          <th>Exam</th>
                          <th>Total Score</th>
                          <th>Correct Answer</th>
                          <th>Mistakes</th>
                          <th>Examinatin Date</th>
                          
                          <th colspan=""></th>
                       </tr>
                    </thead>
                    <tbody>
                       <?php
                            $conn = new mysqli('localhost','root','','quadex');
                            $sql = "SELECT * FROM exam_results ";
                            $res = $conn->query($sql) or die($conn->error);
                            while($row=$res->fetch_assoc())
                           {
                       ?>
                       <tr>
                          <td>  <?= $row['name']?></td>
                          <td> <?= $row['exam_type']?></td>
                          <td> <?= $row['total_question']?></td>
                          <td> <?= $row['correct_answer']?></td>
                          <td> <?= $row['wrong_answer']?></td>
                          <td> <?= $row['exam_time']?></td>
                          
                         
               
                         
                          <td>
                             <div class="d-flex justify-content-center">
                              <button type="button" class="del_question btn btn-danger" id=<?=$row['id']?>><i class=" fa-solid fa-trash"></i></button>
                             </div>
                          </td>
                       </tr>
                       <?php
                           }
                       ?>
                    </tbody>
      </table>
            <?php
            while($row=mysqli_fetch_array($res))
            {
              ?>
                <td><button type="button" class="del_result btn btn-danger" id=<?=$row['id']?>>Delete</button></td>
<?php     
            }
        }
?>
       
    </div>

        <script>
    $(document).ready(function(){
//data
        $('#results').DataTable();

        // Delete
        $(document).on('click','.del_result',function(){
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Result will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4d0000',
                cancelButtonColor: '#D5B895',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'handler/delete_result.php',
                    type: 'POST',
                    data: {id:id},
                    success:function(data){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Account has been Deleted',
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
<!-- end Content -->



    <?php
    include "include/footer.php";
    ?>