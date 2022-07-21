 <?php
    ob_start();  // output buffering for header() function later on.
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'] . "/cms";
    include $path . '/includes/read_file.php';
    include $path . '/includes/db.php';
    ?>
 <?php include "functions.php"; ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>SB Admin - Bootstrap Admin Template</title>
     <!-- Bootstrap Core CSS -->
     <link href="./css/bootstrap.min.css" rel="stylesheet">
     <!-- summernote -->
     <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
     <link rel="stylesheet" href="./css/summernote/summernote.css">
     <!-- <link rel="stylesheet" href="css/summernote.css"> -->
     <!-- Custom CSS -->
     <link href="./css/sb-admin.css" rel="stylesheet">
     <link rel="stylesheet" href="./css/adm_styles.css">
     <!-- Custom Fonts -->
     <link href="font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


 </head>

 <body>

     <script type="text/javascript" src="./js/chartsLoader.min.js"></script>
     <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->

     <?php
        if (!isset($_SESSION['role'])) {
            header("Location: ../index.php ");
        }
