/* Добавляет ссылку с счетчиком на комменты для тизера: */
<?php if ($teaser): ?>
	<a href="<?php echo $node_url;?>#comments" class="comment_count"><?php echo $comment_count; ?></a>
<?php endif; ?>

/* Условие для вывода ссылок user-menu */ 

<div class="user-menu-wrap">
	<?php if ($logged_in){ ?>
		<a href="?q=user/logout">Log out</a>
	<?php }else{ ?>
		<span class="login-label">You have not yet registered to our club?</span><a href="?q=user/register">Register</a><span class="login-spacer">or</span><a href="?q=user/login">Log in</a>
	<?php } ?>
</div>

<?php/***Teaser-full post exceptions***/?>

<?php

 $label = 'comments';
 
 if($comment_count == 1) {
  $label = 'comment';
  }
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($user_picture || !$page || $display_submitted): ?>
    <header>
      <?php print $user_picture; ?>
    </header>
  <?php endif; ?>
  <?php if (!$teaser): ?>
    <time class="full-format" pubdate datetime="<?php print $submitted_pubdate; ?>">Posted on 
     <?php print $submitted_date; ?>
    </time>
  <?php endif; ?>
    <?php
      // We hide the comments, tags and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      hide($content['social_share']);
      hide($content['body']); ?>
  <?php print render($content).'<div class="extra-node">'; ?>
  <div class="content"<?php print $content_attributes; ?>>
<?php if ($teaser): ?>
      <time pubdate datetime="<?php echo date( "F j, Y",$node->created); ?>">
       <div class="day"><?php echo date('d', $node->created); ?></div>
       <div class="month"><?php echo date('M', $node->created); ?></div>
      </time>
      <?php print render($title_prefix); ?>
      
      <?php if (!$page): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix);?>
      <?php if ($display_submitted): ?>
      
      <p class="submitted">
        <?php print $submitted; ?>
        <a href="<?php echo $node_url;?>#comments" class="comment_count"><?php echo $comment_count.'&nbsp;'.$label; ?></a>
      </p>
            <?php endif; ?>
      <?php endif; ?>
      <?php print render($content['body']); ?>
      <?php print render($content['social_share']); ?>
    
  </div><!-- /.content -->

  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
    <footer>
      <?php print render($content['field_tags']); ?>
      <?php print render($content['links']); ?>
    </footer>
  <?php endif; ?>
</div>
  <?php print render($content['comments']); ?>

</article><!-- /.node -->


<?php/*********************************/?>

<?php

/****This code adds link description in the output array****/

// Put this in superfish.module on line 1021

if(!empty($menu_item['link']['localized_options']['attributes']['title'])){
          $output['content'] .=  '<span>'.$menu_item['link']['localized_options']['attributes']['title'].'</span>';
        }
?>
