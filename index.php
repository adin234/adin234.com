<?php 
	$accessToken = "AQWxKAOSgB9tDQcuaKS8qP2Gjrmi3J0-_BMYkuI8SVnsKS0n4GhFoJw4CtyHzuTZc4piZzLBzF29RKUIuAV1Fc5OAlShQ5Um-2GpNDcgDW6voYrk5akmS818kuewjx_jByW7fEYWOPGzvSaNqbqSgOVRh2G-muWVac58vNcqWvKOuCaAHSU";
	$id = '245746288';
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

		<section class="section" id="works">
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
		<script src="js/modernizer.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>