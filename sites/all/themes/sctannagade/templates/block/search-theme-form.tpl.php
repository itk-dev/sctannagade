//[path_to_theme]/search-block-form.tpl.php
//
<div class="container-inline">
  <input type="text" class="form-text" title="Enter the terms you wish to search for." value="Type to seach!" size="15" id="edit-search-block-form-1" name="search_block_form" maxlength="128"/>
  <input type="image" src="<?php print base_path().path_to_theme(); ?>/search.png" value="Search" id="edit-submit-2" name="op"/>
  <?php //print $search['submit']; //??????? ?>
  <?php print $search['hidden']; ?>
</div>
<script>
  $('#edit-search-block-form-1').click(
    function() {
      $(this).val("");
    }
  )
</script>