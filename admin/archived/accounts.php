<?php
include "../include/header.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"quadex");
?>

     



<center>


<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px; margin-top:100px;">

<div class="col-lg-10 col-lg-push-1" style="min-height: 200px; background-color: white;">
<center><h3 style="margin-top: 20px; margin-bottom: 20px;">Student Accounts</h3></center>

<center>
<table class="table table-bordered" style="margin-top:20px;">
    <tr style="background:#760a04; color:#f5e0c0;">
        <th><center>Email</center></th>
        <th><center>Name</center></th>
        <th><center>LRN</center></th>
        <th><center>OTP</center></th>
        <th><center>Date Archived</center></th>
        <th><center>category</center></th>
    </tr>
    <tbody>
    <?php
    
    $res = mysqli_query($link,"SELECT * FROM archive_code WHERE exam_category = $exam_category");
    while($row = mysqli_fetch_array($res)){
?>
        <tr>
            <td><center><?php echo $row["email"];?></center></td>
            <td><center><?php echo $row["name"];?></center></td>
            <td><center><?php echo $row["lrn"];?></center></td>
            <td><center><?php echo $row["code"];?></center></td>
            <td><center><?php echo $row["date"];?></center></td>
            <td><center><?php echo $row["category"];?></center></td>
<?php
    }
?>
    </tbody>

</table>
</center>


</div>
</div>

</center>






<?php
include "admin_footer.php";
?>