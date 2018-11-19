<html>
<title>Home</title>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        <link href="<?php echo base_url();?>style/newpost.css" rel="stylesheet">

   
</head>
<body>

<?php 
include("nav.php");
    foreach($edit as $e){
        $title=$e->title;
        $content=$e->content;
        $image=$e->image;
        $id=$e->id;
    }
?>
    <div class="container container-body">
        <form action="<?php echo base_url();?>Edit/update/<?php echo $id;?>" method='post' enctype='multipart/form-data'>
            <label>Title</label><br>
            <input type='text' name="title" required value="<?php echo $title;?>">
            <label>Content</label>
            <br>
            
            <textarea rows="20" cols="100" name="content"  required ><?php echo $content;?>
            </textarea><br>
           <img src='<?php echo base_url()."images/".$image;?>' alt="please upload picture Here" height='250' width='300' id="uploadimage" required> 
           <input type='file' onchange="readURL(this);" name='userfile' required>
           <button class='btn btn-warning'> publish
            </button>
    </form>
    </div>
    <script>
    function readURL(input){
        if(input.files && input.files[0]){
            var reader =new FileReader();
            reader.onload=function(e){
            $('#uploadimage').attr('src',e.target.result).width(300).height(250);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>

</html>