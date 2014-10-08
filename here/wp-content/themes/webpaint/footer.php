<?php 
	$tb_themeoptions = getThemeOptions();?>
<?php if(empty($tb_themeoptions["tb_webpaint_footer-hide"])){ //footer on/off ?>
	  <!-- Begin Footer Wrapper -->
		 <?php if (get_theme_mod( 'tb_webpaint_footer-columns','1')==1){ ?>
		 <footer class="aligncenter"> 
		    <!-- Begin Inner -->
		    <div class="inner">	
		    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer 1/1 Column") ) : ?>
					<h1 class="widget-title colored">Footer Widget</h3>
		            <p>
		            Please configure this Widget in the <a href="wp-admin/widgets.php">Admin Panel</a> -> Appearance -> Widgets -> Footer 1/1 Column</p>
			<?php endif; ?> 
			</div>
		</footer>
		<?php } else {?>
		<footer>
		<!-- Begin Inner -->
			<div class="inner">		
				<div class="one-third widget">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Left 1/3 Column") ) : ?>
						<h3 class="widget-title colored">Footer Widget</h3>
			            <p>
			            Please configure this Widget in the <a href="wp-admin/widgets.php">Admin Panel</a> -> Appearance -> Widgets -> Footer Left 1/3 Column</p>
			        <?php endif; ?>
				</div>
				<div class="one-third widget">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Center 1/3 Column") ) : ?>
						<h3 class="widget-title colored">Footer Widget</h3>
			            <p>
			            Please configure this Widget in the <a href="wp-admin/widgets.php">Admin Panel</a> -> Appearance -> Widgets -> Footer Center 1/3 Column</p>
			        <?php endif; ?>
				</div>
				<div class="one-third last widget">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Right 1/3 Column") ) : ?>
						<h3 class="widget-title colored">Footer Widget</h3>
			            <p>
			            Please configure this Widget in the <a href="wp-admin/widgets.php">Admin Panel</a> -> Appearance -> Widgets -> Footer Right 1/3 Column</p>
			        <?php endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</footer>
		<?php } ?>
	  
	  <!-- End Footer Wrapper --> 
<?php }
 
if(empty($tb_themeoptions["tb_webpaint_subfooter-hide"])){ //subfooter on/off ?>
  <!-- Begin Sub Footer Wrapper -->
  <div class="subfooter-wrapper"> 
    <!-- Begin Inner -->      
    	<div class="inner">	
	      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("SubFooter") ) : ?>
				<p>Widget in <a href="wp-admin/widgets.php">Admin Panel</a> -> Appearance -> Widgets -> SubFooter</p>
		    <?php endif; ?>
    	</div>
    <!-- Begin Inner --> 
  </div>
  <!-- End Sub Footer Wrapper --> 
<?php } ?>
</div>
<!-- End Body Wrapper --> 
<?php wp_footer(); ?>
</body>
</html>