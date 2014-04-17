<?php
// Add ChartJS js Library
$chartJs_path = drupal_get_path('module', 'student_tracker') . '/js/Chart.js';
drupal_add_js($chartJs_path);
$graph_data = array();
$graph_data_temp = array();

$graph_colors = graph_colors();
$i = 0;

foreach($variables['data']['marks_subject_wise'] as $subject_id => $marks) {
  $array_temp = array();
  foreach($marks['marks'] as $mark) {
    $array_temp[] = $mark['scored_marks'];
  }
  $subject_marks_array[$subject_id]['color'] = $graph_colors[$i++];
  $subject_marks_array[$subject_id]['marks'] = $array_temp;

}
$graph_data = $subject_marks_array[$variables['data']['subject']];
$labels = '"' . implode('","', $variables['data']['exam_headers']) . '"';
?>
<div id="subject_wise_wrapper_<?php print $variables['data']['subject']; ?>" class="subject_wise_wrapper">
<canvas id="<?php print $variables['data']['graph']['id']; ?>_<?php print $variables['data']['subject']; ?>" height="<?php print $variables['data']['graph']['height']; ?>" width="<?php print $variables['data']['graph']['width']; ?>"></canvas>

<script>
var lineChartData = {
labels : [<?php print $labels; ?>],
datasets : [
{
fillColor : "transparent",
strokeColor : "#<?php print $graph_data['color']; ?>",
pointColor : "#<?php print $graph_data['color']; ?>",
pointStrokeColor : "#fff",
data : [<?php print implode(',', $graph_data['marks']); ?>]
}
]
}
var chartOptions = {
scaleOverride : true,
scaleSteps : 10,
scaleStepWidth : 10,
bezierCurve : false,
}
var myLine = new Chart(document.getElementById("<?php print $variables['data']['graph']['id']; ?>_<?php print $variables['data']['subject']; ?>").getContext("2d")).Line(lineChartData, chartOptions);
</script>
</div>