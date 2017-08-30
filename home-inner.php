 <Style>

#carousel {
position: relative;
width:100%;
left:10%;
align:center;
right:10%;
}

#slides {
overflow: hidden;
position: relative;
width: 100%;
//height: 250px;
}

#slides ul {
list-style: none;
width:100%;
//height:250px;
margin: 0;
padding: 0;
position: relative;
}

 #slides li {
width:100%;
//height:250px;
float:left;
text-align: center;
position: relative;
font-family:lato, sans-serif;
}
/* Styling for prev and next buttons */
.btn-bar{
width:60%;
margin:0 auto;
display:block;
position:relative;
//top:40px;
}

 #buttons {
padding:0 0 5px 0;
float:right;
}

#buttons a {
text-align:center;
display:block;
font-size:50px;
float:left;
outline:0;
margin:0 60px;
color:#b14943;
text-decoration:none;
display:block;
padding:9px;
width:35px;
}

a#prev:hover, a#next:hover {
color:#FFF;
text-shadow:.5px 0px #b14943;
}

.quote-phrase, .quote-author {
font-family:sans-serif;
font-weight:300;
display: table-cell;
vertical-align: middle;
padding: 5px 20px;
font-family:'Lato', Calibri, Arial, sans-serif;
}

.quote-phrase {
//height: 200px;
font-size:24px;
color:#FFF;
font-style:italic;
text-shadow:.5px 0px #b14943;
}

.quote-marks {
font-size:30px;
padding:0 3px 3px;
position:inherit;
}

.quote-author {
font-style:normal;
font-size:20px;
color:#b14943;
font-weight:400;
height: 30px;
}

.quoteContainer, .authorContainer {
display: table;
width: 100%;
}
</style>
<script>
	 $(document).ready(function () {
    //rotation speed and timer
    var speed = 5000;

    var run = setInterval(rotate, speed);
    var slides = $('.slide');
    var container = $('#slides ul');
    var elm = container.find(':first-child').prop("tagName");
    var item_width = container.width();
    var previous = 'prev'; //id of previous button
    var next = 'next'; //id of next button
    slides.width(item_width); //set the slides to the correct pixel width
    container.parent().width(item_width);
    container.width(slides.length * item_width); //set the slides container to the correct total width
    container.find(elm + ':first').before(container.find(elm + ':last'));
    resetSlides();


    //if user clicked on prev button

    $('#buttons a').click(function (e) {
        //slide the item

        if (container.is(':animated')) {
            return false;
        }
        if (e.target.id == previous) {
            container.stop().animate({
                'left': 0
            }, 1500, function () {
                container.find(elm + ':first').before(container.find(elm + ':last'));
                resetSlides();
            });
        }

        if (e.target.id == next) {
            container.stop().animate({
                'left': item_width * -2
            }, 1500, function () {
                container.find(elm + ':last').after(container.find(elm + ':first'));
                resetSlides();
            });
        }

        //cancel the link behavior
        return false;

    });

    //if mouse hover, pause the auto rotation, otherwise rotate it
    container.parent().mouseenter(function () {
        clearInterval(run);
    }).mouseleave(function () {
        run = setInterval(rotate, speed);
    });


    function resetSlides() {
        //and adjust the container so current is in the frame
        container.css({
            'left': -1 * item_width
        });
    }

});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

function rotate() {
    $('#next').click();
}
</script>
	  <div class="ult-animation ult-animate-viewport ult-no-mobile"
     data-animate="zoomIn" data-animation-delay="0" data-animation-duration="2" data-animation-iteration="1" style="opacity:0; " data-opacity_start_effect=""><div class="vc_wp_posts wpb_content_element"> <ul class="pointfinder-terms-archive pf-row">
	  <?php
	  $sql = "SELECT * FROM category where frontp = '1' ";

$result = $conn->query($sql);
//print_r($result->num_rows);
//if ($result->num_rows > 0) {
						while($row = $result->fetch_array()) {


	  ?>

	  <li class="pf-grid-item col-lg-3 col-md-4 col-sm-6 col-xs-12 pf-main-term"
    style="font-weight:bold;"><a href="subcategory.php?cid=<?php echo $row['cid']; ?>" title="View all posts under Services">


			 <?php  if($row['thumbnail_img'] != ''){ ?>

			    <img class="group list-group-image" style="height:200px;width: 235px;padding-bottom: 15px;" width="235px" height="250px" src="sellers/uploads/<?php echo $row['thumbnail_img']; ?> " alt="" />

				<?php }else{ ?>
				 <img class="group list-group-image" style="height:200px;width: 235px;padding-bottom: 15px;" width="235px" height="250px" src="images/missing-image.jpg" alt="" />

				<?php } ?>


<br /><span class="pf-main-term-number" style="vertical-align:bottom; text-align:center; margin-top:5px; margin-right:10px;" >

	  <?php echo $row['name']; ?>
	  <?php
	 $sql1 = "SELECT count(*) as cnt FROM `sub_category` WHERE cid = ".$row['cid'];

	 $result1 = $conn->query($sql1);

						while($rowc = $result1->fetch_assoc()) {
						echo '('.$rowc['cnt'].')';

						}
	 ?>

	  </span></a>

	</li>

	  <?php } ?>
	</ul>
	<span style="float:right; font-size:16px; padding:15px; display:block; font-weight:bold; background-color:#ededed;" ><a style="color:black;" href="allcategory.php">view all categories</a></span>
</div>



										<div class="ult-spacer spacer-578a803b72ee1" data-id="578a803b72ee1" data-height="75" data-height-mobile="50" data-height-tab="170" data-height-tab-portrait="140" data-height-mobile-landscape="50" style="clear:both;display:block;"></div></div></div></div></div></div></div><!-- Row Backgrounds -->


									<div class="upb_color" style="padding-top:0px !important;" data-bg-override="0" data-bg-color="#ffffff" data-fadeout="" data-fadeout-percentage="30" data-parallax-content="" data-parallax-content-sense="30" data-row-effect-mobile-disable="true" data-img-parallax-mobile-disable="true" data-rtl="false"  data-custom-vc-row=""  data-vc="4.9.2"  data-theme-support="enable"   data-overlay="false" data-overlay-color="" data-overlay-pattern="" data-overlay-pattern-opacity="" data-overlay-pattern-size=""    data-seperator="true"  data-seperator-type="xlarge_triangle_seperator"  data-seperator-shape-size="40"  data-seperator-svg-height="60"  data-seperator-full-width="true" data-seperator-position="bottom_seperator"  data-seperator-background-color="#2b78aa"  data-icon=""  ></div><div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1429706018029 vc_row-no-padding"><div class="pf-fullwidth">
									<div class="wpb_column col-lg-12 col-md-12"><div class="vc_column-inner ">
									<div class="wpb_wrapper">
									<div class="ult-animation  ult-animate-viewport  ult-no-mobile" data-animate="fadeInDown" data-animation-delay="0.3" data-animation-duration="0.5" data-animation-iteration="1" style="opacity:0;" data-opacity_start_effect="">
									<div id="ultimate-heading-5378578a53323b92e" class="uvc-heading ult-adjust-bottom-margin ultimate-heading-5378578a53323b92e uvc-4452 " data-hspacer="line_only"  data-halign="center" style="text-align:center"><div class="uvc-main-heading ult-responsive"  data-ultimate-target='.uvc-heading.ultimate-heading-5378578a53323b92e h2'  data-responsive-json-new='{"font-size":"desktop:24px;","line-height":""}' >




									<div id="carousel">
  <div class="btn-bar">
     <div id="buttons"><a id="prev" href="#"></a><a id="next" href="#"></a> </div></div>
    <div id="slides">
        <ul>

		  <?php

	  $sql = "SELECT * FROM postrequest";
$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {

		?>

            <li class="slide">
                <div class="quoteContainer">
                          <!--  <p class="quote-author">John Doe // Local Business Owner</p> -->
						  <h2 style="font-family:'Raleway';font-weight:600;color:#ffffff;"><?php echo $row["pro_name"]; ?>
									</h2>

                </div>
                <div class="authorContainer">

					<p class="quote-phrase"><span class="quote-marks">"</span> <?php echo $row["message"]; ?><class="quote-marks">"</span>

                    </p>
                </div>
            </li>
			<?php } ?>

        </ul>
    </div>

</br>
</br>
<a href="sellers/index.php?p=post-request">     Read More..</a>
									</div>
									<div class="uvc-heading-spacer line_only" style="margin-top:15px;margin-bottom:15px;height:2px;">
									<!--<span class="uvc-headings-line" style="border-style:solid;border-bottom-width:2px;border-color:#ffffff;width:20px;"></span> -->

                  </div>
									<div class="uvc-sub-heading ult-responsive"  data-ultimate-target='.uvc-heading.ultimate-heading-5378578a53323b92e .uvc-sub-heading '  data-responsive-json-new='{"font-size":"desktop:15px;","line-height":""}'  style="font-family:'Open Sans';font-weight:normal;color:#ffffff;margin-bottom:40px;"><span style="color: #ffffff;"></span></div></div></div><div class="ult-animation  ult-animate-viewport  ult-no-mobile" data-animate="fadeIn" data-animation-delay="0.4" data-animation-duration="0.5" data-animation-iteration="1" style="opacity:0;" data-opacity_start_effect="">
	<div class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1429705740631">

		<figure class="wpb_wrapper vc_figure">
			<div class="vc_single_image-wrapper   vc_box_border_grey"></div>
		</figure>
	</div>
</div></div></div></div></div></div><!-- Row Backgrounds --><div class="upb_color" data-bg-override="0" data-bg-color="#2b78aa" data-fadeout="fadeout_row_value" data-fadeout-percentage="70" data-parallax-content="parallax_content_value" data-parallax-content-sense="45" data-row-effect-mobile-disable="true" data-img-parallax-mobile-disable="true" data-rtl="false"  data-custom-vc-row=""  data-vc="4.9.2"  data-theme-support="enable"   data-overlay="false" data-overlay-color="" data-overlay-pattern="" data-overlay-pattern-opacity="" data-overlay-pattern-size=""    ></div><div class="vc_row wpb_row vc_row-fluid " style="padding-bottom:0px; padding-top:50px;"><div class="pf-container"><div class="pf-row"><div class="wpb_column col-lg-12 col-md-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="ult-animation  ult-animate-viewport  ult-no-mobile" data-animate="bounceInRight" data-animation-delay="0" data-animation-duration="3" data-animation-iteration="1" style="opacity:0;" data-opacity_start_effect=""><h3 style="font-size: 26px;color: #4c4c4c;line-height: 28px;text-align: center;font-family:Open Sans;font-weight:600;font-style:normal" class="vc_custom_heading">RECENT PRODUCTS</h3></div><div class="vc_empty_space"  style="height: 32px" ><span class="vc_empty_space_inner"></span></div>
<div class="ult-animation  ult-animate-viewport  ult-no-mobile" data-animate="bounceIn" data-animation-delay="0" data-animation-duration="3" data-animation-iteration="1" style="opacity:0;" data-opacity_start_effect=""></div></div></div></div></div></div></div>



		    <div id="jssor_2" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 809px; height: 200px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden;">
		 <?php
	  $sql = "SELECT * FROM `products` p , `company_profile` c, `user_profile` u where p.comp_id = c.id and c.user_id = u.id  and p.verified =1 ORDER BY `p`.`pid` DESC limit 0,10";
//echo $sql;
$result = $conn->query($sql);
//print_r($result->num_rows);
if ($result->num_rows > 0) {
						while($row = $result->fetch_array()) {


	  ?>
            <div style="display: none;">     <a href="productsDes.php?pid=<?php echo $row['pid']; ?>">

			 <?php  if($row['thumnail_url'] != ''){ ?>
			   <img data-u="image"   src="sellers/products/<?php echo $row['user_id']; ?>/<?php echo $row['thumnail_url']; ?> " alt="" /></a>
				<?php }else{ ?>
				 <img data-u="image"   src="images/missing-image.jpg" alt="" /></a>
				<?php } ?>
				 </div>
       <?php } }?>


        </div>
        <!-- Bullet Navigator
        <div data-u="navigator" class="jssorb03" style="bottom:10px;right:10px;">
            <!-- bullet navigator item prototype -->
            <!--<div data-u="prototype" style="width:21px;height:21px;">
                <div data-u="numbertemplate"></div>
            </div>
        </div>-->
        <!-- Arrow Navigator
        <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>-->
    </div>
		   </div></div>
					<script type='text/javascript'>
					(function($) {
						'use strict'
						$('.pflistgridviewRAZDHePVIika-filters-right .pfgridlistit').click(function(){
							$('input[name=pfsearch-filter-col]').val($(this).attr('data-pf-grid'));
							$('#pflistgridviewshowRAZDHePVIika-form').submit();
						});

						$('.pflistgridviewRAZDHePVIika-filters-left > li > label > select').change(function(){
							$('#pflistgridviewshowRAZDHePVIika-form').submit();
						});

						$(function() {
							var intervaltime = 0;
							var makeitperfextpf = setInterval(function() {



								var layout_modes = {
						        fitrows: 'fitRows',
						        masonry: 'masonry'
						        }
						        $('.pflistgridviewRAZDHePVIika-content').each(function(){
						            var $container = $(this);
						            var $thumbs = $container.find('.pfitemlists-content-elements');
						            var layout_mode = $thumbs.attr('data-layout-mode');
						            $thumbs.isotope({
						                itemSelector : '.isotope-item',
						                layoutMode : (layout_modes[layout_mode]==undefined ? 'fitRows' : layout_modes[layout_mode])
						            });

						        });


								intervaltime++;
								if (intervaltime == 5) {
									clearInterval(makeitperfextpf);
								}
							}, 1000);
						});

						$('.pfButtons a').click(function() {
							if($(this).attr('data-pf-link')){
								$.prettyPhoto.open($(this).attr('data-pf-link'));
							}
						});

					})(jQuery);
					</script>
</div></div></div></div></div></div></div><!-- Row Backgrounds --><div class="upb_bg_img" data-ultimate-bg="url()" data-image-id="2192" data-ultimate-bg-style="vcpb-default" data-bg-img-repeat="no-repeat" data-bg-img-size="cover" data-bg-img-position="center" data-parallx_sense="30" data-bg-override="0" data-bg_img_attach="scroll" data-upb-overlay-color="" data-upb-bg-animation="" data-fadeout="" data-bg-animation="left-animation" data-bg-animation-type="h" data-animation-repeat="repeat" data-fadeout-percentage="30" data-parallax-content="" data-parallax-content-sense="30" data-row-effect-mobile-disable="true" data-img-parallax-mobile-disable="true" data-rtl="false"  data-custom-vc-row=""  data-vc="4.9.2"  data-theme-support="enable"   data-overlay="false" data-overlay-color="" data-overlay-pattern="" data-overlay-pattern-opacity="" data-overlay-pattern-size=""    data-seperator="true"  data-seperator-type="tilt_left_seperator"  data-seperator-shape-size="40"  data-seperator-svg-height="60"  data-seperator-full-width="true" data-seperator-position="top_bottom_seperator"  data-seperator-background-color="#ffffff"  data-icon=""  ></div>
                    </div>
            </div>
