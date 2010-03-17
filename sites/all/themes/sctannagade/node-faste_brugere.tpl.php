    <?php if (!$page): ?>
      <h2 class="node-title">
        <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
        <?php print $unpublished; ?>
      </h2>
    <?php endif; ?>

    <?php print $faste_brugere_tabs; ?>
    <?php print $content; ?>

    <div class="content-pictures field-field-pictures">
      <?php print views_embed_view('faste_brugere_thumb', 'default', array($nid)); ?>
    </div>

    <div id="faste-bruger-list">
      <?php //print views_embed_view('faste_brugere', 'overview'); ?> 
    </div>

    <?php if ($terms): ?>
      <div class="node-terms"><?php print $terms; ?></div>
    <?php endif; ?>

    <?php if ($links): ?>
      <div class="node-links"><?php print $links; ?></div>
    <?php endif; ?>
<!-- /node -->
