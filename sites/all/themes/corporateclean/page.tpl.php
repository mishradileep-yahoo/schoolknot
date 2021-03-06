<?php drupal_add_js(base_path() . path_to_theme() . '/js/jquery.minimalect.min.js'); ?>
<div id="mainWrapper">

<?php include('includes/header.php'); ?>
<!-- #content -->
<div id="contentWrap">
	<!-- #content-inside -->
    <div id="content-inside" class="clearfix">
				<?php include('includes/rwd-admin-menu-button.php'); ?>
        <?php include('includes/left-panel.php'); ?>
        

            <div id="main" class="rightContainer"> 
            <?php //if (theme_get_setting('breadcrumb_display','corporateclean')): print $breadcrumb; endif; ?>
            
            <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
       
            <?php if ($messages): ?>
            <div id="console" class="clearfix">
            <?php print $messages; ?>
            </div>
            <?php endif; ?>
     
            <?php if ($page['help']): ?>
            <div id="help">
            <?php print render($page['help']); ?>
            </div>
            <?php endif; ?>
            <?php if ($action_links): ?>
            <ul class="action-links">
            <?php print render($action_links); ?>
            </ul>
            <?php endif; ?>
			<?php print render($title_prefix); ?>
			
						<?php if($node->type != 'school') {?>
			
            <?php if ($title): ?>
            <h1><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            
            <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
            <?php } ?>
            
            
            <?php print render($page['content']); ?>
            
            <?php print $feed_icons; ?>
            
        </div><!-- EOF: #main -->
        
        <?php if ($page['sidebar_second']) :?>
        <!-- #sidebar-second -->
        <div id="sidebar-second" class="grid_4">
        	<?php print render($page['sidebar_second']); ?>
        </div><!-- EOF: #sidebar-second -->
        <?php endif; ?>  

    </div><!-- EOF: #content-inside -->

</div><!-- EOF: #content -->


</div>
<?php drupal_add_js(base_path() . path_to_theme() . '/js/custom.js'); ?>
<script type="text/javascript">
<!--
	function toggle_visibility(id) {
	var e = document.getElementById(id);
	if(e.style.display == 'block')
		e.style.display = 'none';
	else
		e.style.display = 'block';
	}
//-->
</script>