<?php
/*
Single Post Template: Recipes
*/
?>

<?php get_header(); ?>
<div class="container-fluid">

<div class="container container-larger">
<div class="row" style="text-align:center; margin-top:150px; margin-bottom:50px">
 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align:center" >

<?php
    if(have_posts()) : while(have_posts()) : the_post();


   $image2 = get_field('second_image');
   $image3 = get_field('third_image');

?>
<?php if (!empty($image2)): ?>
   <div class="wrapper wrapper-img">
  <input checked type=radio name="slider" id="slide1" />
  <input type=radio name="slider" id="slide2" />
  <input type=radio name="slider" id="slide3" />
  <div class="slider-wrapper">
    <div class=inner>
      <article>
        <div class="info top-left">
          </div>
        <img src="<?php echo get_the_post_thumbnail_url();?>" />
      </article>

      <article>
        <div class="info bottom-right">
          </div>
        <img src="<?php echo $image2['url']; ?>" />
      </article>

      <article>
        <div class="info bottom-left">
         </div>
        <img src="<?php echo $image3['url']; ?>" />
      </article>
    </div>
    <!-- .inner -->
  </div>
  <!-- .slider-wrapper -->
  <div class="slider-prev-next-control">
    <label for=slide1></label>
    <label for=slide2></label>
    <label for=slide3></label>
  </div>
  <!-- .slider-prev-next-control -->

  <div class="slider-dot-control">
    <label for=slide1></label>
    <label for=slide2></label>
    <label for=slide3></label>
  </div>
  <!-- .slider-dot-control -->
</div>
<?php else:
  echo get_the_post_thumbnail();
?>
<?php endif?>

<?php
$credit = get_post_custom_values('custom_credit');
if(!empty($credit)){
	echo '<div class="credit"><em>Photo by: </em>'.$credit[0].'</div>';
	}

?>



  </div>


 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
   <div style="text-align:left; float:left;">
     <h2 style="color:rgb(9, 181, 201);"> <?php the_title();?></h2>
       <?php $description = get_post_custom_values('custom_desc'); ?>
  <p style="font-size:20px; margin-bottom:10px; text-align:left;"> <?php echo $description[0]; ?></p>
     <div class="time-servings" style="margin-bottom:15px;">
   <?php $servings = get_post_custom_values('custom_servings'); ?>
       <?php $time = get_post_custom_values('custom_time'); ?>
     <p style="font-size:17px; display:inline; font-weight:bold;">  <strong>YIELD:</strong> SERVES <?php echo wpautop($servings[0]); ?></p>
       <br>
      <p style="font-size:17px; display:inline; font-weight:bold;"><strong>TIME:</strong> <?php echo wpautop($time[0]); ?></p>
     </div>
     <div class="recipe-type" style="margin-bottom:25px;">
           <?php  $app= get_post_custom_values('custom_checkbox_appetizers');
       $entree= get_post_custom_values('custom_checkbox_entrees');
        $breakfast= get_post_custom_values('custom_checkbox_breakfast');
        $side= get_post_custom_values('custom_checkbox_sides');
      $beverage= get_post_custom_values('custom_checkbox_beverages');
      $snack= get_post_custom_values('custom_checkbox_snacks');
      $dessert= get_post_custom_values('custom_checkbox_desserts');
      if($app):
     				echo '<img width="50px; text-align:left;" src="/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-01.png" alt="icon" />';
      echo str_repeat('&nbsp;', 5);
       endif;
       if($entree):
     		echo '<img width="50px; text-align:left;" src="/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-04.png" alt="icon" />';
      echo str_repeat('&nbsp;', 5);
  		endif;
         if($breakfast):
     			echo '<img width="50px; text-align:left;" src="/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-02.png" alt="icon" />';
      echo str_repeat('&nbsp;', 5);
       endif;
         if($side):
     			echo '<img width="50px; text-align:left;" src="/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-06.png" alt="icon" />';
      echo str_repeat('&nbsp;', 5);
       endif;
          if($beverage):
     			echo '<img width="50px; text-align:left;" src="/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-03.png" alt="icon" />';
      echo str_repeat('&nbsp;', 5);
       endif;
          if($snack):
     			echo '<img width="50px; text-align:left;" src="/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-05.png" alt="icon" />';
      echo str_repeat('&nbsp;', 5);
       endif;
          if($dessert):
     			echo '<img width="50px; text-align:left;" src="/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-07.png" alt="icon" />';
      echo str_repeat('&nbsp;', 5);
       endif;

     ?>
     </div>
     <div>
 <a class="btn-twitter" href="https://twitter.com/intent/tweet?" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=%20Check%20out%20this%20recipe%20' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;" style="margin-left:10px;"> <i class="fa fa-twitter fa-lg"></i></a>
 <a class="btn-facebook" href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;" style="margin-left:4px;">
<i class="fa fa-facebook-official fa-lg"></i></a>
<a class="btn-pintrest" title="Pin it" target="_blank" href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;); e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;); e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;); e.setAttribute(&apos;src&apos;,&apos; http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());' style="margin-left:4px;"><i class="fab fa-pinterest fa-lg"></i></a>

  <a class="btn-email email" href="mailto:?subject=&body=:%20" target="_blank" title="Email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' + encodeURIComponent(document.URL)); return false;" style="margin-left:4px;"><i class="fas fa-envelope fa-lg" ></i></a>
</div>




</div>
 </div>


  </div>
</div>

  <div style="height:10px; background:rgb(9, 181, 201); margin-top:10px; margin-bottom:20px;">
  </div>
</div>
<div class="container">
 <div class="row">
   <div class="col-lg-6 col-md-6">
      <?php $ingredients = get_post_custom_values('custom_ingredients'); ?>
     <h4 style="color:rgb(9, 181, 201); margin-bottom:10px;">What You'll Need</h4>
   <?php echo wpautop($ingredients[0]); ?>
     <br><br>
   <?php $steps = get_post_custom_values('custom_steps'); ?>
     <br>

   </div>
   <div class="col-lg-6 col-md-6">
          <div class="steps">
   <h4 style="text-align:left; color:rgb(9, 181, 201); margin-bottom:10px;">
   Instructions
   </h4>

      <?php echo wpautop($steps[0]); ?>

     </div>
   </div>
  </div>
</div>
<div class="container-fluid">



  <?php endwhile; endif; ?>
 <div class="row padding-ten"  style="background:#f6f4f4">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <h2 style="color:#444; margin-top:50px;padding-left:0px; padding-bottom:40px; position:relative;">MORE RECIPES</h2>
  </div>
  </div>

	<div class="row padding-ten" style="background:#f6f4f4; padding-bottom:50px;">
    <?php
$args = array( 'post_type' => 'recipes', 'posts_per_page' => 4 );
$loop = new WP_Query( $args );
$count = 0;
while ( $loop->have_posts() ) : $loop->the_post();
?>
    <?php if ($count==0){
   $align ="right";
}
    elseif ($count==2){
      $align ="left";
    }
    else{
      $align="center";
    }
    ?>

<?php if ($count<4):  ?>
		 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 recipe-square">

  <div onclick="location.href='<?php the_permalink();?>'"  class="container recipe-img" style="border:8px solid #cccccc; padding:0px; text-align:center; width:100%;margin:0 auto; background:url(<?php if ( has_post_thumbnail() ) {the_post_thumbnail_url();} ?>); background-size:cover; background-repeat:no-repeat;">

   <div class="overlay1">

     <h3 class="recipe-title"><a style="color:rgb(9, 181, 201); text-transform:uppercase;" href="<?php the_permalink(); ?>"><?php  the_title(); ?></a> </h3>
   </div>


</div>

 </div>

 <?php $count++; ?>

<?php if ($count==4): ?>
  </div>
<?php endif;?>
<?php endif; ?>
<?php endwhile; ?>

</div>




<style>
  div p{
  margin-bottom:10px;}

 .time-servings p{
  display:inline;
  }

  .container-larger{
  width:70%;
  }
  .ingredients {
  text-align:left;
  font-weight:400;
  }




  p{
  margin-bottom:0px;
  }

  .align-right{
  float:right;
  }

  .padding-ten{
  padding-left:5%;
  padding-right:5%;
  }

  i{
  color:#444;
  }




  /*---- NUMBER OF SLIDE CONFIGURATION ----*/
.wrapper-img {
  max-width: 60em;
  margin: 1em auto;
  position: relative;
}

input {
  display: none;
}

.inner {
  width: 500%;
  line-height: 0;
}

article {
  width: 20%;
  float: left;
  position: relative;
}
article img {
  width: 80%;
}

/*---- SET UP CONTROL ----*/
.slider-prev-next-control {
  height: 50px;
  position: absolute;
  top: 50%;
  width: 100%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
}
.slider-prev-next-control label {
  display: none;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #fff;
  opacity: 0.7;
}
.slider-prev-next-control label:hover {
  opacity: 1;
}

.slider-dot-control {
  position: absolute;
  width: 100%;
  bottom: 0;
  text-align: center;
}
.slider-dot-control label {
  cursor: pointer;
  border-radius: 5px;
  display: inline-block;
  width: 10px;
  height: 10px;
  background: #bbb;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}
.slider-dot-control label:hover {
  background: #ccc;
  border-color: #777;
}

/* Info Box */
.info {
  position: absolute;
  font-style: italic;
  line-height: 20px;
  opacity: 0;
  color: #000;
  text-align: left;
  -webkit-transition: all 1000ms ease-out 600ms;
  -moz-transition: all 1000ms ease-out 600ms;
  transition: all 1000ms ease-out 600ms;
}
.info h3 {
  color: #fcfff4;
  margin: 0 0 5px;
  font-weight: normal;
  font-size: 1.5em;
  font-style: normal;
}
.info.top-left {
  top: 30px;
  left: 30px;
}
.info.top-right {
  top: 30px;
  right: 30px;
}
.info.bottom-left {
  bottom: 30px;
  left: 30px;
}
.info.bottom-right {
  bottom: 30px;
  right: 30px;
}

/* Slider Styling */
.slider-wrapper {
  width: 100%;
  overflow: hidden;
  border-radius: 5px;

  background: #fff;
  background: #fff;
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  -ms-transform: translateZ(0);
  -o-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-transition: all 500ms ease-out;
  -moz-transition: all 500ms ease-out;
  transition: all 500ms ease-out;
}
.slider-wrapper .inner {
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  -ms-transform: translateZ(0);
  -o-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-transition: all 800ms cubic-bezier(0.77, 0, 0.175, 1);
  -moz-transition: all 800ms cubic-bezier(0.77, 0, 0.175, 1);
  transition: all 800ms cubic-bezier(0.77, 0, 0.175, 1);
}

/*---- SET POSITION FOR SLIDE ----*/
#slide1:checked ~ .slider-prev-next-control label:nth-child(2)::after, #slide2:checked ~ .slider-prev-next-control label:nth-child(3)::after, #slide3:checked ~ .slider-prev-next-control label:nth-child(4)::after, #slide4:checked ~ .slider-prev-next-control label:nth-child(5)::after, #slide5:checked ~ .slider-prev-next-control label:nth-child(1)::after, #slide2:checked ~ .slider-prev-next-control label:nth-child(1)::after, #slide3:checked ~ .slider-prev-next-control label:nth-child(2)::after, #slide4:checked ~ .slider-prev-next-control label:nth-child(3)::after, #slide5:checked ~ .slider-prev-next-control label:nth-child(4)::after, #slide1:checked ~ .slider-prev-next-control label:nth-child(5)::after {
  font-family: FontAwesome;
  font-style: normal;
  font-weight: normal;
  text-decoration: inherit;
  margin: 0;
  line-height: 38px;
  font-size: 3em;
  display: block;
  color: #777;
}

#slide1:checked ~ .slider-prev-next-control label:nth-child(2)::after, #slide2:checked ~ .slider-prev-next-control label:nth-child(3)::after, #slide3:checked ~ .slider-prev-next-control label:nth-child(4)::after, #slide4:checked ~ .slider-prev-next-control label:nth-child(5)::after, #slide5:checked ~ .slider-prev-next-control label:nth-child(1)::after {
  content: "\f105";
  padding-left: 15px;
}

#slide1:checked ~ .slider-prev-next-control label:nth-child(2), #slide2:checked ~ .slider-prev-next-control label:nth-child(3), #slide3:checked ~ .slider-prev-next-control label:nth-child(4), #slide4:checked ~ .slider-prev-next-control label:nth-child(5), #slide5:checked ~ .slider-prev-next-control label:nth-child(1) {
  display: block;
  float: right;
  margin-right: 5px;
}

#slide2:checked ~ .slider-prev-next-control label:nth-child(1), #slide3:checked ~ .slider-prev-next-control label:nth-child(2), #slide4:checked ~ .slider-prev-next-control label:nth-child(3), #slide5:checked ~ .slider-prev-next-control label:nth-child(4), #slide1:checked ~ .slider-prev-next-control label:nth-child(5) {
  display: block;
  float: left;
  margin-left: 5px;
}

#slide2:checked ~ .slider-prev-next-control label:nth-child(1)::after, #slide3:checked ~ .slider-prev-next-control label:nth-child(2)::after, #slide4:checked ~ .slider-prev-next-control label:nth-child(3)::after, #slide5:checked ~ .slider-prev-next-control label:nth-child(4)::after, #slide1:checked ~ .slider-prev-next-control label:nth-child(5)::after {
  content: "\f104";
  padding-left: 8px;
}

#slide1:checked ~ .slider-dot-control label:nth-child(1), #slide2:checked ~ .slider-dot-control label:nth-child(2), #slide3:checked ~ .slider-dot-control label:nth-child(3), #slide4:checked ~ .slider-dot-control label:nth-child(4), #slide5:checked ~ .slider-dot-control label:nth-child(5) {
  background: #333;
}

#slide1:checked ~ .slider-wrapper article:nth-child(1) .info, #slide2:checked ~ .slider-wrapper article:nth-child(2) .info, #slide3:checked ~ .slider-wrapper article:nth-child(3) .info, #slide4:checked ~ .slider-wrapper article:nth-child(4) .info, #slide5:checked ~ .slider-wrapper article:nth-child(5) .info {
  opacity: 1;
}

#slide1:checked ~ .slider-wrapper .inner {
  margin-left: 0%;
}

#slide2:checked ~ .slider-wrapper .inner {
  margin-left: -100%;
}

#slide3:checked ~ .slider-wrapper .inner {
  margin-left: -200%;
}

#slide4:checked ~ .slider-wrapper .inner {
  margin-left: -300%;
}

#slide5:checked ~ .slider-wrapper .inner {
  margin-left: -400%;
}

/*---- TABLET ----*/
@media only screen and (max-width: 850px) and (min-width: 450px) {
  .slider-wrapper {
    border-radius: 0;
  }
}
/*---- MOBILE----*/
@media only screen and (max-width: 450px) {
  .slider-wrapper {
    border-radius: 0;
  }

  .slider-wrapper .info {
    opacity: 0;
  }
}


</style>
<script>
    $( window ).load(function() {
    var height = jQuery(".recipe-square").width();

  jQuery(".recipe-img").height(height);

  });
  </script>
<?php get_footer(); ?>
