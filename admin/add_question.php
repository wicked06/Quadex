<?php
include "include/header.php";
?>
  <form  method="POST" name="form1">

  <div class="container justify content center">
    <input type="submit" name="add" id="" value="Add Question "  class="btn btn-success"></div>
   <div class="container">
   <div class="row gy-5">
    <div class="col-4">
      <div class="p-3">
          <label class="fw-bold"> Question</label>
          <textarea type="text" name="question" id="" ></textarea>
          <input  class="insert" type="file" style="margin-bottom:20px;">
          <label class="fw-bold"> Answer</label>
          <textarea type="text" name="answer" id=""></textarea>
          <input   class="insert" type="file" style="margin-bottom:20px;">
        

      </div>
    </div>
<!-- end of row 1 -->
    <div class="col-4">
      <div class="p-3">
            <label class="fw-bold">Option 1</label>
            <textarea type="text" name="opt1" id=""></textarea>
            <input class="insert" type="file" style="margin-bottom:20px;">
            <label class="fw-bold">Option 2</label>
            <textarea type="text" name="opt2" id=""></textarea>
            <input type="file" style="margin-bottom:20px;">
            
      </div>
    </div>
    <!-- end of row 2 -->
    <div class="col-4">
      <div class="p-3">
            <label class="fw-bold">Option 3</label>
            <textarea type="text" name="opt3" id=""></textarea>
            <input  class="insert" type="file" style="margin-bottom:20px;">
            <label class="fw-bold">Option 4</label>
            <textarea type="text" name="opt4" id=""></textarea>
            <input  class="insert" type="file" style="margin-bottom:20px;">
      </div>
    </div>
    <!-- end of row 3 -->
   </div>

        
            

  
            
      
        
        
    
           
       
            
            
        
        

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

   