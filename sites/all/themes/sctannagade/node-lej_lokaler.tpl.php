    <?php if (!$page): ?>
      <h2 class="node-title">
        <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
        <?php print $unpublished; ?>
      </h2>
    <?php endif; ?>

    <?php print $lej_lokaler_tabs; ?>
    <?php print $content; ?>
<!-- /node -->
