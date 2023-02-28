
  <?php
include "../connection.php";
include "include/header.php";
?>
<?php
    $id=$_GET["id"];
   
    $exam_category='';
    $res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $exam_category=$row["category"];
    }
?>

<center> <h3> Exam Page <?php echo $exam_category ?></h3></center>
<?php
if(isset($_POST["submit1"])){
    $question=$_POST['question'];
    $opt1=$_POST['opt1'];
    $opt2=$_POST['opt2'];
    $opt3=$_POST['opt3'];
    $opt4=$_POST['opt4'];
    $answer=$_POST['answer'];
    $loop=0;
    $count=0;
    $res=mysqli_query($link,"SELECT *FROM questions WHERE category='$exam_category' order by id asc") or die(mysqli_error($link));
    $count=mysqli_num_rows($res);
    if ($count==0){
      
    }else{
      while($row=mysqli_fetch_array($res))
      {
          $loop=$loop+1;
          mysqli_query($link,"UPDATE questions SET questions_no='$loop' WHERE id=$row[id]");
      }
    }
    $loop=$loop+1;
    mysqli_query($link,"INSERT INTO questions(questions_no,question,opt1,opt2,opt3,opt4,answer,category)VALUES('$loop','$question','$opt1','$opt2','$opt3','$opt4','$answer','$exam_category')") or die(mysqli_error($link));
    echo"archive sucessfull";
  }
?>

<?php
if (isset($_POST['archive'])) {
    date_default_timezone_set("Etc/GMT+8");
	$query = mysqli_query($link, "SELECT * FROM questions WHERE category='$exam_category'");
    $date = date("Y-m-d");
	while($fetch = mysqli_fetch_array($query)){
			mysqli_query($link, "INSERT INTO archive_questions VALUES( '','$fetch[questions_no]','$fetch[question]','$fetch[opt1]','$fetch[opt2]','$fetch[opt3]','$fetch[opt4]','$fetch[answer]','$fetch[category]','$date')")or die(mysqli_error($link));
			mysqli_query($link, "DELETE FROM questions WHERE category = '$fetch[category]'") or die(mysqli_error($conn));	
	}
}
?>



<div class="container">


<!-- Content -->
<div class="container wrapper-box">
<a href="add_question.php?id=<?php echo $id;?>" type="button"class="icon btn btn-success" ><i class="fa-solid fa-file-circle-plus"></i></a>
<!-- Button trigger modal -->
<button type="button" class="ex btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<i class="fa-solid fa-box-archive"></i>
</button>


</div>

                    

                    <table class="table table-bordered">
                        <tr style="background:#760a04; color:#f5e0c0;">
                            <th>Number</th>
                            <th>Questions</th>
                            <th>1st Choice</th>
                            <th>2nd Choice</th>
                            <th>3rd Choice</th>
                            <th>4th Choice</th>
                            <th>Answer</th>
                            <th colspan="2"></th>
                            
                        </tr>
                        
                    <?php
                    $res=mysqli_query($link,"SELECT * FROM questions WHERE category='$exam_category' ORDER BY questions_no asc");
                    while($row=mysqli_fetch_array($res))
                    {
                    echo "<tr>";
                    echo "<td>"; echo $row["questions_no"];   echo "</td>";
                    echo "<td>"; echo $row["question"];   echo "</td>";
                    echo "<td>"; echo $row["opt1"];   echo "</td>";
                    echo "<td>"; echo $row["opt2"];   echo "</td>";
                    echo "<td>"; echo $row["opt3"];   echo "</td>";
                    echo "<td>"; echo $row["opt4"];   echo "</td>";
                    echo "<td>"; echo $row["answer"];   echo "</td>";
                    ?>
                     <td>
                     <a href="edit_questions.php?id=<?php echo $row["id"];?>&id1=<?php echo $id;?>" type="button" class="btn btn-warning">Edit</a>
                    </td>
                    
                    <td><button type="button" id=<?=$row['id']?> class="del_question btn btn-danger">Delete</button></td>
                    <?php
                    echo "</tr>";
                    }
                    ?>
        </table>
</div>

<!-- modals -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Warning!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3> Are you sure you want to save to archive questions ?</h3>

        <form action="achive_query.php" method="POST">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" name="archive">Save to Archive</button>
        </form>
      </div>
    </div>
  </div>
</div>
             

<!-- end Content -->
<script>
    $(document).ready(function(){
        // Delete
        $(document).on('click','.del_question',function(){
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "The Questions will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4d0000',
                cancelButtonColor: '#D5B895',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'handler/delete_question.php',
                    type: 'POST',
                    data: {id:id},
                    success:function(data){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Question has been Deleted',
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
<?php include "include/footer.php";?>

   