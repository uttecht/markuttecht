<article class="<?php print $classes; ?> clearfix"<?php print $attributes; ?> role="article">

  <header class="comment-header">

    <div class="attribution">
      <?php print $picture; ?>

      <div class="submitted">
        <p class="commenter-name">
          <?php print $author; ?>
        </p>
        <p class="comment-time">
          <?php print $created; ?>
        </p>
        <p class="comment-permalink">
          <?php print $permalink; ?>
        </p>
      </div>
    </div> <!-- /.attribution -->
  </header> <!-- /.comment-header -->

    <div class="comment-text">
      <div class="comment-arrow"></div>

      <?php if ($new): ?>
        <span class="new"><?php print $new; ?></span>
      <?php endif; ?>

      <?php print render($title_prefix); ?>
      <h3<?php print $title_attributes; ?>><?php print $title; ?></h3>
      <?php print render($title_suffix); ?>
      <div class="content"<?php print $content_attributes; ?>>
        <?php
          // We hide the comments and links now so that we can render them later.
          hide($content['links']);
          print render($content);
        ?>
      </div> <!-- /.content -->
      <footer class="comment-footer">
        <?php if ($signature): ?>
          <div class="user-signature clearfix">
          <?php print $signature; ?>
          </div>
        <?php endif; ?>

        <nav>
          <?php print render($content['links']); ?>
        </nav>
      </footer> <!-- /.comment-footer -->
    </div> <!-- /.comment-text -->
</article>
