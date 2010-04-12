    <?php if (!$page): ?>
      <h2 class="node-title">
        <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
        <?php print $unpublished; ?>
      </h2>
    <?php endif; ?>

    <h2><?php print $title; ?></h2>
    <?php print $content; ?>

   <div id="udendors-faciliteter-nav" class="li-nav">
     <?php print views_embed_view('udendors_faciliteter', 'default'); ?>
   </div>
<!-- /node -->
