    <?php if (!$page): ?>
      <h2 class="node-title">
        <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
        <?php print $unpublished; ?>
      </h2>
    <?php endif; ?>
    <div id="tabs">
      <?php print $outdor_facilities_tabs; ?>

       <div class="boks">
         <?php print $content; ?>
       </div>
   </div>
<!-- /node -->
