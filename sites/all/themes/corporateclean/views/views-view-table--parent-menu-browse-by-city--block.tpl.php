<div class="round-box leftMenu">
	<h2> Navigation </h2>
	<ul>
		<li><?php print l('Compare School<span></span>', 'compare/compare_schools', array('html' => TRUE,)); ?></li>
		<li><?php print l('Research School<span></span>', 'school-research', array('html'=>TRUE, 'class' =>'active')); ?></li>
		<li><?php print l('Browse schools by city<span></span>', 'browse_by_city', array('html'=>TRUE, 'class' =>'active')); ?>
			<ul>
				<?php foreach ($rows as $row_count => $row) { ?>
					<li><?php print l($row['name'], 'browse-schools-by-city/'.$row['tid'])?></li>
				<?php } ?>
			</ul>
		</li>
		<?php $loged_in_as = _logged_in_as_block();

		if($loged_in_as['as'] == 'Parent') {
		?>
			<li><?php print l('School Holidays', 'school-holidays/'.$loged_in_as['school']['nid'], array('html' => TRUE,)); ?></li>
			<li><?php print _get_download_timetable();?></li>
		<?php } // End Schol?>
		
		<?php print _get_school_rating_link_for_parent(); ?>
		
	</ul>
</div>