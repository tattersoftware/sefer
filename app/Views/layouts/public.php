<?php
helper('auth');
?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!--Mobile meta-data -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="Sefer Project" />
	<meta name="keywords" content="sefer,books,ebook,read,scan,ocr,export" />
	<meta name="author" content="Tatter Software" />
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

	<title>Sefer</title>

	<!--Favicon 
	<link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	-->

	<?= service('assets')->css() ?>
	<?= service('alerts')->css() ?>
	<?= view('Tatter\Themes\Views\css') ?>
	<?= service('assets')->tag('vendor/jquery/jquery.min.js') ?>
	<?= $this->renderSection('pageStyles') ?>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand" href="<?= site_url() ?>">
			<i class="fas fa-book-reader"></i>
			Sefer
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

<?php
if (logged_in()):
?>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= site_url() ?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('books') ?>">Books</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('files') ?>">Files</a>
				</li>
			</ul>
			<a class="navbar-text" href="<?=route_to('logout') ?>" id="login"><i class="fas fa-sign-out-alt"></i> Logout</a>
    	</div>
<?php
else:
?>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= site_url() ?>">Home <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<a class="navbar-text" href="<?=route_to('login') ?>" id="login"><i class="fas fa-unlock-alt"></i> Login</a>
    	</div>
<?php
endif;
?>
	</nav>
	
	<?= service('alerts')->display() ?>
	
	<main role="main" class="container my-5 pb-5">
		<?= $this->renderSection('main') ?>
	</main>

	<footer class="footer">
		<div class="float-left mx-4">
			<?= themes_form('themed-select custom-select custom-select-sm') ?>
		</div>
		<div class="container">
			<div class="col text-muted text-center">&copy; <?=date("Y") ?> Sefer Project</div>
		</div>
	</footer>
	
	<script>
		var baseUrl = "<?= base_url() ?>";
		var siteUrl = "<?= site_url() ?>";
		var apiUrl  = "<?= site_url('api/') ?>";
	</script>
	
	<?= service('assets')->js() ?>

	<?= $this->renderSection('pageScripts') ?>
</body>
</html>
