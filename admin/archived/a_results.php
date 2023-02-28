<?php
include "admin_header.php";
include "connection.php";
?>

     



<center>


<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px; margin-top:100px;">

<div class="col-lg-9 col-lg-push-1" style="min-height: 200px; background-color: white;">
<center><h3 style="margin-top: 20px; margin-bottom: 20px;">Student Accounts</h3></center>
<table class="table table-bordered border-warning" style="margin-top:20px; ">
    <tr style="background:#760a04; color:#f5e0c0;">
        <th><center>Name</center></th>
        <th><center>Exam</center></th>
        <th><center>Total Questions</center></th>
        <th><center>Correct Answer</center></th>
        <th><center>Wrong Answer</center></th>
        <th><center>Exam Date</center></th>
        <th><center>Archived Date</center></th>
    </tr>
    <tbody>
    <?php
    
    $res = mysqli_query($link,"SELECT * FROM archive_result ");
    while($row = mysqli_fetch_array($res)){
?>
        <tr>
            <td><center><?php echo $row["name"];?></center></td>
            <td><center><?php echo $row["exam_type"];?></center></td>
            <td><center><?php echo $row["total_question"];?></center></td>
            <td><center><?php echo $row["correct_answer"];?></center></td>
            <td><center><?php echo $row["wrong_answer"];?></center></td>
            <td><center><?php echo $row["exam_time"];?></center></td>
            <td><center><?php echo $row["date"];?></center></td>
<?php
    }
?>
    </tbody>

</table>


</div>
</div>

</center>






<?php
include "admin_footer.php";
?>