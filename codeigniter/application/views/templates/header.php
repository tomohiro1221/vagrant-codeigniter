<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <mata charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <title><?php echo $title ?> -CodeIgniter 2 Tutorial</title>

        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.js"></script>

    </head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="twitter-bird"></span>
            </button>-->
            <div class="navbar-header">                
                <a class="navbar-brand">・twitter・</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <!--<li><a href="<?php echo $link_address?>"><?php echo $link?></a></li>-->
                <li><?php echo '<a href="'.$link_address.'">'.$link.'</a>' ?></li>
            </ul>
        </div>
    </div>