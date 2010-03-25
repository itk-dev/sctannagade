    <?php if (!$page): ?>
      <h2 class="node-title">
        <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
        <?php print $unpublished; ?>
      </h2>
    <?php endif; ?>
 
    <?php print $content; ?>
    <div id="lej-lokaler-item-list">
      <?php print views_embed_view('lej_lokaler', 'default'); ?>    
    </div>
<!-- /node -->
