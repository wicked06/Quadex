<?php
include "include/header.php";
include "../connection.php";
?>

<div class="container">
    <table class="table table-striped">
        <tr>
            <th>Question</th>
            <th>Option 1</th>
            <th>Option 2</th>
            <th>Option 3</th>
            <th>Option 4</th>
            <th>Answer</th>
            <th>Exam</th>
            <th>Date</th>
            <th></th>
        </tr>

        





    <?php
        
        $res = mysqli_query($link,"SELECT * FROM archive_questions ");
        while($row = mysqli_fetch_array($res)){
    ?>
        <tr>
            
            <td><?php echo $row["question"];?></td>
            <td><?php echo $row["opt1"];?></td>
            <td><?php echo $row["opt2"];?></td>
            <td><?php echo $row["opt3"];?></td>
            <td><?php echo $row["opt4"];?></td>
            <td><?php echo $row["answer"];?></td>
            <td><?php echo $row["category"];?></td>
            <td><?php echo $row["date"];?></td>
            <td><button class="btn btn-success">Retrieve Questions</button></td>
        </tr>
    <?php
        }
    ?>

    </table>
</div>


<?php
include "include/footer.php";
?>