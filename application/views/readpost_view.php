<html>
<title>Home</title>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="<?php echo base_url();?>style/readmore.css" rel="stylesheet">
</head>
<body>
    <?php include("nav.php");
    foreach($con as $c){
        $title=$c->title;
        $date=$c->blog_date;
        $image=$c->image;
        $content=$c->content;
        $user=$c->user;
 
    } 
    ?>
<!--<img src="<?php echo base_url();?>images/black.jpg" width="100%" height="60%">-->
<div class=" container container-body">
<h1><?php echo $title;?></h1>
<h4><?php echo date("d-m-Y", strtotime($date));?></h4>
<p style="font-weight:bold; float:right ;margin-right:40px;" > by <?php echo $user;?>..</p>
<img alt="#" src="<?php echo base_url();?>images/<?php echo $c->image;?>">
<h4>Description:</h4>
<p style="margin-left:10px;"><?php echo $content;?></p>
<hr>
        <h4>Comment</h4>
        <form action="<?php echo base_url();?>Viewer/insertcomment/<?php echo $c->id;?>" method="post">
        <input type="text" name="comment" id="com">
        <input type="submit" value="post" >
        </form>
    <hr>
    <h4>Comments</h4>
   <?php if($com){
        foreach($com as $p){?>
       <div id="com">
           <span> <?php echo $p->user;?></span>
           <span><?php echo date("d-m-Y", strtotime($p->cm_date));?></span><br>
            <p> <?php echo $p->comment;?></p>
            <?php if($this->session->userdata('userid')==$p->user){ ?>
            <a href="<?php echo base_url();?>Edit/deletecomment/<?php echo $p->c_id;?>">delete</a><br>
            <?php $p=$this->uri->segment(3);
            $this->session->set_userdata('postid',$p);
            }?>
            <hr>
       </div>

    <?php
        } }else{?>
    <div><p>No Comments Found For this Post</p></div>
    <?php }?>
</div>
</body>
</html> 