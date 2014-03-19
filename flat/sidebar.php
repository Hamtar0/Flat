<?php if(!defined('PLX_ROOT')) exit; ?>
<div id="main-sidebar" class="widget-area" role="complementary">
	<aside id="recent-comments-2" class="widget widget_recent_comments">
		<h3 class="widget-title"><?php $plxShow->lang('LATEST_COMMENTS'); ?></h3>
		<ul id="recentcomments">
			<?php $plxShow->lastComList('<li class="recentcomments"><a href="#com_url">#com_author '.$plxShow->getLang('SAID').' : #com_content(34)</a></li>'); ?>
		</ul>
	</aside>			
	<aside id="archives-2" class="widget widget_archive">
		<h3 class="widget-title"><?php $plxShow->lang('ARCHIVES'); ?></h3>
		<ul>
			<?php $plxShow->archList('<li id="#archives_id"><a class="#archives_status" href="#archives_url" title="#archives_name">#archives_name</a> (#archives_nbart)</li>'); ?>
		</ul>
	</aside>
	<aside id="recent-posts-2" class="widget widget_recent_entries">		
		<h3 class="widget-title"><?php $plxShow->lang('LATEST_ARTICLES'); ?></h3>
		<ul>
			<?php $plxShow->lastArtList('<li><a class="#art_status" href="#art_url" title="#art_title">#art_title</a></li>'); ?>
		</ul>
	</aside>
	<aside id="categories-2" class="widget widget_categories">
		<h3 class="widget-title"><?php $plxShow->lang('CATEGORIES'); ?></h3>
		<ul>
			<?php $plxShow->catList('','<li class="cat-item cat-item-#cat_id" id="#cat_id"><a class="#cat_status" href="#cat_url" title="#cat_name">#cat_name</a> (#art_nb)</li>'); ?>
		</ul>
	</aside>
	<aside id="meta-2" class="widget widget_meta"><h3 class="widget-title">Meta</h3>
		<ul>
			<li><a rel="nofollow" href="<?php $plxShow->urlRewrite('core/admin/'); ?>" title="<?php $plxShow->lang('ADMINISTRATION') ?>"><?php $plxShow->lang('ADMINISTRATION') ?></a></li>
			<li><a href="<?php $plxShow->urlRewrite('feed.php?rss') ?>" title="<?php $plxShow->lang('ARTICLES_RSS_FEEDS'); ?>"><?php $plxShow->lang('ARTICLES'); ?></a></li>
			<li><a href="<?php $plxShow->urlRewrite('feed.php?rss/commentaires'); ?>" title="<?php $plxShow->lang('COMMENTS_RSS_FEEDS') ?>"><?php $plxShow->lang('COMMENTS'); ?></a></li>
		</ul>
	</aside>
</div>