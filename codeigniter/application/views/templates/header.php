<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <mata charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <title><?php echo $title ?></title>
    </head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">-->
            <!--</button>-->
            <div class="navbar-header">
                <img class="twitter-bird "alt="" src="https://dev.twitter.com/sites/default/files/images_documentation/bird_gray_32.png">              
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><?php if ($username) echo '<a href="#">'.$username.'</a>' ?></li>
                <li><?php echo '<a href="'.site_url($link_address).'">'.$link.'</a>' ?></li>
            </ul>
        </div>
    </div>