<?php include(dirname(__FILE__).'/header.php'); ?>

<div id="content" class="site-content" role="main">

			
	<article id="post-<?php echo $plxShow->artId(); ?>" class="post-<?php echo $plxShow->artId(); ?> post type-post status-publish format-standard hentry <?php $plxShow->catName() ?> <?php $plxShow->artTags('tag-#tag_name',' ') ?>">

		<header class="entry-header">
			<h1 class="entry-title"><?php $plxShow->artTitle(''); ?></h1>
			<div class="entry-meta">
				<span class="entry-date"><a href="<?php $plxShow->artUrl(); ?>" rel="bookmark"><time class="entry-date" datetime="<?php $plxShow->artDate('#num_year(4)-#num_day-#num_month'); ?>"><?php $plxShow->artDate('#num_day #month #num_year(4)'); ?></time></a></span> <?php $plxShow->lang('BY'); ?> <span class="byline"><span class="author vcard"><a class="url fn n" href="<?php $plxShow->artUrl(); ?>#author" rel="author"><?php $plxShow->artAuthor(); ?></a></span></span><span class="sep">·</span><?php $plxShow->artNbCom(); ?><span class="comments-link"></span>
			</div>
		</header>

	
		<div class="entry-content">
			<?php $plxShow->artContent(); ?>
		</div>
	
		<div class="tags-links"><?php $plxShow->artTags('<a href="#tag_url" title="#tag_name" rel="tag">#tag_name</a>',' '); ?></div>
	</article>
	
	<?php 
	ob_start();
	$plxShow->artAuthorInfos('#art_authorinfos');
	$art_authorinfos = ob_get_clean();
	if ( !empty($art_authorinfos) ):
	?>
	
	<div id="author" class="author-info">
		<div class="author-avatar">
			<?php ob_start();
			$plxShow->artAuthorEmail();
			$email = ob_get_clean(); ?>
		
			<img alt="" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $email ) ) ); ?>?s=80&amp;r=G&amp;d=mm" class="avatar avatar-80 photo" height="80" width="80">
		</div>
		<?php $plxShow->artAuthorInfos('<div class="author-description"><h4>#art_author</h4>#art_authorinfos</div>'); ?>
	</div>
	
	<?php endif; ?>
	
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php $plxShow->lang('POST_NAVIGATION'); ?></h1>
		<div class="nav-links">
			<?php echo $plxShow->callHook('prevNext'); ?>
		</div>
	</nav>
    
	<?php include(dirname(__FILE__).'/commentaires.php'); ?>		
			
</div>
			
<?php include(dirname(__FILE__).'/footer.php'); ?>