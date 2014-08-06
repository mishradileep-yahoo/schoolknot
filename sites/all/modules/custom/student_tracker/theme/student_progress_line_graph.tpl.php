<?php
foreach($variables['data']['marks_subject_wise'] as $subject_id => $marks) {
  $array_temp = array();
  foreach($marks['marks'] as $mark) {
    $array_temp[] = array(
    	'percent' => round(($mark['scored_marks'] / $mark['max_marks']) * 100, 2), 
      'score' => $mark['scored_marks'], 
      'max' => $mark['max_marks'], 
    	'exam' => $mark['exam_title']);
  }
  $subject_marks_array[$subject_id]['marks'] = $array_temp;
  $subject_marks_array[$subject_id]['subject'] = $marks['subject_title'];

}
$graph_data = $subject_marks_array[$variables['data']['subject']];
$js_title = 'data.addColumn(\'string\', \'Subjects\');';
$js_title .= 'data.addColumn(\'number\', \'' .  $graph_data['subject'] . '\'); data.addColumn({type: \'string\', role: \'tooltip\'});';

$marks_js_values = '';
foreach ($graph_data['marks'] as $key => $graphData) {
	$marks_js_values .= '[\'' . $graphData['exam'] . '\', ' . $graphData['percent'] . ', \'' . $graphData['percent'] . '% (' . $graphData['score'] . '/' . $graphData['max'] . ')\'],'; 
}
$marks_js_values = 'data.addRows([' . $marks_js_values . ']);';
?>


<script type="text/javascript">
google.load('visualization', '1.1', {'packages':['corechart']});
google.setOnLoadCallback(drawChart_C5);
 function drawChart_C5() {
   var data = new google.visualization.DataTable();
   <?php print $js_title; ?>
   <?php print $marks_js_values; ?>
   var options = {
     is3D: true,
     chartArea:{left:30,top:20,width:"80%"},
     curveType: 'function',
     fontName: 'Open Sans',
   };
   var chart = new google.visualization.LineChart(document.getElementById('subject_wise_wrapper_<?php print $variables['data']['subject']; ?>'));
   chart.draw(data, {width: '80%', height: 240, legend:'top', curveType: 'function'});
 }
</script>
<div id="subject_wise_wrapper_<?php print $variables['data']['subject']; ?>" class="subject_wise_wrapper"></div>