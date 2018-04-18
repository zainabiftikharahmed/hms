var homeSlider = {
	'slide01' : {
		'url' 	: 'css/img/Carousel/CarouselImage2.jpg',
		'link'	: '',
		'text'	: '',
		'type'	: ''
	},
	'slide02' : {
		'url' 	: 'css/img/Carousel/CarouselImage1.jpg',
		'link'	: '',
		'text'	: '',
		'type'	: ''
	},
	'slide03' : {
		'url' 	: 'css/img/Carousel/CarouselImage3.jpg',
		'link'	: '',
		'text'	: '',
		'type'	: ''
	},
	'slide04' : {
		'url' 	: 'css/img/Carousel/CarouselImage4.jpg',
		'link'	: '',
		'text'	: '',
		'type'	: ''
	},
	'slide05' : {
		'url' 	: 'css/img/Carousel/CarouselImage5.jpg',
		'link'	: '',
		'text'	: '',
		'type'	: ''
	},
	'slide06' : {
		'url' 	: 'css/img/Carousel/CarouselImage6.jpg',
		'link'	: '',
		'text'	: '',
		'type'	: ''
	}
}

$('document').ready(function(){
	/* build slider */
	try{
		buildSlider(function(){
			/* initiate slider */
			$('.slick-slider').on('init', function(){
				$('.slick-slide').each(function(){
					var imgSrc = $(this).children('img').attr('src');
					$(this).css({'background': 'url(' + imgSrc + ') no-repeat center center transparent', 'background-size': 'cover'});
				})
			});

			$('.slick-slider').slick({
				arrows: false,
				dots: true,
				infinite: true,
				slidesToShow: 1,
				adaptiveHeight: false,
				autoplay: true,
				autoplaySpeed: 3000,
				speed: 3000,
				fade: true
			});

			if( $('body').is('#home') ){
                                var slideHeight =470;
                                //var slideHeight = $(window).height() - 170;
				$('.slick-slide').each(function(){
					$(this).height(slideHeight);
				});
			}
			$('.vimeo a.learn-more').prettyPhoto({ theme: 'minimal', default_width: 1022, default_height: 575, social_tools: '', modal:false, opacity: 0.95 });

		});


	} catch( err ){

	}

	/* vertical center pre footer */
	try{
		$('.col.hover-box .heading').each(function(){
			var pHeight = $(this).height();
			var cHeight = $(this).find('h3').height();
			var mTop = (pHeight) / 2 - (cHeight / 2)
			$(this).find('h3').css('margin-top', mTop+'px')
		});
	} catch( err ){}



	/* center position drop downs */
	$('.nav .container > ul > li').each(function(){
		var pWidth = $(this).width();
		var pos = (pWidth/2)- 152.5 + 12;
		$(this).find('.nav-child').css('left', pos+"px");
	});

	/* switch anchors for columns */
	$('.anchor-switch').each(function(){
		var url = $(this).find('a').attr('href');
		var anchor = $(this).parent().children('a');
		anchor.attr('href', url);
		$(this).remove();
	});

	/* nav hover */
	// $('.nav .container > ul > li').bind({
	// 	mouseenter: function() {
	// 		var autoHeight =  $(this).find('ul').height();
	// 		$(this).find('ul').show().css({'visibility': 'visible', 'height': '0px'}).velocity({height: autoHeight}, 150, 'linear');
	// 	},
	// 	mouseleave: function(){
	// 		$(this).find('ul').hide().css({'visibility': 'hidden', 'height': 'auto'});
	// 	}
	// });

});

$(window).load(function(){
		/* equalize special offer height */
	try{
		equalHeight('child', '.box-type-1');
	} catch( err ){

	}
	try{
		equalHeight('parent', $('.gallery .col-wrap'));
	} catch( err ){

	}
	try{
		equalHeight('parent', $('#special-offers'));
	} catch( err ){

	}
});

function buildSlider(callback){
	var html = "";
	for( var key in homeSlider){
	    html += "<div class='" + homeSlider[key].type + "'><img src='" + homeSlider[key].url + "' alt='" + homeSlider[key].text + "' /><div class='content-wrap'><div class='container'>";
	    if( homeSlider[key].text != "" ){
	    	html += "<span>" + homeSlider[key].text + "</span>";
		}
	    html += "</div></div></div>";
	}
	$('.slick-slider').append(html);
	if( typeof callback === 'function'){
		callback.call(this);
	}
}

function equalHeight(type, elem) {
	var maxHeight = 0;

	if( type == 'child'){

		$('.col-wrap').each(function(){
			maxHeight = 0;
			$(this).children(elem).each(function(){
				if($(this).height() > maxHeight ){
					maxHeight = $(this).height();
				}
			});
			$(this).children(elem).each(function(){
				$(this).height(maxHeight);
			});
		});
	} else if ( type == 'parent'){
		elem.children().each(function(){
			if($(this).height() > maxHeight ){
				maxHeight = $(this).height();
			}
		});

		elem.children().each(function(){
			$(this).height(maxHeight);
		});
	}

}