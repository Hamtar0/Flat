<?php if(!defined('PLX_ROOT')) exit; ?>
<?php

# Control du token du formulaire
plxToken::validateFormToken($_POST);

if(!empty($_POST)) {
		$plxPlugin->setParam('activate_thumb', $_POST['activate_thumb'], 'numeric');
		$plxPlugin->setParam('site_title_font_family', $_POST['site_title_font_family'], 'string');
		$plxPlugin->setParam('global_font_family', $_POST['global_font_family'], 'string');
		$plxPlugin->setParam('heading_font_family', $_POST['heading_font_family'], 'string');
		$plxPlugin->setParam('sub_heading_font_family', $_POST['sub_heading_font_family'], 'string');
        $plxPlugin->saveParams();
        header('Location: parametres_plugin.php?p=hamFlat');
        exit;
}
$site_title_font_family =  $plxPlugin->getParam('site_title_font_family')=='' ? 'Amatic SC' : $plxPlugin->getParam('site_title_font_family');
$global_font_family =  $plxPlugin->getParam('global_font_family')=='' ? 'Roboto' : $plxPlugin->getParam('global_font_family');
$heading_font_family =  $plxPlugin->getParam('heading_font_family')=='' ? 'Roboto Slab' : $plxPlugin->getParam('heading_font_family');
$sub_heading_font_family =  $plxPlugin->getParam('sub_heading_font_family')=='' ? 'Roboto Condensed' : $plxPlugin->getParam('sub_heading_font_family');
$activate_thumb =  $plxPlugin->getParam('activate_thumb')=='' ? 1 : $plxPlugin->getParam('activate_thumb');
$site_title_font_family_choices = array(
      'Amatic SC' => 'Amatic SC',
      'Yesteryear' => 'Yesteryear',
      'Pacifico' => 'Pacifico',
      'Dancing Script' => 'Dancing Script',
      'Satisfy' => 'Satisfy',
      'Handlee' => 'Handlee',
      'Lobster' => 'Lobster',
      'Lobster Two' => 'Lobster Two'
    );
$global_font_family_choices = array(
      'Roboto' => 'Roboto',
      'Lato' => 'Lato',
      'Droid Sans' => 'Droid Sans',
      'Open Sans' => 'Open Sans',
      'PT Sans' => 'PT Sans',
      'Source Sans Pro' => 'Source Sans Pro'
    );
$heading_font_family_choices = array(
      'Roboto Slab' => 'Roboto Slab',
      'Droid Serif' => 'Droid Serif',
      'Lora' => 'Lora',
      'Bitter' => 'Bitter',
      'Arvo' => 'Arvo',
      'PT Serif' => 'PT Serif',
      'Rokkitt' => 'Rokkitt'
    );
$sub_heading_font_family_choices = array(
      'Roboto Condensed' => 'Roboto Condensed',
      'Open Sans Condensed' => 'Open Sans Condensed',
      'PT Sans Narrow' => 'PT Sans Narrow',
      'Dosis' => 'Dosis',
      'Abel' => 'Abel',
      'News Cycle' => 'News Cycle'
    );
?>
<h2><?php echo $plxPlugin->getInfo('title') ?></h2>
<div class="content-right">
	<p><?php echo $plxPlugin->getInfo('description') ?></p>
</div>
<div class="container pull-left">
<div class="panel panel-<?php echo $style; ?>">
  <div class="panel-body">
	  <form id="form_settings" role="form" action="parametres_plugin.php?p=hamFlat" method="post">
	  	<fieldset>
	  		<p class="field"><label for="id_activate_thumb">Activer le résumé automatique avec miniature (home.php, tags.php, categorie.php et archives.php)&nbsp;:</label></p>
	  		<?php plxUtils::printSelect('activate_thumb',array('1'=>L_YES,'0'=>L_NO),$activate_thumb); ?>
			<p class="field"><label for="id_site_title_font_family">Police du nom du site&nbsp;:</label></p>
			<?php plxUtils::printSelect('site_title_font_family', $site_title_font_family_choices, $site_title_font_family) ?>
			<p class="field"><label for="id_global_font_family">Police générale&nbsp;:</label></p>
			<?php plxUtils::printSelect('global_font_family', $global_font_family_choices, $global_font_family) ?>
			<p class="field"><label for="id_heading_font_family">Police des titres&nbsp;:</label></p>
			<?php plxUtils::printSelect('heading_font_family', $heading_font_family_choices, $heading_font_family) ?>
			<p class="field"><label for="id_sub_heading_font_family">Police des sous-titres&nbsp;:</label></p>
			<?php plxUtils::printSelect('sub_heading_font_family', $sub_heading_font_family_choices, $sub_heading_font_family) ?>
	  		<p>
	  			<?php echo plxToken::getTokenPostMethod() ?>
	  			<input type="submit" name="submit" value="Sauvegarder" />
	  		</p>
	  	</fieldset>
	  </form>
  </div>
</div>
</div>