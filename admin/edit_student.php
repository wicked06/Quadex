

<?php
include("include/header.php");
include_once "../connection.php";
?>

<!-- content Area -->
<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px; margin-top: 100px;">
<div class="col-lg-6 col-lg-push-3" style="min-height: 350px; background-color: white;">

<?php
$id=$_GET["id"];
$id1=$_GET["id1"];

$email="";
$name="";
$lrn="";
$code="";
$category="";

$res=mysqli_query($link,"SELECT * FROM students WHERE id=$id");
while($row=mysqli_fetch_array($res))
{
    $email=$row["email"];
    $name=$row["name"];
    $lrn=$row["lrn"];
    $code=$row["code"];
    

}
?>
            <center><h1 style="margin-top: 20px">Exam Codes</h1></center>

<form  method="POST" name="form1" style="margin-top:20px;">
  
       
         <center>   <Label style="margin-right:20px;">Email: </Label>
            <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
            <Label style="margin-right:20px;">Name: </Label>
            <input type="text" name="name" value="<?php echo $name; ?>"><br><br>
            <Label style="margin-right:20px;">LRN: </Label>
            <input type="text" name="lrn" value="<?php echo $lrn; ?>"><br><br>
            <Label style="margin-right:20px;">OTP: </Label>
            <input type="text" name="code" value="<?php echo $code; ?>"><br><br>

            <input type="submit" name="update" id="" value="Edit Questions" style="" class="btn btn-warning"></center>
       
   
 </form>
 <?php
 if (isset($_POST["update"])){
    mysqli_query($link,"UPDATE students SET email='$_POST[email]',name='$_POST[name]',lrn='$_POST[lrn]',code='$_POST[code]' WHERE id=$id");
?>
<script type="text/javascript">
    window.location="edit_students.php?id=<?php echo $id1 ?>";
</script>
<?php
}
 ?>
</div>
</div>





<?php
include("include/footer.php");
?>