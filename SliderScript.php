
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
<script type="text/javascript">
 $(document).omSlider({
	 slider: $('.slider'),
	 dots: $('.dots'),
	 next:$('.btn-right'),
	 pre:$('.btn-left'),
	 timer: 5000,
	 showtime: 5000
 });
 </script>
 <style>
 .banner {
margin-bottom: 20px;
padding-left:2%
z-index: 1;
}
.banner .slider {
position: relative;
padding-left:2%
}
.banner .slider ul {
margin: 0;
padding-left:2%
list-style: none;
width: 100%;
height: 250px;
overflow: hidden;
position: relative;
}
.banner .slider ul li {
position: absolute;
padding-left:2%
top: 0;
}
.banner .slider .dots:after {
display: table;
clear: both;
content: "";
}
.banner .slider .dots {
position: absolute;
bottom: 20px;
left: 60%;
z-index: 40;
*zoom: 1;
}
.banner .slider .dots a {
display: block;
float: left;
width: 12px;
height: 12px;
margin-right: 10px;
text-indent: -9999em;
background: #000;
border-radius: 10px;
}
.banner .slider .dots .cur {
background: #329;
}
.banner .slider .arrow {
width: 65%;
position: absolute;
top: 45%;
left: 1%;
z-index: 50;
color: #000;
}
.banner .slider .arrow a {
font-family: "Microsoft YaHei";
font-size: 50px;
font-weight: 700;
color: #fff;
}
.banner .slider .arrow .btn-left {
float: left;
}
.banner .slider .arrow .btn-right {
float: right;
}
		 /* jssor slider bullet navigator skin 05 css */
		 /*
		 .jssorb05 div           (normal)
		 .jssorb05 div:hover     (normal mouseover)
		 .jssorb05 .av           (active)
		 .jssorb05 .av:hover     (active mouseover)
		 .jssorb05 .dn           (mousedown)
		 */
		 .jssorb05 {
				 position: absolute;
		 }
		 .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
				 position: absolute;
				 /* size of bullet elment */
				 width: 16px;
				 height: 16px;
				 background: url('img/b05.png') no-repeat;
				 overflow: hidden;
				 cursor: pointer;
		 }
		 .jssorb05 div { background-position: -7px -7px; }
		 .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
		 .jssorb05 .av { background-position: -67px -7px; }
		 .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

		 /* jssor slider arrow navigator skin 22 css */
		 /*
		 .jssora22l                  (normal)
		 .jssora22r                  (normal)
		 .jssora22l:hover            (normal mouseover)
		 .jssora22r:hover            (normal mouseover)
		 .jssora22l.jssora22ldn      (mousedown)
		 .jssora22r.jssora22rdn      (mousedown)
		 */
		 .jssora22l, .jssora22r {
				 display: block;
				 position: absolute;
				 /* size of arrow element */
				 width: 40px;
				 height: 58px;
				 cursor: pointer;
				 background: url('img/a22.png') center center no-repeat;
				 overflow: hidden;
		 }
		 .jssora22l { background-position: -10px -31px; }
		 .jssora22r { background-position: -70px -31px; }
		 .jssora22l:hover { background-position: -130px -31px; }
		 .jssora22r:hover { background-position: -190px -31px; }
		 .jssora22l.jssora22ldn { background-position: -250px -31px; }
		 .jssora22r.jssora22rdn { background-position: -310px -31px; }
 </style>
 <script>
			jssor_2_slider_init = function() {

					var jssor_2_options = {
						$AutoPlay: true,
						$AutoPlaySteps: 2,
						$SlideDuration: 160,
						$SlideWidth: 160,
						$SlideSpacing: 2,
						$Cols: 5,
						$ArrowNavigatorOptions: {
							$Class: $JssorArrowNavigator$,
							$Steps: 4
						},
						$BulletNavigatorOptions: {
							$Class: $JssorBulletNavigator$,
							$SpacingX: 1,
							$SpacingY: 1
						}
					};

					var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_2_options);

					//responsive code begin
					//you can remove responsive code if you don't want the slider scales while window resizing
					function ScaleSlider() {
							var refSize = jssor_2_slider.$Elmt.parentNode.clientWidth;
							if (refSize) {
									refSize = Math.min(refSize, 1000);
									jssor_2_slider.$ScaleWidth(refSize);
							}
							else {
									window.setTimeout(ScaleSlider, 30);
							}
					}
					ScaleSlider();
					$Jssor$.$AddEvent(window, "load", ScaleSlider);
					$Jssor$.$AddEvent(window, "resize", ScaleSlider);
					$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
					//responsive code end
			};

$(".dropdown dt a").on('click', function() {
$(".dropdown dd ul").slideToggle('fast');
});

$(".dropdown dd ul li a").on('click', function() {
$(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function(e) {
var $clicked = $(e.target);
if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
	title = $(this).val() + ",";
//$(this).text()
if ($(this).is(':checked')) {
	var html = '<span title="' + title + '">' + title + '</span>';
	$(".hida").hide();
	$('.multiSel').append(html);

$('input[name=supplier_id]').val(st);

} else {
	$('span[title="' + title + '"]').remove();
	var ret = $(".hida");
	$('.dropdown dt a').append(ret);

}
});
	</script>
<script>
			jssor_2_slider_init();
	</script>
