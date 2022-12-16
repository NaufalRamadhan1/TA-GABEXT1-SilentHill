<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Customer</title>

    
    <!-- import fontawesome (CSS) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- import file "style.css" -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css")?>" />
</head>
<body>

    <!-- buat area untuk entry data -->
    <?php $this->load->view('partials/navbar.php'); ?>
    <div class="row"> 
        <div class="column">
            <img src="<?= base_url('ext/img/1.png') ?>" style="width:100%">
            <img src="<?= base_url('ext/img/2.png') ?>" style="width:100%">
            <img src="<?= base_url('ext/img/3.png') ?>" style="width:100%">
            <img src="<?= base_url('ext/img/4.png') ?>" style="width:100%">
            <img src="<?= base_url('ext/img/5.png') ?>" style="width:100%">
        </div>
        
        <div class="column">
            <img src="<?= base_url('ext/img/6.png') ?>" style="width:100%">
            <img src="<?= base_url('ext/img/7.png') ?>" style="width:100%">
            <img src="<?= base_url('ext/img/8.png') ?>" style="width:100%">
            <img src="<?= base_url('ext/img/9.png') ?>" style="width:100%">
            <img src="<?= base_url('ext/img/10.png') ?>" style="width:100%">
        </div> 
        
    </div>
       
    <!-- buat menu/button save -->
    
    <?php $this->load->view('partials/footer.php'); ?>
</body>

</html>