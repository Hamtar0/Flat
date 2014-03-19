<?php include(dirname(__FILE__).'/header.php'); ?>

<h1 class="page-title"><?php $plxShow->lang('CATEGORIE'); ?> : <?php $plxShow->catName(); ?></h1>

<div id="content" class="site-content" role="main">
	<?php while($plxShow->plxMotor->plxRecord_arts->loop()): ?>
			
		<article id="post-<?php echo $plxShow->artId(); ?>" class="post-<?php echo $plxShow->artId(); ?> post type-post status-publish format-gallery hentry category-freebies tag-ui-design">

			<header class="entry-header">
				<h2 class="entry-title">
					<a href="<?php $plxShow->artUrl(); ?>" title="<?php $plxShow->artTitle(''); ?>" rel="bookmark"><?php $plxShow->artTitle(''); ?></a>
				</h2>
				<div class="entry-meta">
					<span class="entry-date"><a href="<?php $plxShow->artUrl(); ?>" rel="bookmark"><time class="entry-date" datetime="<?php $plxShow->artDate('#num_year(4)-#num_day-#num_month'); ?>"><?php $plxShow->artDate('#num_day #month #num_year(4)'); ?></time></a></span> <?php $plxShow->lang('BY'); ?> <span class="byline"><span class="author vcard"><a class="url fn n" href="<?php $plxShow->artUrl(); ?>#author" rel="author"><?php $plxShow->artAuthor() ?></a></span></span><span class="sep">·</span><?php $plxShow->artNbCom(); ?><span class="comments-link"></span>
				</div>
			</header>
			
			<?php if($plxShow->callHook('activate_thumb')== 1) : ?>
			<div class="entry-thumbnail">
				<?php ob_start(); 
				$plxShow->artContent($chapo=true);
				$content = ob_get_clean();
				$masque = '#<img.+src="(.+?)"#i'; preg_match($masque, $content, $resultats);
				$extension = pathinfo($resultats[1], PATHINFO_EXTENSION); ?>
			
				<?php if($extension['extension'] == ('jpg'||'jpeg'||'png'||'gif')) : ?>
				
					<a href="<?php $plxShow->artUrl(); ?>" title="Permalink to <?php $plxShow->artTitle(''); ?>" rel="bookmark"><img src="<?php echo $resultats[1]; ?>" class="attachment-post-thumbnail wp-post-image" alt="<?php $plxShow->artTitle(''); ?>" height="460" width="820"></a>
				
				<?php endif; ?>
			
				<?php if($extension['extension'] != ('jpg'||'jpeg'||'png'||'gif')) : ?>
			
				<?php endif; ?>
			</div>
	
			<div class="entry-content">
				<p><?php ob_start();
					$plxShow->artContent($chapo=true);
					$data = ob_get_clean();
				
					mb_internal_encoding("UTF-8");
					$str = strip_tags($data);
					$limit = 300; //Specify the length of the new substring
					if (strlen($data)>$limit) {
						if(substr($str, $limit, 1) != ' ' && ($l = mb_strrpos(mb_substr($str, 0, $limit), ' '))) {
							echo mb_substr($str, 0, $l).'...';
						} else {
							echo mb_substr($str, 0, $limit).'...';
						}
					} else { 
						echo strip_tags($data);
					}
					?></p>
					<p> <a href="<?php $plxShow->artUrl(); ?>" class="more-link"><?php $plxShow->lang('CONTINUE_READING'); ?></a></p>
			</div>
			<?php else : ?>
			<div class="entry-content">
				<?php $plxShow->artChapo(); ?>
			</div>
			<?php endif; ?>
	
		</article>
		<?php endwhile; ?>
				
		<nav class="navigation paging-navigation" role="navigation">
			<div class="nav-links">

				<?php $plxShow->pagination(); ?>
		
			</div>
		</nav>
	
			
	</div>


	<?php include(dirname(__FILE__).'/footer.php'); ?>