<?php

/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 *
 * @ingroup themeable
 */
$marks = $variables;

// Collect all Exams
$exam_header = array();
foreach($marks['subject_wise'] as $subject_marks) {
  foreach($subject_marks['marks'] as $exam_id => $mark) {
    $exam_header[$exam_id] = $mark['exam_title'];
  }
  break;
}
$line_graph_block_data['exam_headers'] = $exam_header;
$line_graph_block_data['marks_subject_wise'] = $marks['subject_wise'];


// Collect all Subjects
$subject_header = array();
//pr($marks);
foreach($marks['subject_wise'] as $subject_id => $subject_marks) {
  $subject_header[$subject_id] = $subject_marks['subject_title'];
}

$student_tracker_js_path = drupal_get_path('module', 'student_tracker') . '/js/student_tracker.js';
drupal_add_js($student_tracker_js_path);
?>

<?php 
global $user;

print _get_merged_account_dd($user); 
?>

<div class="profile"<?php print $attributes; ?>>
  <div class="block">
  	Find detailed progress sheet for you child in various tabular, chart and graph representation.
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec est tellus. Integer pretium risus eu metus dictum, a ornare mi euismod. Ut sagittis hendrerit dui vitae auctor. Cras sodales dictum ipsum, a sagittis neque egestas quis. Praesent non tellus ut urna auctor pretium non in augue. Praesent ut ante nec lorem accumsan pretium. Curabitur lectus ipsum, rhoncus ut leo vitae, euismod lacinia nibh. Sed eget mi sed dui interdum bibendum eu et felis. Nam aliquam sapien at sollicitudin lacinia. Fusce rhoncus lorem a ipsum mollis molestie. Curabitur in eros eu sem consectetur blandit. Nullam orci felis, gravida vitae sapien ut, pellentesque pellentesque turpis.
  </div>
  <div class="block">
  	<h4>Complete Progress Sheet - Table</h4>
  	
    <table class="views-table cols-3">
    	<thead>
      	<tr>
      		<th class="views-field views-field-body">Subject / Exam</th>
      		<?php foreach($exam_header as $header) {?>
        		<th class="views-field views-field-title"><?php print $header; ?></th>
        	<?php } ?>
        	<th class="views-field views-field-body">Total</th>
        	<th class="views-field views-field-edit-node">Status</th>
      	</tr>
    	</thead>
    	<tbody>
    		<?php foreach($marks['subject_wise'] as $subject_marks) { ?>
  				<tr class="odd views-row-first">
  					<td class="views-field views-field-title"><?php print $subject_marks['subject_title']; ?></td>
  					<?php foreach($subject_marks['marks'] as $mark) { ?>
  						<td class="views-field views-field-title">
  							<?php if($mark['scored_marks'] > $mark['passing_marks']) { ?>
  							<?php print $mark['scored_marks'] . ' / ' . $mark['max_marks']?>
  							<?php } else { ?>
  							<span class="subject-fail"><?php print $mark['scored_marks'] . ' / ' . $mark['max_marks']?></span>
  							<?php } ?>
  							
  						</td>
  					<?php } ?>
  					<td class="views-field views-field-title"><?php print $subject_marks['total']['scored_marks'] . ' / ' . $subject_marks['total']['max_marks']; ?></td>
  					<td class="views-field views-field-title"><?php print $subject_marks['total']['percentage'] . '%'; ?></td>
  				</tr>
				<?php } ?>
			</tbody>
    </table>
  	
  	
  	
  </div>
  <div class="block">
  	<h4>Complete Progress Sheet - Graph</h4>
  	<?php
  	  $line_graph_block_data['graph'] = array('id' => 'student_progress_data_complete_line', 'width' => '750', 'height' => '250');
      $student_progress_data = module_invoke('student_tracker', 'block_view', 'student_progress_data_complete_line', $line_graph_block_data);
      print $student_progress_data['content'];
    ?>
	</div>

  <div class="block">
  	<h4>Exam Wise Progress Sheet</h4>
  	<select class="exam_wise_progress_bar" name="exam_wise_progress_bar" id="exam_wise_progress_bar_id">
    	<?php foreach($exam_header as $exam_id => $exam_title) { ?>
    		<option value="<?php print $exam_id; ?>"><?php print $exam_title; ?></option>
    	<?php } ?>
    </select>
    <?php
    
    $bar_graph_block_data = $line_graph_block_data;
    $bar_graph_block_data['graph'] = array('id' => 'student_progress_data_exam_wise_bar', 'width' => '750', 'height' => '250');
    foreach($exam_header as $exam_id => $exam) {
      $bar_graph_block_data['exam'] = $exam_id;
      $student_progress_data = module_invoke('student_tracker', 'block_view', 'student_progress_bar_graph', $bar_graph_block_data);
      print $student_progress_data['content'];
    }
    ?>
  </div>
  <div class="block block-half block-half-left">
  	<h4>Exam Wise Pie Sheet</h4>
  	<select class="exam_wise_progress_pie" name="exam_wise_progress_pie" id="exam_wise_progress_pie_id">
    	<?php foreach($exam_header as $exam_id => $exam_title) { ?>
    		<option value="<?php print $exam_id; ?>"><?php print $exam_title; ?></option>
    	<?php } ?>
    </select>
    <?php
    
    $bar_graph_block_data = $line_graph_block_data;
    $bar_graph_block_data['graph'] = array('id' => 'student_progress_data_exam_wise_pie', 'width' => '230', 'height' => '250');
    foreach($exam_header as $exam_id => $exam) {
      $bar_graph_block_data['exam'] = $exam_id;
      $student_progress_data = module_invoke('student_tracker', 'block_view', 'student_progress_pie_graph', $bar_graph_block_data);
      print $student_progress_data['content'];
    }
    ?>
  </div>
  
  <div class="block block-half block-half-right">
  	<h4>Subject Wise</h4>
  	<select class="subject_wise_line" name="subject_wise_line" id="subject_wise_line_id">
    	<?php foreach($subject_header as $subject_id => $subject_title) { ?>
    		<option value="<?php print $subject_id; ?>"><?php print $subject_title; ?></option>
    	<?php } ?>
    </select>
    <?php
    
    $bar_graph_block_data = $line_graph_block_data;
    $bar_graph_block_data['graph'] = array('id' => 'subject_wise_line', 'width' => '400', 'height' => '250');
    foreach($subject_header as $subject_id => $subject) {
      $bar_graph_block_data['subject'] = $subject_id;
      $student_progress_data = module_invoke('student_tracker', 'block_view', 'student_progress_line_graph', $bar_graph_block_data);
      print $student_progress_data['content'];
    }
    ?>
  </div>

<?php //print render($user_profile); ?>
