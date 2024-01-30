<?php
require("../inc/inc_koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin RumahIrfan.</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- Summernote image-list -->
    <link href="../css/summernote-image-list.min.css">
    <script src="../js/summernote-image-list.min.js"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Own CSS -->
    <link rel="icon" type="image/x-icon" href="https://coffective.com/wp-content/uploads/2018/06/icon-house-blue.png">
    <style>
        .image-list-content .col-lg-3 { width:100% }
        .image-list-content img{ float:left; width: 20%; }
        .image-list-content p { float: left; padding-left: 20px; }
        .image-list-item { padding: 10px 0px 10px 0px; }
    </style>
</head>

<body class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Admin Halaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Admin Tutors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Admin Partner</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Admin Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Logout>></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>