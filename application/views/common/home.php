<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Top of the Line Security</title>
<meta name="description" content="For all your security needs.">
<meta name="keywords" content="Top of the Line Security, Top of the Line Security Training, Security Personnel, Yonkers Security">
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.min.js" /></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/functions.js" /></script>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed:700,600,500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" media="all" href="<?php echo base_url();?>css/style.css">
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>favicon.ico">

<script>
	$(document).ready(function(){		
		$(".Extrude").each(
			function() {
				x = $(this).html();
				$(this).attr('title',x);
		})
	});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34503311-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
	<div id="main">
		<a href="<?php echo base_url(); ?>"><img src="../images/Topofthelinesecurity_logo_lg.png" class="HomeLogo"></a>
		<div class="HomePanel">
			<div class="HomeBanner" title="Security Personnel">
				<a href="<?php echo base_url()."personnel/about/"; ?>"><h1>Security<br>Detail</h1></a>
			</div>
			<div id="HomeContentLeft">
			<a href="<?php echo base_url()."personnel/about/"; ?>">
				<img class="HomeImage" src="../images/Topofthelinesecurity_HomeSecurityDetail.jpg">
			</a>
			<div class="HomeBulletsLeft">
					<div class="CourseInstanceHome"><a href="<?php echo base_url()."personnel/about/"; ?>">Residential and corporate security detail</a></div>
					<div class="CourseInstanceHome"><a href="<?php echo base_url()."personnel/about/"; ?>">Executive protection, schools and construction sites</a></div>
					<div class="CourseInstanceHome"><a href="<?php echo base_url()."personnel/about/"; ?>">Highly trained and certified personel</a></div>
					<div class="CourseInstanceHome"><a href="<?php echo base_url()."personnel/about/"; ?>">Security you can depend on. Any time. Any place.</a></div>
				</div>
			</div>
		</div>
		<div class="HomePanel">
				<div class="HomeBanner HomeBannerRight" title="Security Training">
					<a href="<?php echo base_url()."training/courses/"; ?>">
						<h1>Security<br>Training</h1>
					</a>
				</div>
			</a>
			<div id="HomeContentLeft">
				<a href="<?php echo base_url()."training/courses/"; ?>">
					<img class="HomeImage" src="../images/Topofthelinesecurity_Home_SecurityTraining.jpg">
				</a>
				<div class="HomeBulletsRight">
					<?PHP
					if($events_list[0]->events != '')
					{  
						$events_arr = explode(",",$events_list[0]->events);
						$total_events = count($events_arr);
						for($i=0;$i<$total_events;$i++)
						{    
							$EventURL = str_replace(" ", "_", "$events_arr[$i]");
							//echo "<br>Events: ".$events_list[0]->events;
							echo "<div class='CourseInstanceHome'><a href=".base_url()."training/courses/event/".$EventURL.">".$events_arr[$i]."</a></div>";
						}
					}    
					?>
					<div class="CourseInstanceHome">
						<a href="<?php echo base_url()."contact/"; ?>">Private Instruction</a>
					</div>
				</div>
			</div>
		</div>

		<div class="HomeClear"></div>
	</div>

<?php include("footer.php");?>