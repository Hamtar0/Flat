<?php if (!defined('PLX_ROOT')) exit; ?>
<!DOCTYPE html>
<html lang="<?php $plxShow->defaultLang() ?>">
<head>
<meta charset="<?php $plxShow->charset('min'); ?>">
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
<title><?php $plxShow->pageTitle(); ?></title>
<?php $plxShow->meta('description') ?>
<?php $plxShow->meta('keywords') ?>
<?php $plxShow->meta('author') ?>
<link id="flat-style-css" media="all" type="text/css" href="<?php $plxShow->template(); ?>/style.css?ver=1.2.10" rel="stylesheet"></link>
<link id="flat-template-css" media="all" type="text/css" href="<?php $plxShow->template(); ?>/assets/css/template.css?ver=1.2.10" rel="stylesheet"></link>
<?php $plxShow->templateCss() ?>
<?php $plxShow->pluginsCss() ?>
<link rel="alternate" type="application/rss+xml" title="<?php $plxShow->lang('ARTICLES_RSS_FEEDS') ?>" href="<?php $plxShow->urlRewrite('feed.php?rss') ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php $plxShow->lang('COMMENTS_RSS_FEEDS') ?>" href="<?php $plxShow->urlRewrite('feed.php?rss/commentaires') ?>" />
<!--[if lt IE 9]>
<script src="<?php $plxShow->template(); ?>/assets/js/html5shiv.js"></script>
<![endif]-->
<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<style type="text/css" id="custom-background-css">
body.custom-background { background-image: url('<?php $plxShow->template(); ?>/assets/img/default-background.jpg'); background-repeat: no-repeat; background-position: top left; background-attachment: fixed; }
</style>
</head>

<body class="<?php
	$var = $plxShow->mode();
	if ($var == 'home') {
	echo "home blog ";
	}
	elseif ($var == 'article') {
	echo "single single-post postid-".$plxShow->artId()." single-format-standard ";
	}
	elseif ($var == 'static') {
	echo "page page-id-".$plxShow->staticId()." page-template-default ";
	}
	else {
		echo "";
	} ?>custom-background">
<div id="page">
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-left">
			<div id="secondary" class="col-lg-3">
				<header id="masthead" class="site-header" role="banner">
					<div class="hgroup">
						<h1 class="site-title display-title"><a href="<?php $plxShow->racine(); ?>" title="<?php $plxShow->mainTitle(''); ?>" rel="home"><?php $plxShow->mainTitle(''); ?></a></h1><h2 class="site-description"><?php $plxShow->subTitle(); ?></h2>					</div>
					<button type="button" class="btn btn-link hidden-lg toggle-sidebar" data-toggle="offcanvas"><i class="fa fa-gear"></i></button>
					<button type="button" class="btn btn-link hidden-lg toggle-navigation" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
					<nav id="site-navigation" class="navigation main-navigation navbar-collapse collapse" role="navigation">
						<ul id="menu-main-nav" class="nav-menu"><li id="menu-item-16" class="fa fa-home menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-16"><a href="<?php $plxShow->racine() ?>">Home</a></li>
							<?php $plxShow->staticList('','<li id="menu-item-#static_id" class="fa fa-star menu-item menu-item-type-post_type menu-item-object-page menu-item-#static_id"><a href="#static_url" class="#static_status" title="#static_name">#static_name</a></li>'); ?>
							
							<li id="menu-item-48" class="fa fa-bars menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-48"><a href="#"><?php $plxShow->lang('CATEGORIES'); ?></a>
							<ul class="sub-menu">
								<?php $plxShow->catList('','<li id="menu-item-#cat_id" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-#cat_id"><a href="#cat_url" title="#cat_name">#cat_name</a></li>'); ?>
							</ul>
							</li>
</ul>					</nav>
				</header>
				
				<div class="sidebar-offcanvas"><?php include(dirname(__FILE__).'/sidebar.php'); ?></div>
			</div>
			<div id="primary" class="content-area col-lg-9">