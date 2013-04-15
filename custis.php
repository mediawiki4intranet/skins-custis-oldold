<?php
/**
 * Custis Skin for MediaWiki
 * Very old and unmaintained for some time - will probably have errors
 * when installed on a fresh MediaWiki version.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */

if( !defined( 'MEDIAWIKI' ) )
	die();

/** */
require_once('includes/SkinTemplate.php');

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */
class SkinCustis extends SkinTemplate {
	/** Using Custis. */
	function initPage( OutputPage $out ) {
		SkinTemplate::initPage( $out );
		$this->skinname  = 'custis';
		$this->stylename = 'custis';
		$this->template  = 'CustisTemplate';
	}
}

/**
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */
class CustisTemplate extends QuickTemplate {
	/**
	 * Template filter callback for Custis skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {
  	foreach($this->data['sidebar']['navigation'] as $key => $val) {
  	      if ($val['id']=='n-sitesupport'){
             unset($this->data['sidebar']['navigation'][$key]);
          } 
    }		
		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
  <head>
    <meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
    <?php $this->html('headlinks') ?>
    <title><?php $this->text('pagetitle') ?></title>
		<style type="text/css" media="screen, projection">/*<![CDATA[*/
			@import "<?php $this->text('stylepath') ?>/common/shared.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";
			@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/main.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";
		/*]]>*/</style>
		<link rel="stylesheet" type="text/css" <?php if(empty($this->data['printable']) ) { ?>media="print"<?php } ?> href="<?php $this->text('stylepath') ?>/common/commonPrint.css?<?php echo $GLOBALS['wgStyleVersion'] ?>" />
		<!--[if lt IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE50Fixes.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";</style><![endif]-->
		<!--[if IE 5.5000]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE55Fixes.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";</style><![endif]-->
		<!--[if IE 6]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE60Fixes.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";</style><![endif]-->
		<!--[if IE 7]><style type="text/css">@import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/IE70Fixes.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";</style><![endif]-->
		<!--[if lt IE 7]><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/IEFixes.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"></script>
		<meta http-equiv="imagetoolbar" content="no" /><![endif]-->
		
		<?php print Skin::makeGlobalVariablesScript( $this->data ); ?>
                
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath' ) ?>/common/wikibits.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"><!-- wikibits js --></script>
		<!-- Head Scripts -->
<?php $this->html('headscripts') ?>
<?php	if($this->data['jsvarurl'  ]) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl'  ) ?>"><!-- site js --></script>
<?php	} ?>
<?php	if($this->data['pagecss'   ]) { ?>
		<style type="text/css"><?php $this->html('pagecss'   ) ?></style>
<?php	}
		if($this->data['usercss'   ]) { ?>
		<style type="text/css"><?php $this->html('usercss'   ) ?></style>
<?php	}
		if($this->data['userjs'    ]) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs' ) ?>"></script>
<?php	}
		if($this->data['userjsprev']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>"><?php $this->html('userjsprev') ?></script>
<?php	}
		if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>








  </head>
  
  <body <?php if(!empty($this->data['body_ondblclick'])) { ?>ondblclick="<?php $this->text('body_ondblclick') ?>"<?php } ?>
        <?php if(!empty($this->data['body_onload'    ])) { ?>onload="<?php     $this->text('body_onload')     ?>"<?php } ?>
        <?php if(!empty($this->data['nsclass'        ])) { ?>class="<?php      $this->text('nsclass')         ?>"<?php } ?>>
  <div id="globalWrapper">
     <div id="column-content">
      	<div id="content">
	         <a name="top" id="contentTop"></a>
           <?php if($this->data['catlinks']) { ?><div id="catlinks-top"><?php       $this->html('catlinks') ?></div><?php } ?>
        	  <h1 class="firstHeading"><?php $this->text('title') ?></h1>
        	  <div id="bodyContent">
        	    <h3 id="siteSub"><?php $this->msg('tagline') ?></h3>
        	    <div id="contentSub"><?php $this->html('subtitle') ?></div>
        	    <?php if($this->data['undelete']) { ?><div id="contentSub"><?php     $this->html('undelete') ?></div><?php } ?>
        	    <?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
        	    <!-- start content -->
        	    <?php $this->html('bodytext') ?>
        	    <?php if($this->data['catlinks']) { ?><div id="catlinks"><?php       $this->html('catlinks') ?></div><?php } ?>
        	    <!-- end content -->
        	    <div class="visualClear"></div>
        	  </div>
      	</div>
      </div>
  <div id="column-one">

  	<div id="p-search" class="portlet">
  	  <h5><label for="searchInput"><?php $this->msg('search') ?></label></h5>
  	  <div class="pBody">
  	    <form name="searchform" action="<?php $this->text('searchaction') ?>" id="searchform">
  	      <input id="searchInput" name="search" type="text"
  	        <?php if($this->haveMsg('accesskey-search')) {
  	          ?>accesskey="<?php $this->msg('accesskey-search') ?>"<?php }
  	        if( isset( $this->data['search'] ) ) {
  	          ?> value="<?php $this->text('search') ?>"<?php } ?> />
  	      <input type='submit' name="go" class="searchButton" id="searchGoButton"
  	        value="<?php $this->msg('go') ?>"
  	        />&nbsp;<input type='submit' name="fulltext"
  	        class="searchButton"
  	        value="<?php $this->msg('search') ?>" />
  	    </form>
  	  </div>
  	</div>

  	<div id="p-cactions" class="portlet">
  	  <h5><?php $this->msg('views') ?></h5>
  	  <ul>
  	    <?php foreach($this->data['content_actions'] as $key => $action) {
  	       ?><li id="ca-<?php echo htmlspecialchars($key) ?>"
  	       <?php if($action['class']) { ?>class="<?php echo htmlspecialchars($action['class']) ?>"<?php } ?>
  	       ><a href="<?php echo htmlspecialchars($action['href']) ?>"><?php
  	       echo htmlspecialchars($action['text']) ?></a></li><?php
  	     } ?>
  	  </ul>
  	</div>

  	<div class="portlet" id="p-logo">
  	  <a style="background-image: url(<?php $this->text('logopath') ?>);"
  	    href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>"
  	    title="<?php $this->msg('mainpage') ?>"></a>
  	</div>

	<div class="portlet" id="p-tb">
	  <h5><?php $this->msg('toolbox') ?></h5>
	  <div class="pBody">
	    <ul>
		  <?php if($this->data['notspecialpage']) { foreach( array( 'whatlinkshere', 'recentchangeslinked' ) as $special ) { ?>
		  <li id="t-<?php echo $special?>"><a href="<?php
		    echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
		    ?>"><?php echo $this->msg($special) ?></a></li>
		  <?php } } ?>
              <?php if(isset($this->data['nav_urls']['trackbacklink'])) { ?>
		  <li id="t-trackbacklink"><a href="<?php
		    echo htmlspecialchars($this->data['nav_urls']['trackbacklink']['href'])
		    ?>"><?php echo $this->msg('trackbacklink') ?></a></li>
	      <?php } ?>
	      <?php if($this->data['feeds']) { ?><li id="feedlinks"><?php foreach($this->data['feeds'] as $key => $feed) {
	        ?><span id="feed-<?php echo htmlspecialchars($key) ?>"><a href="<?php
	        echo htmlspecialchars($feed['href']) ?>"><?php echo htmlspecialchars($feed['text'])?></a>&nbsp;</span>
	        <?php } ?></li><?php } ?>
	      <?php foreach( array('contributions', 'emailuser', 'upload', 'specialpages') as $special ) { ?>
	      <?php if($this->data['nav_urls'][$special]) {?><li id="t-<?php echo $special ?>"><a href="<?php
	        echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
	        ?>"><?php $this->msg($special) ?></a></li><?php } ?>
	      <?php } ?>
	      <?php if(!empty($this->data['nav_urls']['print']['href'])) { ?>
	      <li id="t-print"><a href="<?php
		    echo htmlspecialchars($this->data['nav_urls']['print']['href'])
		    ?>"><?php echo $this->msg('printableversion') ?></a></li>
	      <?php } ?>
	    </ul>
	  </div>
	</div>

  	<div class="portlet" id="p-personal">
  	  <h5><?php $this->msg('personaltools') ?></h5>
  	  <div class="pBody">
  	    <ul>
  	    <?php foreach($this->data['personal_urls'] as $key => $item) {
  	       ?><li id="pt-<?php echo htmlspecialchars($key) ?>"><a href="<?php
  	       echo htmlspecialchars($item['href']) ?>"<?php
  	       if(!empty($item['class'])) { ?> class="<?php
  	       echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
  	       echo htmlspecialchars($item['text']) ?></a></li><?php
  	    } ?>
  	    </ul>
  	  </div>
  	</div>

  	<?php foreach ($this->data['sidebar'] as $bar => $cont) { ?>
  	<div class='portlet' id='p-<?php echo htmlspecialchars($bar) ?>'>
  	  <h5><?php $out = wfMsg( $bar ); if (wfEmptyMsg($bar, $out)) echo $bar; else echo $out; ?></h5>
  	  <div class='pBody'> 
  	    <?php if (is_array($cont)) { ?>
  	    <ul>
  	    <?php foreach($cont as $key => $val) { ?>
  	      <li id="<?php echo htmlspecialchars($val['id']) ?>"><a href="<?php echo htmlspecialchars($val['href']) ?>"><?php echo htmlspecialchars($val['text'])?></a></li>
  	    <?php } ?>
  	    </ul>
  	    <?php } else { echo $cont; } ?>
  	  </div>
  	</div>
  	<?php } ?>
	
	
  </div><!-- end of the left (by default at least) column -->
      <div class="visualClear"></div>
      <div id="footer">
		<table width = "100%">
			<tr><td width="5%" align="left" nowrap='nowrap'><?php if($this->data['copyrightico']) { ?><div id="f-copyrightico"><?php $this->html('copyrightico') ?></div><?php } ?></td>
				<td align="center">
	   <?php if(!empty($this->data['lastmod'])) { ?><?php $this->html('lastmod') ?> - <?php } ?>
	  <?php if(!empty($this->data['viewcount'])) { ?><?php $this->html('viewcount') ?> - <?php } ?>
	  <?php if(!empty($this->data['numberofwatchingusers' ])) { ?><?php  $this->html('numberofwatchingusers') ?> - <?php } ?>
	  <?php if(!empty($this->data['credits'])) { ?><?php $this->html('credits') ?> - <?php } ?>
	  <?php if(!empty($this->data['tagline'])) { ?><?php echo $this->data['tagline'] ?> - <?php } ?>
	</td>
      </tr>
      </table>
      </div>
    </div>
    <?php $this->html('reporttime') ?>
  </body>
</html>
<?php
	wfRestoreWarnings();
	}
}
