<?php
/*
 * Template Name: Recipe Page 2
 * Template Post Type: post, page, product
 */

get_header();  ?>

<!--Top banner start -->
<div class="container-fluid" style="background:#f4f4f4;">
<div class="row" style="height:300px; background:url(/wp-content/uploads/2018/06/Recipes-Banner.jpg);   background-size:cover;  background-repeat: no-repeat; margin-top:100px;">
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

  <h1 style="color:#fff; margin-top:80px;margin-left:60px;text-shadow: 2px 2px 4px #000000;">Recipes</h1>
  </div>
</div>

</div>
<div class="container-fluid" >
<!-- Top banner end -->



 <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter" style="padding-bottom:40px; padding-top:40px; border-bottom:2px solid #cccccc; text-align:center; margin-top:20px; font-size:16px; margin:0 auto;">

   <br>

   <div class="row" style="width:90%">
         <div class="col-lg-1 col-lg-offset-3 col-md-2 col-sm-3 col-xs-3">
 					   <p style="font-size:24px; margin-top:20px;font-weight:300; text-align:right">VIEW BY</p>


   				 </div>

    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-3">

  <label class="filter"><img src="/wp-content/uploads/2017/12/Appetizers.png" alt="..." class=" img-check1 img-check"><input onChange="submitform()" type="checkbox" name="appetizers" class="hidden" /></label>
         <p style="margin-bottom:0px">Appetizers</p>
    </div>
     <!--
    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">

		<label class="filter"><img  src="/wp-content/uploads/2018/01/breakfast.png" alt="..." class="img-check2 img-check"><input onChange="submitform()" type="checkbox" name="breakfast" class="hidden"/></label>
       <p style="margin-bottom:0px">Breakfast & <br> Brunch</p>
    </div>

-->
      <div class="col-lg-1 col-md-2 col-sm-3 col-xs-3" >

  <label class="filter"><img  src="/wp-content/uploads/2018/01/entrees.png" alt="..." class="img-check3 img-check"><input onChange="submitform()" type="checkbox" name="entrees" class="hidden" /></label>
          <p style="margin-bottom:0px">Entrees</p>
    </div>
       <div class="col-lg-1 col-md-2 col-sm-3 col-xs-3" >
		<label class="filter"><img  src="/wp-content/uploads/2018/01/snacks.png" alt="..." class=" img-check4 img-check"><input onChange="submitform()" type="checkbox" name="snacks" class="hidden"/></label>
             <p style="margin-bottom:0px">Snacks</p>
    </div>

       <div class="col-lg-1 col-md-2 col-sm-3 col-xs-3">

  <label class="filter"><img  src="/wp-content/uploads/2018/01/beverages.png" alt="..." class="img-check5 img-check"><input onChange="submitform()" type="checkbox" name="beverages" class="hidden" /></label>
             <p style="margin-bottom:0px">Beverages</p>
    </div>

      <div class="col-lg-1 col-md-2 col-sm-3 col-xs-3" >
		<label class="filter"><img  src="/wp-content/uploads/2018/01/desserts.png" alt="..." class="img-check6 img-check"><input onChange="submitform()" type="checkbox" name="desserts" class="hidden"/></label>
          <p style="margin-bottom:0px">Desserts</p>
    </div>
        <div class="col-lg-1 col-md-2 col-sm-3 col-xs-3"  >
  <label class="filter"><img src="/wp-content/uploads/2018/01/sides.png" alt="..." class=" img-check7 img-check"><input onChange="submitform()" type="checkbox" name="sides" class="hidden" /></label>
           <p style="margin-bottom:0px">Sides</p>
    </div>


       <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3"  >
     <select id="dropdown-filter" onChange="submitform()" name="foodtype">
       <option value="all">All</option>
         <option value="greekyogurt">Greek Style Yogurts</option>
  <option value="europeanyogurt">European Yogurts</option>
  <option value="artisanalcheese">Artisanal Cheese</option>
  <option value="creamcheese">Cream Cheese</option>
         <option value="pastas">Pastas</option>
		</select>
     </div>


      	<div>
	<button style =" display:none">Filter</button>
	<input type="hidden" name="action" value="myfilter"/>
	</div>
    </div>




  </form>

</div>


<div class="container-fluid" >
  <h2 style="color:rgb(9, 181, 201); margin-top:30px; margin-bottom:30px; text-align:center;">WHAT'S ON OUR TABLE?</h2>
<div id="response">

	<div class="row padding-ten" style="margin-top:50px">

    <?php
$args = array( 'post_type' => 'recipes', 'posts_per_page' => 11 );
$loop = new WP_Query( $args );
$count = 0;
$count2= 1;
while ( $loop->have_posts() ) : $loop->the_post();


?>


<?php if ($count<3):  ?>
 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 recipe-square" style="margin:0px;">

  <div onclick="location.href='<?php the_permalink();?>'"  class="container recipe-img" style="text-align:center; width:100% ;margin:0 auto; background:url(<?php if ( has_post_thumbnail() ) {the_post_thumbnail_url();} ?>); background-size:cover; background-repeat:no-repeat;">
   <div class="overlay1">

     <h2 class="recipe-title"><a style="color:rgb(9, 181, 201); font-size:35px; font-weight:bold;" href="<?php the_permalink(); ?>">SEE THE RECIPE</a> </h2>
   </div>


</div>
   <div style="height:10px; background:rgb(9, 181, 201); margin-top:5px; margin-bottom:5px;">
    </div>
   <h3 style="color:rgb(9, 181, 201);"><?php  the_title(); ?></h3>
   <?php $callfor = get_post_custom_values('custom_callfor'); ?>
   <p class="calls-for"><strong>Calls for:</strong></p>
  <?php  echo wpautop($callfor[0]); ?>
 </div>
 <?php $count++; ?>

<?php if ($count==3): ?>
  </div>


<div class="row" style="padding-bottom:30px; background:#f2f2f2;">
<h2 style="color:rgb(9, 181, 201); margin-top:30px; text-align:center;">More Recipes</h2>
</div>
<?php endif ?>



<?php else: ?>

<?php if (((($count2+2) % 3)==0)): ?>
 <div class="row padding-ten" style="background:#f2f2f2; padding-bottom:20px;">
<?php endif; ?>

 <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 recipe-square">

  <div onclick="location.href='<?php the_permalink();?>'"  class="container recipe-img" style="border:8px solid #cccccc; padding:0px; text-align:center; width:100%;margin:0 auto; background:url(<?php if ( has_post_thumbnail() ) {the_post_thumbnail_url();} ?>); background-size:cover; background-repeat:no-repeat;">

   <div class="overlay1">
     <h3 class="recipe-title"><a style="font-size:35px; color:rgb(9, 181, 201); text-transform:uppercase; font-weight:bold" href="<?php the_permalink(); ?>"><?php  the_title(); ?></a> </h3>
   </div>


</div>

 </div>


<?php if ((($count2 % 3)==0)): ?>
  </div>
<?php endif; ?>

 <?php $count2++; ?>
<?php endif; ?>

<?php endwhile;?>

</div>
</div>
</div>
<script>
    jQuery(document).ready(function(e){
    		jQuery(".img-check1").click(function(){
				jQuery(this).toggleClass("check1");
			});
  			    		jQuery(".img-check2").click(function(){
				jQuery(this).toggleClass("check2");
			});
  			    		jQuery(".img-check3").click(function(){
				jQuery(this).toggleClass("check3");
			});
  			    		jQuery(".img-check4").click(function(){
				jQuery(this).toggleClass("check4");
			});
  				    		jQuery(".img-check5").click(function(){
				jQuery(this).toggleClass("check5");
			});
  			    		jQuery(".img-check6").click(function(){
				jQuery(this).toggleClass("check6");
			});
  			    		jQuery(".img-check7").click(function(){
				jQuery(this).toggleClass("check7");
			});
  			    		jQuery(".img-check8").click(function(){
				jQuery(this).toggleClass("check8");
			});

	});

  $( window ).load(function() {
   var height = jQuery(".recipe-square").width();
  jQuery(".recipe-img").height(height);

  });


  jQuery( window ).resize(function() {
  var height = jQuery(".recipe-square").width();

  jQuery(".recipe-img").height(height);
  });


  jQuery(function($){

	$('#filter').submit(function(){
		var filter = $('#filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Loading'); // changing the button label
			},
			success:function(data){
				filter.find('button').text('Apply'); // changing the button label back
				$('#response').html(data); // insert data
			}

		});
		return false;
	});

});

jQuery( document ).ajaxComplete(function( event,request, settings ) {
   var height = jQuery(".recipe-square").width();
  jQuery(".recipe-img").height(height);
});

function submitform() {
     jQuery('#response').html("<div class='wheel-div'><img class='loading-wheel' src='/wp-content/uploads/2018/03/loading-wheel.gif' height='50' width='50'/></div>");
		var filter = jQuery('#filter');
		jQuery.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				filter.find('button').text('Loading'); // changing the button label
			},
			success:function(data){

				filter.find('button').text('Apply'); // changing the button label back

				jQuery('#response').html(data); // insert data

			}
		});
		return false;


}



</script>

<script>
function togglefilter() {
   // var x = document.getElementById("filter");
   // if (x.style.display === "none") {
    //    x.style.display = "block";
    //} else {
   //     x.style.display = "none";
    //}
  jQuery( "#filter" ).slideToggle( 200, function() {
    // Animation complete.
  });

}

</script>
<style>
  .filter-btn{
  width:80px;
  }
 .container2:hover{
  cursor:pointer;
  }

 .img-check{
  width:80px;
  }

.check1,.img-check1:hover
{
    content:url("/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-01.png");
	color:blue;
}
  .check2,.img-check2:hover
{
    content:url("/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-02.png");
	color:blue;
}
  .check3, .img-check3:hover
{
    content:url("/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-04.png");
	color:blue;
}
    .check4, .img-check4:hover
{
    content:url("/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-05.png");
	color:blue;
}
    .check5, .img-check5:hover
{
    content:url("/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-03.png");
	color:blue;
}
    .check6, .img-check6:hover
{
    content:url("/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-07.png");
	color:blue;
}
    .check7, .img-check7:hover
{
    content:url("/wp-content/uploads/2018/01/R1_KiteHill_RecipePage_Icons_Turquoise-Reverse-06.png");
	color:blue;
}

#dropdown-filter{
  border-radius:10px;
  border-color:#cccccc;
  width:240px;
  height:50px;
  font-size:18px;
  margin-top:20px;
  padding:10px 15px 10px 15px;
  }

 .padding-ten{
  padding-right:5%;
  padding-left:5%;
  }


.calls-for{
  margin-bottom:0px;
  display:inline;
}


.wheel-div{
  text-align:center;
}
</style>





<?php get_footer(); ?>
