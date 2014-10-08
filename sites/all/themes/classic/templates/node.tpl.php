<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?> role="article">

  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>>
        <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
      </h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
  </header>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php
    // Remove the "Add new comment" link on the teaser page or if the comment
    // form is being displayed on the same page.
    if ($teaser || !empty($content['comments']['comment_form'])) {
      unset($content['links']['comment']['#links']['comment-add']);
    }
    // Only display the footer if there are links.
    $links = render($content['links']);
  ?>

  <?php if ($links || $display_submitted):  ?>
    <footer class="link-wrapper">
      <?php if ($display_submitted): ?>
        <div class="meta submitted">
          <span><?php print $name; ?></span>   
          <span class="calendar"><?php print $date; ?></span>
        </div>
      <?php endif; ?>
    <?php print $links; ?>
    </footer>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</article>