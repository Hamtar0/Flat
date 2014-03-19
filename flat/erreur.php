<?php include(dirname(__FILE__).'/header.php'); ?>

<div id="content" class="site-content" role="main">
	<h1 class="page-title"><?php $plxShow->lang('ERROR'); ?></h1>
	<div class="page-content">
		<p><?php $plxShow->erreurMessage(); ?></p>
	</div>
</div>

<?php include(dirname(__FILE__).'/footer.php'); ?>