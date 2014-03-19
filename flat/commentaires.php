<?php if(!defined('PLX_ROOT')) exit; ?>

<div id="comments" class="comments-area">
	<?php if($plxShow->plxMotor->plxRecord_coms): ?>

		<h2 class="comments-title"><?php echo $plxShow->artNbCom(); ?></h2>

		<ol class="comment-list">
			
			<?php while($plxShow->plxMotor->plxRecord_coms->loop()): # On boucle sur les commentaires ?>
				
				<li id="<?php $plxShow->comId(); ?>" class="comment byuser comment-author-<?php $plxShow->comType(); ?> depth-1">
					<article id="div-comment-<?php $plxShow->comId(); ?>" class="comment-body">
						<footer class="comment-meta">
							<div class="comment-author vcard">
								<img alt="" src="http://1.gravatar.com/avatar/<?php echo md5( strtolower($plxShow->plxMotor->plxRecord_coms->f('mail')) ) ?>?s=80&amp;d=mm&amp;r=G" class="avatar avatar-80 photo" height="80" width="80"><b class="fn"><a href="<?php $plxShow->plxMotor->plxRecord_coms->f('site') ?>" rel="external nofollow" class="url"><?php $plxShow->comAuthor(); ?></a></b> <span class="says"><?php $plxShow->lang('SAID'); ?> :</span>	
							</div><!-- .comment-author -->

							<div class="comment-metadata">
								<a href="#comment-<?php $plxShow->comId(); ?>">
									<time datetime="<?php $plxShow->comDate('#num_year(4)-#num_month-#num_day #hour:#minute'); ?>">
										<?php $plxShow->comDate('#day #num_day #month #num_year(4) &#64; #hour:#minute'); ?></time>
									</a>
								</div><!-- .comment-metadata -->

							</footer><!-- .comment-meta -->

							<div class="comment-content">
								<p><?php $plxShow->comContent(); ?></p>
							</div><!-- .comment-content -->

							<div class="reply">
								<a class="comment-reply-link" href="#respond"><?php $plxShow->lang('REPLY'); ?></a>	
							</div><!-- .reply -->
						</article><!-- .comment-body -->
					</li><!-- #comment-## -->
	
			<?php endwhile; # Fin de la boucle sur les commentaires ?>
			
		</ol>
			<?php if( ! $plxShow->plxMotor->plxRecord_arts->f('allow_com') AND $plxShow->plxMotor->aConf['allow_com'] ): ?>
				<p class="no-comments"><?php $plxShow->lang('COMMENTS_CLOSED') ?>.</p>
			
			<?php endif; ?>

		<?php endif; ?>
		
		<?php if($plxShow->plxMotor->plxRecord_arts->f('allow_com') AND $plxShow->plxMotor->aConf['allow_com']): ?>
		
			<div id="form">
				<div id="respond" class="comment-respond">
					<h3 id="reply-title" class="comment-reply-title"><?php $plxShow->lang('WRITE_A_COMMENT') ?></h3>
					<form action="<?php $plxShow->artUrl(); ?>#respond" method="post" id="commentform" class="comment-form">
						<p class="comment-notes"><?php $plxShow->lang('EMAIL_NOT_PUBLISHED') ?></p>							
						<p class="comment-form-author">
							<label for="author"><?php $plxShow->lang('NAME') ?></label> 
							<input id="author" name="name" value="<?php $plxShow->comGet('name',''); ?>" size="30" aria-required="true" type="text" />
						</p>
						<p class="comment-form-email">
							<label for="email"><?php $plxShow->lang('EMAIL') ?></label> 
							<input id="email" name="mail" value="<?php $plxShow->comGet('mail',''); ?>" size="30" aria-required="true" type="email" />
						</p>
						<p class="comment-form-url"><label for="url"><?php $plxShow->lang('WEBSITE') ?></label> 
							<input id="url" name="site" value="<?php $plxShow->comGet('site',''); ?>" size="30" type="url" />
						</p>
						<p class="comment-form-comment">
							<label for="comment"><?php $plxShow->lang('COMMENT') ?></label> 
							<textarea id="comment" name="content" cols="45" rows="8" aria-required="true"><?php $plxShow->comGet('content',''); ?></textarea>
						</p>
						
						<?php if($plxShow->plxMotor->aConf['capcha']): ?>
							
							<p>
								<label for="id_rep"><?php echo $plxShow->lang('ANTISPAM_WARNING') ?></label>
								<?php $plxShow->capchaQ(); ?> :
								<input id="id_rep" name="rep" type="text" size="2" maxlength="1" />
							</p>
							
						<?php endif; ?>
						
						<?php $plxShow->comMessage('<div class="alert alert-warning">#com_message</div>'); ?>		
						<p class="form-submit">
							<input id ="submit" type="submit" value="<?php $plxShow->lang('SEND') ?>" />
						</p>
					</form>
				</div><!-- #respond -->
			</div>
				
		<?php endif; # Fin du if sur l'autorisation des commentaires ?>
	</div>