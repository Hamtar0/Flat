<?php if(!defined('PLX_ROOT')) exit; ?>
<?php

# Control du token du formulaire
plxToken::validateFormToken($_POST);

if(!empty($_POST)) {
		$plxPlugin->setParam('activate_thumb', $_POST['activate_thumb'], 'numeric');
        $plxPlugin->saveParams();
        header('Location: parametres_plugin.php?p=hamFlat');
        exit;
}
$activate_thumb =  $plxPlugin->getParam('activate_thumb')=='' ? 1 : $plxPlugin->getParam('activate_thumb');
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
	  		<p>
	  			<?php echo plxToken::getTokenPostMethod() ?>
	  			<input type="submit" name="submit" value="Sauvegarder" />
	  		</p>
	  	</fieldset>
	  </form>
  </div>
</div>
</div>