<div id="page-wrapper"><div id="page">

  <?php if ($page['top_bar_left'] || $page['top_bar_right']): ?>
    <div id="top-bar" class="clearfix"><div class="section clearfix">
      <?php print render($page['top_bar_left']); ?>
      <?php print render($page['top_bar_right']); ?>
    </div></div> <!-- /.section, /#top-bar -->
  <?php endif; ?>

  <header id="header"><div class="section clearfix">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan">

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name">
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan">
            <?php print $site_slogan; ?>
          </div>
        <?php endif; ?>

      </div> <!-- /#name-and-slogan -->
    <?php endif; ?>

    <?php print render($page['header']); ?>

    <?php if ($main_menu && !render($page['header'])): ?>
      <nav id="navigation" class="navigation" role="navigation"><div id="main-menu">
        <?php if (module_exists('i18n_menu')) {
            $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
          } else {
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          }
          print drupal_render($main_menu_tree); ?>
      </div></nav> <!-- /#main-menu -->
    <?php endif; ?>

  </div></header> <!-- /.section, /#header -->

  <?php if ($main_menu && render($page['header'])): ?>
    <div id="menu-bar" class="clearfix"><div class="section clearfix">
      <nav id="navigation" class="navigation" role="navigation"><div id="main-menu">
        <?php if (module_exists('i18n_menu')) {
            $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
          } else {
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          }
          print drupal_render($main_menu_tree); ?>
      </div></nav> <!-- /#main-menu -->
    </div></div> <!-- /.section, /#menu-bar -->
  <?php endif; ?>

  <?php if ($title): ?>
    <div id="page-title-wrapper" class="clearfix" role="title"><div class="section clearfix">
      <h1 class="title" id="page-title">
        <?php print $title; ?>
      </h1>
    </div></div> <!-- /.section, /#page-title-wrapper -->
  <?php endif; ?>


  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">
    <main id="content" class="column" role="main"><section class="section">

    <div id="notfound">
	  <h2 class="notfound-title">404!</h2>
      <p>Sorry, This Page Does not exist.<br />Go <a href="<?php print $front_page; ?>">home</a> or try a search?</p>
        <?php print drupal_render(drupal_get_form('search_block_form')); ?>
	</div>

    </section></main> <!-- /.section, /#content -->
  </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
    <div id="footer-columns-wrapper"><aside class="section">
      <div id="footer-columns" class="clearfix">
        <?php print render($page['footer_firstcolumn']); ?>
        <?php print render($page['footer_secondcolumn']); ?>
        <?php print render($page['footer_thirdcolumn']); ?>
        <?php print render($page['footer_fourthcolumn']); ?>
      </div> <!-- /#footer-columns -->
    </aside></div> <!-- /.section, /#footer-columns-wrapper -->
  <?php endif; ?>

  <div id="footer-wrapper"><footer class="section" role="contentinfo">
    <?php if ($page['footer_left'] || $page['footer_right']): ?>
      <div id="footer" role="contentinfo" class="clearfix">
        <?php print render($page['footer_left']); ?>
        <?php print render($page['footer_right']); ?>
      </div> <!-- /#footer -->
    <?php endif; ?>
  </footer></div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
