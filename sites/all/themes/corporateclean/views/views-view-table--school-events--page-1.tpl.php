<?php

/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
?>

<div class="events-day">
	<?php foreach ($rows as $row_count => $row){ //pr($row); ?>
  	<div class="events-item-img events-item">
  		<div class="img"><?php print $row['field_event_image']; ?></div>
  		<div class="content">
  			<h4><?php print _phonetic_apply_filter($row['title_1']); ?></h4>
  			<h5><?php print $row['field_event_date']; ?></h5>
  			<?php print strip_tags($row['body']); ?>
  		</div>
  	</div>
  	<div class="clearer"></div>
	<?php } ?>	
</div>



<style>
.content div.view-header {display: none}
</style>