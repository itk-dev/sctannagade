    <?php if (!$page): ?>
      <h2 class="node-title">
        <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
        <?php print $unpublished; ?>
      </h2>
    <?php endif; ?>

    <?php print $title; ?>
    <?php print $faste_brugere_tabs; ?>

    <div class="boks">
    <?php print $content; ?>
    </div>

    <div class="content-pictures field-field-pictures">
      <?php print views_embed_view('faste_brugere_thumb', 'default', array($nid)); ?>
    </div>
<!-- /node -->
