    <?php if (!$page): ?>
      <h2 class="node-title">
        <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
        <?php print $unpublished; ?>
      </h2>
    <?php endif; ?>
    <div id="tabs">
      <h2>
        <?php print $title; ?>
      </h2>
      <?php print $faste_brugere_tabs; ?>

       <div class="boks">
         <?php print $content; ?>
       </div>

       <div class="content-pictures field-field-pictures">
         <?php print views_embed_view('faste_brugere_thumb', 'default', array($nid)); ?>
       </div>
   </div>
   <div id="faste-brugere-nav" class="li-nav">
     <?php print views_embed_view('faste_brugere', 'default'); ?>
   </div>
<!-- /node -->
