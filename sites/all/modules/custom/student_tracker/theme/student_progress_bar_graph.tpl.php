<?php
// Add ChartJS js Library
$chartJs_path = drupal_get_path('module', 'student_tracker') . '/js/Chart.js';
drupal_add_js($chartJs_path);
$graph_data = array();
foreach($variables['data']['marks_subject_wise'] as $subject_id => $marks) {
  $graph_data['labels'][] = $marks['subject_title'];
  $graph_data['marks'][] = $marks['marks'][$variables['data']['exam']]['scored_marks'];
}
$labels = '"' . implode('","', $graph_data['labels']) . '"';
?>
<div id="data_exam_wise_bar_wrapper_<?php print $variables['data']['exam']; ?>" class="data_exam_wise_bar_wrapper">
<canvas id="<?php print $variables['data']['graph']['id']; ?>_<?php print $variables['data']['exam']; ?>" height="<?php print $variables['data']['graph']['height']; ?>" width="<?php print $variables['data']['graph']['width']; ?>"></canvas>


	<script>

		var barChartData = {
			labels : [<?php print $labels; ?>],
			datasets : [
				{
					fillColor : "rgba(95,139,149,0.5)",
					strokeColor : "rgba(95,139,149,1)",
					data : [<?php print implode(', ', $graph_data['marks']); ?>]
				},
				
			]
			
		}
		var chartOptions = {
				scaleOverride : true,
				scaleSteps : 10,
				scaleStepWidth : 10,
				scaleStartValue : 0,
			}

	var myLine = new Chart(document.getElementById("<?php print $variables['data']['graph']['id']; ?>_<?php print $variables['data']['exam']; ?>").getContext("2d")).Bar(barChartData, chartOptions);
	
	</script>
	</div>