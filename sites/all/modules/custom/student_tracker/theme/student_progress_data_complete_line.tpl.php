<?php
// Add ChartJS js Library
$chartJs_path = drupal_get_path('module', 'student_tracker') . '/js/Chart.js';
drupal_add_js($chartJs_path);
$labels = $student_marks = array();
$labels = '"' . implode('","', $variables['data']['exam_headers']) . '"';
$subject_marks_array = array();
$graph_colors = graph_colors();
$i = 0;
foreach($variables['data']['marks_subject_wise'] as $subject_id => $marks) {
  $array_temp = array();
  foreach($marks['marks'] as $mark) {
    $array_temp[] = $mark['scored_marks'];
  }
  $subject_marks_array[$marks['subject_title']]['color'] = $graph_colors[$i++];
  $subject_marks_array[$marks['subject_title']]['marks'] = $array_temp;
}
?>
<canvas id="<?php print $variables['data']['graph']['id']; ?>" height="<?php print $variables['data']['graph']['height']; ?>" width="<?php print $variables['data']['graph']['width']; ?>"></canvas>
<div class="legends">
	<h6>Legends</h6>
	<ul>
		<?php foreach($subject_marks_array as $subject => $color_marks_data) { ?>
			<li><span class="color" data-color="<?php print $color_marks_data['color']; ?>"></span> <?php print $subject;?></li>
		<?php } ?>
	</ul>
</div>
<div class="clearer"></div>
	<script>

		var lineChartData = {
			labels : [<?php print $labels; ?>],
			datasets : [
				<?php foreach($subject_marks_array as $marks_data) { ?>
				{
					fillColor : "transparent",
					strokeColor : "#<?php print $marks_data['color']; ?>",
					pointColor : "#<?php print $marks_data['color']; ?>",
					pointStrokeColor : "#fff",
					data : [<?php print implode(', ', $marks_data['marks']); ?>]
				},
				<?php } ?>


				
			]
			
		}
		
		var chartOptions = {
			scaleOverride : true,
			scaleSteps : 10,
			scaleStepWidth : 10,
			//bezierCurve : false,
		}

	var myLine = new Chart(document.getElementById("<?php print $variables['data']['graph']['id']; ?>").getContext("2d")).Line(lineChartData, chartOptions);
	
	</script>
	
	<?php 
	//pr($variables);
	?>