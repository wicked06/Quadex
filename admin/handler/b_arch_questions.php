    <?php
    include "../connection.php";

    
   
    
   
    
    if (isset($_POST['archive'])) {
        date_default_timezone_set("Etc/GMT+8");
        $query = mysqli_query($link, "SELECT * FROM questions");
        $date = date("Y-m-d");
        while($fetch = mysqli_fetch_array($query)){
                mysqli_query($link, "INSERT INTO archive_questions VALUES( '','$fetch[questions_no]','$fetch[question]','$fetch[opt1]','$fetch[opt2]','$fetch[opt3]','$fetch[opt4]','$fetch[answer]','$fetch[category]','$date')")or die(mysqli_error($link));
                mysqli_query($link, "DELETE FROM questions WHERE category = '$fetch[category]'") or die(mysqli_error($conn));	
        }

        header("location:../admin/student_account.php");
    }
    ?>