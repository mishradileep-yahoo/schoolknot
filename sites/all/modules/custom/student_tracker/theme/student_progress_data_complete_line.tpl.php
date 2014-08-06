<?php

foreach($variables['data']['marks_subject_wise'] as $subject_id => $marks) {
	foreach($marks['marks'] as $mark) {
		//$exam_wise_marks[$mark['exam_title']][$marks['subject_title']] = $mark['scored_marks'];
		$exam_wise_marks[$mark['exam_title']][$marks['subject_title']] = 
		  array(
		  	'percent' => round(($mark['scored_marks'] / $mark['max_marks']) * 100, 2),
		    'score' => $mark['scored_marks'],
		    'max' => $mark['max_marks']
		  );
	}
}

//pr($exam_wise_marks);

foreach ($exam_wise_marks as $subject_title => $marks) {
	ksort($exam_wise_marks[$subject_title]);
}
$marks_js_values = '';
foreach($exam_wise_marks as $exam_title => $marks) {
	$marks_js_values_temp = '\'' . $exam_title . '\', ';
	$js_subject_title = 'data.addColumn(\'string\', \'Subjects\');';
	
	foreach ($marks as $subject_title => $mark) {
		$js_subject_title .= 'data.addColumn(\'number\', \'' . $subject_title . '\'); data.addColumn({type: \'string\', role: \'tooltip\'});';
		$marks_js_values_temp .= $mark['percent'] . ', \'' .$mark['percent'] . '% (' .$mark['score'] . '/' .$mark['max'] . ')\', '; 
	}
	$marks_js_values .= '['.$marks_js_values_temp.'],';
}
$marks_js_values = 'data.addRows([' . $marks_js_values . ']);';
?>

<script type="text/javascript">
  google.load('visualization', '1.1', {'packages':['corechart']});
  google.setOnLoadCallback(drawChart_C5);
   function drawChart_C5() {
     var data = new google.visualization.DataTable();
     <?php print $js_subject_title; ?>
     <?php print $marks_js_values; ?>
     var options = {
       is3D: true,
       chartArea:{left:30,top:20,width:"80%"},
       curveType: 'function',
       fontName: 'Open Sans',
     };
     var chart = new google.visualization.LineChart(document.getElementById('data_complete_line_wrapper_<?php print $variables['id']; ?>'));
     chart.draw(data, options);
   }
</script>
<div id="data_complete_line_wrapper_<?php print $variables['id']; ?>" class="data_complete_line_wrapper"></div>