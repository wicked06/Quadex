

<?php
include("connection.php");
include("header.php");
?>


<!-- content Area -->
<center>
<div class="container ">
<h2>Instructions</h2> 
<p> After Clicking the Examination type  the timer will start</p>
<p> Select the closest answer to the questions</p>
</div>
</center>
        
<center><h3 style="margin-top: 80px; margin-bottom: 60px;">Select Examination To Start</h3></center>




<?php
$res=mysqli_query($link,"SELECT * FROM exam_category");
while ($row=mysqli_fetch_array($res)){
    ?>

    <center><input type="button" class="btn btn-danger form-control" value="<?php echo $row["category"];?>" onclick="set_exam_type_session(this.value);" style="margin-top:30px; width:100px;"></center>
    <?php
}
?>
</div>

</div>

      



<?php
include("footer.php");
?>
<script type="text/javascript">
    function set_exam_type_session(exam_category) 
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                window.location="dashboard.php";
            }
        };
        xmlhttp.open("GET", "forajax/set_exam_type_session.php?exam_category="+ exam_category,true);
        xmlhttp.send(null);

    }
</script>