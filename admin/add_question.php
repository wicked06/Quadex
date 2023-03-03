<?php
include "include/header.php";

//add questions
if(isset($_POST["add"])){
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
}

?>
  <form  method="POST">

  
    <button type="submit" class="btn btn-success" name="add"> Add Questions</button>
   <div class="container">
   <div class="row gy-5">
    <div class="col-4">
      <div class="p-3">
          <label class="fw-bold"> Question</label>
          <input  class="insert" type="file" style="margin-bottom:20px;">
          <textarea type="text" name="question" id="" ></textarea>
         
          <label class="fw-bold"> Answer</label>
          <input   class="insert" type="file" style="margin-bottom:20px; margin-top:20px;">
          <textarea type="text" name="answer" id=""></textarea>
        
        

      </div>
    </div>
<!-- end of row 1 -->
    <div class="col-4">
      <div class="p-3">
            <label class="fw-bold">Option 1</label>
            <input  class="insert" type="file" style="margin-bottom:20px; ">
            <textarea type="text" name="opt1" id=""></textarea>
            
            <label class="fw-bold">Option 2</label>
            <input  class="insert" type="file" style="margin-bottom:20px; margin-top:20px;">
            <textarea type="text" name="opt2" id=""></textarea>
          
            
      </div>
    </div>
    <!-- end of row 2 -->
    <div class="col-4">
      <div class="p-3">
            <label class="fw-bold">Option 3</label>
            <input  class="insert" type="file" style="margin-bottom:20px;">
            <textarea type="text" name="opt3" id=""></textarea>
            
            <label class="fw-bold">Option 4</label>
            <input  class="insert" type="file" style="margin-bottom:20px; margin-top:20px;">
            <textarea type="text" name="opt4" id=""></textarea>
            
      </div>
    </div>
    <!-- end of row 3 -->
   </div>
</form>

        
            

  
            
      
        
        
    
           
       
            
            
        
        

 </form>
</main>

<script>
     CKEDITOR.replace( 'question',{
                            removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
                            
                        } );
    CKEDITOR.replace( 'opt1',{
        removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
        
    } );

    CKEDITOR.replace( 'opt2',{
        removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
        
    } );
    CKEDITOR.replace( 'opt3',{
        removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
        
    } );
    CKEDITOR.replace( 'opt4',{
        removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
        
    } );
    CKEDITOR.replace( 'answer',{
        removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
        
    } );
</script>
<?php

?>
</body>
</html>

   