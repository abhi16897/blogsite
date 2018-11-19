<html>
<title>Post</title>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="<?php echo base_url();?>style/home.css" rel="stylesheet">
</head>
<body>

<?php 
if($posts){
foreach($posts as $p){?>
     <div class=" container container-body">
         <div class="row">
             <div class="col-md-2">
               <img alt="#" src="<?php echo base_url();?>images/<?php echo $p->image;?>" height='150px' width="150px" style="margin-top:10px;margin-bottom:10px;">
             </div>
             <div class="col-md-10">
               <h3 style="font-weight:bold;"><?php echo $p->title;?></h3>
               <p style="font-size:20px"><?php echo $p->blog_date?></p>
               <p style="font-size:20px;"><?php echo $p->content;?></p>
               <a href="<?php echo base_url();?>Viewer/readmore/<?php echo $p->id;?>">Read More</a>
             </div>
        </div>
    </div>
<?php }
}

else{
    ?>
    <div class="container container-body">
    <p style="text-align:center;font-weight:bold;">No posts Found Please add posts</p></div>
    <?php
}?>
</body>
</html>