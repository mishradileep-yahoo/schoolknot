<?php //pr($parsers)?>
<table class="views-table cols-2">
<thead>
  <tr>
    <th class="" width="60%">Title</th>
    <th class="" width="20%">Created</th>
		<th class="">Optations</th>
  </tr>
</thead>
<tbody>
	<?php foreach($parsers as $parser) {?>
    <tr class="">
      <td class=""><?php print $parser->title; ?></td>
      <td class=""><?php print date("jS M, Y H:i:s ", $parser->created); ?></td>
      <td class=""><?php print l('Edit', 'schoolknot_parser/parser/' . $parser->parid . '/edit'); ?></td>
    </tr>
  <?php } ?>
</tbody>
</table>