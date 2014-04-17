<?php
// Add ChartJS js Library
$chartJs_path = drupal_get_path('module', 'student_tracker') . '/js/Chart.js';
drupal_add_js($chartJs_path);
$graph_data = array();
$graph_data_temp = array();

$graph_colors = graph_colors();
$i = 0;

foreach($variables['data']['marks_subject_wise'] as $subject_id => $marks) {
  //pr($marks);
  $graph_data_temp['subject'] = $marks['subject_title'];
  $graph_data_temp['marks'] = $marks['marks'][$variables['data']['exam']]['scored_marks'];
  $graph_data_temp['color'] = $graph_colors[$i++];
  
  $graph_data[] = $graph_data_temp;
}
?>
<div id="data_exam_wise_pie_wrapper_<?php print $variables['data']['exam']; ?>" class="data_exam_wise_pie_wrapper">
<canvas id="<?php print $variables['data']['graph']['id']; ?>_<?php print $variables['data']['exam']; ?>" height="<?php print $variables['data']['graph']['height']; ?>" width="<?php print $variables['data']['graph']['width']; ?>"></canvas>

<div class="legends">
	<h6>Legends</h6>
	<ul>
		<?php foreach($graph_data as $data) { ?>
			<li><span class="color" data-color="<?php print $data['color']; ?>"></span> <?php print $data['subject'];?></li>
		<?php } ?>
	</ul>
</div>

<script>
var pieData = [
  <?php foreach ($graph_data as $data) { ?>
    {
  	  value: <?php print $data['marks'];?>,
      color:"#<?php print $data['color'];?>"
    },
  <?php } ?>
];
var myPie = new Chart(document.getElementById("<?php print $variables['data']['graph']['id']; ?>_<?php print $variables['data']['exam']; ?>").getContext("2d")).Pie(pieData);
</script>
</div>