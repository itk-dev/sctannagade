<?php if (!$field_empty) : ?>
<div id="floorplan" class="field field-type-<?php print $field_type_css ?> field-<?php print $field_name_css ?>">
  <div class="field-items">
    <?php $count = 1;
    foreach ($items as $delta => $item) :
      if (!$item['empty']) : ?>
        <div class="field-item <?php print ($count % 2 ? 'odd' : 'even') ?>">
          <?php if ($label_display == 'inline') { ?>
            <div class="field-label-inline<?php print($delta ? '' : '-first')?>">
              <?php print t($label) ?>:&nbsp;</div>
          <?php } ?>
          <?php print $item['view'] ?>
        </div>
      <?php $count++;
      endif;
    endforeach;?>
  </div>
</div>
<?php endif; ?>
