<html>
<head>
    <link rel="stylesheet" type="text/css" href="floatingNews.css">
    <script type="text/javascript"
    	src="http://code.jquery.com/jquery-1.6.js"></script>  	
</head>
<body>

<form action="index.php">
    <button class="button button1" name="insert" value="Preferences">
    	Preferences
    </button>
</form>

<?php
include_once 'floatingNews.php';

$floatingNews = new floatingNews();

if( isset($_POST['numPosts'] )){
    $floatingNews->setNumberofFeedItems($_POST['numPosts']);
}

if( isset($_POST['source'] )){
    $floatingNews->setNewsSources($_POST['source']);
}


$feed = $floatingNews->getFeed();
$floatingNews->pushFeedToScreen($feed);

?>
</body>
</html>