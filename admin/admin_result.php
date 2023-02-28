<?php
require "../connection.php";
?>
<!-- Content -->
<?php
    include "../connection.php";
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
<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px; margin-top: 150px; margin-left:500px;">
        <div class="col-lg-6 col-lg-push-3" style="min-height: 200px; ">
        <form method="POST">
    <input type="submit" name="archive" value="Save to Archive" class="btn btn-warning" style="color:#000; margin-top: 30px; margin-left: 20px; margin-bottom: 20px;">
</form>
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
            echo "<table class='table table-bordered' >";
                echo "<tr style='background-color:#760a04; color:#f5e0c0;'>";
                    echo"<th>"; echo "Name"; echo"</th>";
                    echo"<th>"; echo "Exam"; echo"</th>";
                    echo"<th>"; echo "Total Score"; echo"</th>";
                    echo"<th>"; echo "Correct Answer"; echo"</th>";
                    echo"<th>"; echo "Mistakes"; echo"</th>";
                    echo"<th>"; echo "Time"; echo"</th>";
                    ?>
                    <th colspan="2"></th>
                    <?php
                echo "</tr>";
            
            while($row=mysqli_fetch_array($res))
            {
                echo "<tr style='background:#fff;'>";
                echo"<td>"; echo $row["name"]; echo"</td>";
                echo"<td>"; echo $row["exam_type"]; echo"</td>";
                echo"<td>"; echo $row["total_question"]; echo"</td>";
                echo"<td>"; echo $row["correct_answer"]; echo"</td>";
                echo"<td>"; echo $row["wrong_answer"]; echo"</td>";
                echo"<td>"; echo $row["exam_time"]; echo"</td>";
                ?>
                <td><button type="button" class="del_result btn btn-danger" id=<?=$row['id']?>>Delete</button></td>
                <?php
                echo "</tr>";
            }
        }

        echo "</table>";
        ?>
        </div>

        </div>

        <script>
    $(document).ready(function(){
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
    include "admin_footer.php";
    ?>