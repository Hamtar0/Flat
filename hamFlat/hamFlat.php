<?php
/**
 * Plugin hamRSS
 *
 * @version        1.0
 * @date        14/03/2014
 * @author        Damien Guillot
 **/
class hamFlat extends plxPlugin {

        /**
         * Constructeur de la classe
         *
         * @param        default_lang        langue par défaut
         * @return        stdio
         * @author        Stephane F
         **/
        public function __construct($default_lang) {

        # appel du constructeur de la classe plxPlugin (obligatoire)
        parent::__construct($default_lang);

                # droits pour accèder à la page config.php du plugin
                $this->setConfigProfil(PROFIL_ADMIN);

        # déclaration des hooks
				$this->addHook('plxShowPagination', 'plxShowPagination');
				$this->addHook('prevNext', 'prevNext');
				$this->addHook('activate_thumb', 'activate_thumb');
				$this->addHook('ThemeEndHead', 'ThemeEndHead');
    }
	
		public function plxShowPagination() {
			$string = '
			
			# On effectue l\'affichage
			if($this->plxMotor->page > 1) # Si la page active > 1 on affiche un lien page precedente
				echo "<div class=\"nav-previous\"><a href=\"".$p_url."\" title=\"".L_PAGINATION_PREVIOUS_TITLE."\"><i class=\"fa fa-chevron-left\"></i></a></div>";
			
			if($this->plxMotor->page < $last_page) # Si la page active < derniere page on affiche un lien page suivante
				echo "<div class=\"nav-next\"><a href=\"".$n_url."\" title=\"".L_PAGINATION_NEXT_TITLE."\"><i class=\"fa fa-chevron-right\"></i></a></div>";
				
			# Affichage de la page courante
			printf("<div class=\"nav-current-page\">".L_PAGINATION."</div>",$this->plxMotor->page,$last_page);

			return true;
			';
			echo "<?php ".$string." ?>";
		}
		
			/**
		* Méthode permettant d'afficher les liens vers les articles précédent et suivant de l'ensemble des articles
		*
		* @author Stéphane F., DanielSan, Cyril MAGUIRE
		*/
		public function prevNext() {
			$formatPrev = '<a href="#prevUrl" title="#prevTitle" rel="prev"><span class="meta-nav">&larr;</span> #prevTitle</a> ';
			$formatNext = ' <a href="#nextUrl" title="#nextTitle" rel="next">#nextTitle <span class="meta-nav">&rarr;</span></a>';

			$plxShow = plxShow::getInstance();
			$ordre = preg_match('/asc/',$plxShow->plxMotor->tri)?'sort':'rsort';
			$links = '';

			$aFiles = $plxShow->plxMotor->plxGlob_arts->query('/[0-9]{4}.[home|0-9,]*.[0-9]{3}.[0-9]{12}.[a-z0-9-]+.xml$/','art',$ordre,0,false,'before');

			$key = array_search(basename($plxShow->plxMotor->plxRecord_arts->f('filename')), $aFiles);
			$prevUrl = $prev = isset($aFiles[$key-1])? $aFiles[$key-1] : false;
			$nextUrl = $next = isset($aFiles[$key+1])? $aFiles[$key+1] : false;

			$plxGlob_arts = clone $plxShow->plxMotor->plxGlob_arts;

			if($prev AND preg_match('/([0-9]{4}).[home|0-9,]*.[0-9]{3}.[0-9]{12}.([a-z0-9-]+).xml$/',$prev,$capture))
				$prevUrl=$plxShow->plxMotor->urlRewrite('?article'.intval($capture[1]).'/'.$capture[2]);
			if ($prev){
				$art = $plxShow->plxMotor->parseArticle(PLX_ROOT.$plxShow->plxMotor->aConf['racine_articles'].$prev);
				$nextTitle = STRIP_TAGS($art['title']);
			}
			if($next AND preg_match('/([0-9]{4}).[home|0-9,]*.[0-9]{3}.[0-9]{12}.([a-z0-9-]+).xml$/',$next,$capture))
				$nextUrl=$plxShow->plxMotor->urlRewrite('?article'.intval($capture[1]).'/'.$capture[2]);
			if ($next) {
				$art = $plxShow->plxMotor->parseArticle(PLX_ROOT.$plxShow->plxMotor->aConf['racine_articles'].$next);
				$prevTitle = STRIP_TAGS($art['title']);
			}
			if($ordre=='rsort') {
				$dummy=$prevUrl; $prevUrl=$nextUrl; $nextUrl=$dummy;
			}
			if($prevUrl) {
				$links = str_replace('#prevUrl', $prevUrl, $formatPrev);
				$links = str_replace('#prevTitle', $prevTitle, $links);
			}
			if($nextUrl) {
				$links .= str_replace('#nextUrl', $nextUrl, $formatNext);
				$links = str_replace('#nextTitle', $nextTitle, $links);
			}
			return $links;
		}
		
		public function activate_thumb() {
			if($this->getParam('activate_thumb')) {
				return $this->getParam('activate_thumb');
			}
		}
		
		public function ThemeEndHead() { ?>
			<script type="text/javascript">
			/* <![CDATA[ */
			if (typeof jQuery == 'undefined') {
				document.write('<script type="text\/javascript" src="<?php echo PLX_PLUGINS ?>hamFlat\/js/jquery-1.10.2.min.js"><\/script>');
			}
			/* ]]> */
			</script>

			<?php
		}

}
?>