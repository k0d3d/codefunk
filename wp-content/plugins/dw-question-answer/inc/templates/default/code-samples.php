<?php
/**
 * Template for display for single
 * code sample.
 */

  $postArgs = array(
    'meta_key' => '_answer_id',
    'meta_value' => $answer_id,
    'post_type' => 'funk-sample',
    'orderby'   => 'post_date',
    );
  $code_samples = new WP_QUERY($postArgs);
  // var_dump($code_samples);
  ?>

<?php
  if ($code_samples->have_posts()) :
?>

<h4 class="code-samples-header">
  Submitted Samples
</h4>

<?php endif; ?>

<ul class="code-samples-lists" >
<?php


$count = 0;
// foreach ( $code_samples as $post ) : setup_postdata( $post );
while ($code_samples->have_posts()) :
  $code_samples->the_post();
++$count;
?>
  <li>
    <div class="code-samples-answer">
      <div class="dwqa-vote" data-type="answer" data-nonce="<?php echo wp_create_nonce( '_dwqa_answer_vote_nonce' ) ?>" data-answer="<?php the_ID(); ?>" >
          <a data-vote="up" class="dwqa-vote-dwqa-btn dwqa-vote-up" href="#" title="<?php _e('Vote Up','dwqa') ?>"><?php _e('Vote Up','dwqa') ?> </a>
          <div class="dwqa-vote-count">
          <?php
              $vote = dwqa_vote_count();
              if( $vote > 0 ) {
                  $vote = '+'.$vote;
              }
              echo $vote;
          ?>
          </div>
          <a data-vote="down" class="dwqa-vote-dwqa-btn dwqa-vote-down" href="#"  title="<?php _e('Vote Down','dwqa') ?>"><?php _e('Vote Down','dwqa') ?> </a>
      </div>
      <p>
        <span class="label label-default">#<?php echo $count; ?></span>
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?></a>
          <a href="http://<?php echo get_the_author_meta('user_url', $code_samples->post_author); ?>">
            <em>
              posted by
            </em>
            <strong>
              <?php the_author_meta('display_name', $code_samples->post_author); ?>
            </strong>
          </a>
        <span>
          <a href="#answer-<?php echo $answer_id ?>" title="<?php _e('Link to answer','dwqa') ?> #<?php echo $answer_id ?>">
            <em>
              on
            </em>
           <?php echo get_the_date('l, F j, Y', $code_samples->ID); ?>
          </a>
        </span>
      </p>
      <pre class="line-numbers">
        <code class="language-javascript">
          <?php //the_content(); ?>
  var linesNum = (1 + env.code.split('\n').length);
  var lineNumbersWrapper;

  lines = new Array(linesNum);
  lines = lines.join('<span></span>');        </code>
      </pre>
    </div>
  </li>
<?php
endwhile;
wp_reset_postdata();
// $code_samples->reset_postdata();
// wp_reset_query();
?>

</ul>
