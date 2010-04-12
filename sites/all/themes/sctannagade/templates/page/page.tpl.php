<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
      
<body class="<?php print $section_class; print $body_classes; if (!empty($admin)) print ' admin' ?>">
  <?php if (!empty($admin)) print $admin; ?>
  <?php if (empty($admin)) { ?>
  <div id="aak-topbar">
    <div id="aak-topbar-inner">
      <a href="http://www.aarhuskommune.dk/">Til www.aarhuskommune.dk</a>
    </div>
  </div>
  <?php } ?>
	<div id="container" class="<?php print $classes; ?>">
		<div id="container-inner">
			<?php if ($site_name): ?><h1 id="site-name"><?php print $site_name; ?><a href="http://sktannagade.etek.dk"><span></span></a></h1><?php endif; ?>
			<div id="container-top">
				<?php print $search; ?><?php print theme('links', $secondary_links); ?>
			</div>
			
			<div id="banner">

				<script type="text/javascript">
					AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','780','height','200','src','/sites/all/themes/sctannagade/swf/annagade_top','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','/sites/all/themes/sctannagade/swf/annagade_top' ); //end AC code
    				</script>
			
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="780" height="200">
					<param name="movie" value="/sites/all/themes/sctannagade/swf/annagade_top.swf">
       				<param name="quality" value="high">
					<embed src="/sites/all/themes/sctannagade/swf/annagade_top.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="780" height="200">
					</embed>
				</object>
			</div>

			<div id="regions"><?php print theme('links', $primary_links); ?></div>
		</div>
		<div id="container-content">

			<div id="content" class="content row nested">

				<div id="content-inner" class="content-top-inner inner">
          <?php if ($tabs): ?>
            <div class="local-tasks"><div class="clear-block">
              <?php print $tabs; ?>
            </div></div>
          <?php endif; ?>
         <?php print $messages; ?>

	 <?php print $content_top; ?>
         <?php if ($current_month): ?>
           <div class="current-month">
	     <?php print $current_month; ?>
           </div>
         <?php endif; ?>
                            	<?php print $content; ?>
                         	</div><!-- /content-inner -->
				
                     </div><!-- /content -->

			<div id="sidebar">

			<?php if ($left): ?>
				<div id="sidebar-left" class="section sidebar region">
				<?php print $left; ?>
				</div> <!-- /sidebar-left -->
			<?php endif; ?>

			<?php if ($right): ?>
				<div id="sidebar-right" class="section sidebar region">
				<?php print $right; ?>
				</div> <!-- /sidebar-right -->
			<?php endif; ?>

			</div>

		</div>
		<div id="container-banners">
			<div id="banners"> 
				<?php print $banners; ?>
			</div>
		</div>
	</div>

  	<div id="footer">
		
		Fritids- og kultuercentret Sct. Anna Gade | Skt. Anna Gade 38-40 | 8000 Aarhus C
		<?php print $footer; ?><?php print $footer_message; ?><br /><br />
		<?php print $feed_icons; ?>
  	</div>

<?php print $closure ?>

</body>
</html>
