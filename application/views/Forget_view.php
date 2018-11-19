<html>
    <head>
        <title>Forget password</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="<?php echo base_url();?>style/loginstyle.css" rel="stylesheet">
    </head>
    <body>
        <div class="container container-body"> 
            <div id="form_login" align="center">
                <form action="<?php echo base_url();?>Login/retain" method="post">
                        <h2>FORGET PASSWORD</h2>
                        <span class="text-success"><?php if($this->session->flashdata('emailsucsess')){
                            echo $this->session->flashdata('emailsucsess');
                        } ?></span>
                        <span class="text-danger"><?php if($this->session->flashdata('emailerror')){
                            echo $this->session->flashdata('emailerror');
                        } ?></span><br>
                        <input type="text" id="username" placeholder="Enter email" name="username"><br>
                     <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </body>
</html>