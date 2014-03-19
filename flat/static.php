<?php include(dirname(__FILE__).'/header.php'); ?>


			<div id="content" class="site-content" role="main">

				<article id="post-<?php echo $plxShow->staticId(); ?>" class="post-<?php echo $plxShow->staticId(); ?> page type-page status-publish hentry">
					<header class="entry-header">
						<h1 class="entry-title"><?php $plxShow->staticTitle(); ?></h1>
					</header>
					<div class="entry-content">

						<?php $plxShow->staticContent(); ?>
					
					</div>
				</article>

			</div>

<?php include(dirname(__FILE__).'/footer.php'); ?>
