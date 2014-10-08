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


  <?php if ($page['banner_area']): ?>
    <div id="banner-area" class="clearfix" role="banner"><div class="section clearfix">
      <?php print render($page['banner_area']); ?>
    </div></div> <!-- /.section, /#banner-area -->
  <?php endif; ?>

  <?php if ($title && !$page['banner_area']): ?>
    <div id="page-title-wrapper" class="clearfix" role="title"><div class="section clearfix">
      <h1 class="title" id="page-title">
        <?php print $title; ?>
      </h1>
      <?php if ($breadcrumb): ?>
        <div id="breadcrumb"><?php print $breadcrumb; ?></div>
      <?php endif; ?>
    </div></div> <!-- /.section, /#page-title-wrapper -->
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <aside id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></aside> <!-- /.section, /#featured -->
  <?php endif; ?>

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">

    <main id="content" class="column" role="main"><section class="section">
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title && $page['banner_area']): ?>
        <h1 class="title" id="page-title">
          <?php print $title; ?>
        </h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php if (render($tabs)): ?>
        <nav class="tabs" role="navigation">
          <?php print render($tabs); ?>
        </nav>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>

    </section></main> <!-- /.section, /#content -->

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><aside class="section">
        <?php print render($page['sidebar_first']); ?>
      </aside></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>
    
    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><aside class="section">
        <?php print render($page['sidebar_second']); ?>
      </aside></div> <!-- /.section, /#sidebar-second -->
    <?php endif; ?>

  </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($page['postscript_bottom']): ?>
    <div id="postscript-bottom"><div class="section clearfix">
      <?php print render($page['postscript_bottom']); ?>
    </div></div> <!-- /.section, /#postscript-bottom -->
  <?php endif; ?>

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
