  
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>



		<div id="header">

			<h1>190M Music Songlist Viewer</h1>
			<h2>Search Through Your Songlists and Music</h2>
		</div>


		<div id="listarea">
			<ul id="musiclist">

                 <?php
                
                    $Songlist;

                    if(isset($_Request['Songlist']) && $_Request['Songlist']=='mypicks.txt'){
                    	$Songlist = file("songs/mypicks.txt");
                    foreach ($Songlist as $song) { ?>
	                    <li class="mp3item">
	                        <a href="<?= 'songs/'.$song ?>"><?= $song ?></a>
	                    </li>
                    <?php }}else{ ?>
		        <?php
		        $path="songs/";
		                foreach (glob($path."*.mp3") as $song) {          ?>

		                <?php $size;
		                if(filesize($song)>=1024){
		                	$size=round(filesize($song)/1024,2)." Kilobyte";}
		                if(filesize($song)>=1048576){
		                	$size=round(filesize($song)/1048576,2)." Megabyte";}
		                else{
		                	$size=filesize($song)." byte";}
		                ?>
		                <li class="mp3item"> <a href="<?php echo $song;?>">
		                    <?php echo basename($song);?> </a> <?=$size ?> </li>
		                <?php }
		                    foreach (glob($path."*.txt") as $song) { ?>
		                <li class="Songlistitem"> <a href="<?php echo $song."?Songlist=".basename($song);?>">
		                    <?php echo basename($song);?> </a><?=$size ?></li>
		                <?php } }?>

          </ul>
		</div>
	</body>
</html>