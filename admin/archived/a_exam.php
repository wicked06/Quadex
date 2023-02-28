<?php
include "./include/header.php";
include "../connection.php";
?>

     



<center>


<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px; margin-top:100px;">

<div class="col-lg-10 col-lg-push-1" style="min-height: 200px; background-color: white;">
<center><h3 style="margin-top: 20px; margin-bottom: 20px;">Questions</h3></center>
<table class="table table-bordered border-warning" style="margin-top:20px; ">
    <tr style="background:#760a04; color:#f5e0c0;">
        <th><center>Question Number</center></th>
        <th><center>Question</center></th>
        <th><center>Option1</center></th>
        <th><center>Option2</center></th>
        <th><center>Option3</center></th>
        <th><center>Option4</center></th>
        <th><center>Answer</center></th>
        <th><center>Exam</center></th>
        <th><center>date</center></th>
    </tr>
    <tbody>
    <?php
    
    $res = mysqli_query($link,"SELECT * FROM archive_questions ");
    while($row = mysqli_fetch_array($res)){
?>
        <tr>
            <td><center><?php echo $row["questions_no"];?></center></td>
            <td><center><?php echo $row["question"];?></center></td>
            <td><center><?php echo $row["opt1"];?></center></td>
            <td><center><?php echo $row["opt2"];?></center></td>
            <td><center><?php echo $row["opt3"];?></center></td>
            <td><center><?php echo $row["opt4"];?></center></td>
            <td><center><?php echo $row["answer"];?></center></td>
            <td><center><?php echo $row["category"];?></center></td>
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