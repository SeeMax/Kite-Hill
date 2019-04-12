<?php if( have_rows('find_us_bar', 'option') ):?>
  <?php while ( have_rows('find_us_bar', 'option') ) : the_row();?>
    <?php $image = get_sub_field('image', 'option');?>
    <section class="find-section background-image-section"
    style="background-image:url('<?php echo $image[url];?>')">
      <div class="content">
        <h2>
          <?php the_sub_field('headline', 'option');?>
        </h2>
        <div class="button outlined-button">
          <a class="c-block-fill" href="<?php the_sub_field('button_destination', 'option');?>"></a>
          <span><?php the_sub_field('button_text', 'option');?></span>>
        </div>
      </div>
    </section>
  <?php endwhile;?>
<?php endif;?>
