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
        <link href="<?php echo base_url();?>style/settings.css" rel="stylesheet">
</head>
<body>

<?php 
include("nav.php");
if($pic){
foreach($pic as $p){
    $user=$p->username;
    $image=$p->image;
    $blog_id=$p->blog_id;
}
}
?>
<div class="row">
    <div class="col-md-4 co">
            <img src ="<?php echo base_url();?>images/<?php echo $image?>" height="250px" width="250px" id="uploadimage">
            <form action="<?php echo base_url();?>Settings/picupload" method="post" enctype='multipart/form-data'>
              <label style="margin-left:30px;font-weight:bold;margin-top:10px;">update profile pic:</label>  <input type="file"onchange="readURL(this);" name='userfile' >
                <input type="submit" class="btn btn-warning"> 
            </form>
    </div>
    <div class="col-md-8">
        <label  style="margin-left:30px;font-weight:bold;">Username:</label>
        <br>
        <span style="margin-left:70px;font-weight:bold;font-size:20px; margin-top:20px;"><?php echo $user;?></span>
        <input type="submit" class="extract" value="edit" >
        <div id="demo" class='ping' >
            <form action="<?php echo base_url();?>Settings/userupdate" method="post">
                <input type="text" name="user" placeholder="Enter Username">
                <span class="text-danger"><?php echo form_error("user");?></span>
                <input type="submit"  value="update">
            </form>
        </div><hr>
        <label  style="margin-left:30px;font-weight:bold;">Password:</label>
        <br>
        <input type="submit" class="extract1" value="edit"  style="margin-left:140px;">
        <div id="demo1" class='ping' >
            <form action="<?php echo base_url();?>Settings/passwordupdate" method="post">
                <input type="text" name="oldp" placeholder="Enter old Password">
                <input type="text" name="newp" placeholder="Enter new Password">
                <input type="submit"  value="update" >
            </form>
        </div>
        <hr>
        <label style="margin-left:30px;font-weight:bold;">Blog Id:</label>
        <span class="text-danger"><?php if($this->session->flashdata('blogid')){
            echo $this->session->flashdata('blogid');
        }?></span>
        <form action="<?php echo base_url();?>Settings/blogupdate" method="post">
        <input type="text" name="blog_id" value="<?php echo $blog_id;?>">
        <input type="submit" value="Update">
        </form>
    <h4 style="margin-left:30px;">Link:</h4>
    <a target="_blank" style="margin-left:100px;" href="<?php echo base_url();?>Viewer/posts/<?php echo $blog_id?>"><?php echo base_url();?>Viewer/posts/<?php echo $blog_id?></a>
    </div>
</div>
</body>
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

$(document).ready(function(){
	$('#demo').hide(); 
    $(".extract").click(function(){
        $("#demo").slideToggle();	
    });
});
$(document).ready(function(){
	$('#demo1').hide();
    $(".extract1").click(function(){
        $("#demo1").slideToggle();	
    });
});
    </script>
</html>