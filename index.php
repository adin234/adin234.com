<?php 
	ini_set('memory_limit', '-1');
	$accessToken = "AQWxKAOSgB9tDQcuaKS8qP2Gjrmi3J0-_BMYkuI8SVnsKS0n4GhFoJw4CtyHzuTZc4piZzLBzF29RKUIuAV1Fc5OAlShQ5Um-2GpNDcgDW6voYrk5akmS818kuewjx_jByW7fEYWOPGzvSaNqbqSgOVRh2G-muWVac58vNcqWvKOuCaAHSU";
	$id = '245746288';
	

	require('lib/simple_html_dom.php');
	$linkedin = file_get_html("http://ph.linkedin.com/pub/aldrin-bautista/6a/372/354");

	//die(htmlentities($linkedin));
	$test = $linkedin->find('.project');
	$projects = array();
	foreach ($test as $key => $value) {
		$new = $value->find('h3 a');
		if(isset($new[0])) {
			preg_match("/.*\?url=(.+).*/", $new[0]->href, $matches);
			$summary = $value->find('div p');
			if(isset($summary[0])) {
				$summary = ltrim($summary[0]->innertext);
			} else {
				$summary = '';
			}

			$link = explode('&', $matches[1]);
			$link = $link[0];

			$projects[] = array(
				'link'		=> urldecode($link),
				'name'		=> ltrim($new[0]->innertext),
				'summary'	=> $summary
			);
		}
	}

	$basicInfo = file_get_contents("https://api.linkedin.com/v1/people/~:(id,first-name,last-name,positions,headline,location,summary,specialties,email-address,skills,educations,date-of-birth)?oauth2_access_token=$accessToken&format=json");
	$basicInfo = json_decode($basicInfo, true);

	function monthToWord($month) {
		$array = array('', 	'January', 	'February', 	'March',
							'April', 	'May', 			'June',
							'July',		'August', 		'September', 
							'October',	'November', 	'December');
		return $array[$month];
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport"    content="width=device-width, initial-scale=1.0">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" href="css/index.css" />
		<link rel="shortcut icon" href="images/favicon.png">
		<title>Aldrin Bautista(adin234)</title>

		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-50160042-1', 'adin234.com');
			ga('send', 'pageview');
		</script>
	</head>
	<body class="theme-invert">
		<nav class="mainmenu">
			<div class="container">
				<div class="dropdown">
					<button type="button" class="navbar-toggle" data-toggle="dropdown"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<!-- <a data-toggle="dropdown" href="#">Dropdown trigger</a> -->
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li><a href="#home" class="active">Welcome</a></li>
						<li><a href="#about">About me</a></li>
						<li><a href="#works">Works</a></li>
						<li><a href="#contact">Contact Me</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<section class="section" id="home" style="display:block">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">
						<h1 class="heading">adin234</h1>
						<h2 class="subheading">Full-stack Web Developer, Philippines</h2>
						<span class="content">
							Young. Undergraduate. Adventurous. Curious. Actor<br/>
							Computer Science. UPLB. Free. Student Leader<br/>
							KDCI. &lt;OpenovateLabs/&gt;. any.TV
						</span>
					</div>
				</div>
			</div>
		</section>

		<section class="section" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">
						<a href="http://ph.linkedin.com/pub/aldrin-bautista/6a/372/354/"><i class="fa fa-linkedin fa-4x"></i></a>
						<a href="https://github.com/adin234"><i class="fa fa-github fa-4x"></i></a>
						<a href="http://gplus.to/adin234"><i class="fa fa-google-plus fa-4x"></i></a>
						<a href="https://www.facebook.com/adin234"><i class="fa fa-facebook fa-4x"></i></a>
						<a href="skype:adin234?call"><i class="fa fa-skype fa-4x"></i></a>
						<a href="http://adin234.tumblr.com/"><i class="fa fa-tumblr fa-4x"></i></a>
						<a href="http://www.twitter.com/adin234"><i class="fa fa-twitter fa-4x"></i></a>
						<a href="mailto:adinbautista@gmail.com"><i class="fa fa-envelope fa-4x"></i></a>
					</div>
				</div>
			</div>
		</section>

		<section class="section" id="works">
			<div class="container">
				<div class="row">
					<div id="projects" class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">
						<?php foreach($projects as $key =>  $project): ?>
							<div class="project col-md-4 col-lg-4" style="z-index: <?php echo count($projects)-$key; ?>">
								<a class="img-container" target="_blank" href="<?php echo $project['link']; ?>">
									<img src="http://immediatenet.com/t/l?Size=1280x768&URL=<?php echo $project['link']; ?>" />
								</a>
								<a target="_blank" href="<?php echo $project['link']; ?>" class="projectName"><?php echo $project['name']; ?> </a>
								<p class="description">
									<?php echo $project['summary']; ?>
								</p>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>

		<section class="section" id="about">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">
						<div class="img-container">
							<img src="images/aldrin.jpg" />
						</div>
						<span class="name">
							<?php echo $basicInfo['firstName'].' '.$basicInfo['lastName']; ?>
						</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5 col-lg-5 col-md-offset-1 col-lg-offset-1 text-left">
						<h3 class="heading">Summary</h3>
						<p class="summary">
							<?php echo $basicInfo['summary']; ?>
						</p>
					</div>
					<div class="col-md-5 col-lg-5 col-md-offset-1 col-lg-offset-1 text-center">
						<h3 class="heading">Education</h3>
						<ul class="education">
							<?php foreach ($basicInfo['educations']['values'] as $key => $value) : ?>
								<li>
									<dl>
										<dt><?php echo $value['schoolName']; ?> (<?php echo $value['startDate']['year'].'-'.(isset($value['endDate']['year']) ? $value['endDate']['year'] : 'Present');?>)</dt>
										<dd><?php echo $value['degree'].' '.$value['fieldOfStudy']; ?></dd>
									</dl>
								</li>
							<?php endforeach; ?>
						</ul>
						<h3 class="heading">Skills</h3>
						<div class="skills-container clearfix">
						<?php foreach ($basicInfo['skills']['values'] as $key => $value) : ?>
							<div class="skill-container clearfix">
								<i class="fa fa-check"></i> 
								<span class="skill"><?php echo $value['skill']['name']; ?></span>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">
						<h3 class="heading">Work Experience</h3>
						<ul class="education">
							<?php foreach ($basicInfo['positions']['values'] as $key => $value) : ?>
								<li>
									<dl>
										<dt><?php echo $value['company']['name']; ?> (<?php echo monthToWord($value['startDate']['month']).' '.$value['startDate']['year'].' - '.(isset($value['endDate']['year']) ? monthToWord($value['endDate']['month']).' '.$value['endDate']['year'] : 'Present');?>)</dt>
										<dd><?php echo $value['title']; ?></dd>
									</dl>
									<?php if(isset($value['summary'])): ?>
									<p class="description">
										<?php echo $value['summary']; ?>
									</p>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/modernizer.js"></script>
		<script type="text/javascript" src="js/masonry.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>