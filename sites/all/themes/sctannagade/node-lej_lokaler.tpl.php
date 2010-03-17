    <?php if (!$page): ?>
      <h2 class="node-title">
        <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
        <?php print $unpublished; ?>
      </h2>
    <?php endif; ?>

    <?php print $lej_lokaler_tabs; ?>
    <?php print $content; ?>

    <div class="pictures content-pictures field-field-lokale-pictures">
      <?php print views_embed_view('lej_lokaler_thumb', 'default', array($nid)); ?>
    </div>
<!-- /node -->
