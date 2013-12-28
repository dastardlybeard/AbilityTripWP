//Global vars
var clickableCarouselNav = true,
	_gaq,
	isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/),
	galleryOpen = false;

//Filter destinations by location
function destinationFilter(){
	var filterLink = $('.destinationFilter li a');

	$(filterLink).bind('touch click', function(e) {
		e.preventDefault();
		if(!$(this).hasClass('selected')){
			$(filterLink).removeClass('selected');
			$(this).addClass('selected');
			var selectedDestination = $('div.'+$(this).attr('rel'));
			$('.destination:visible').fadeOut('slow', function(){
				$(selectedDestination).fadeIn('slow');
			});
		}
	});
}

//Main letterbox carousel mover
function letterboxMove(movementDirection, relatedItems){
	var $visibleItem = $('.letterboxItem:visible');
	var total = $('.letterboxItem').length;
	var index = $visibleItem.prevAll('.letterboxItem').length;
	var amountToMove = $(window).width();
	clickableCarouselNav = false;
	if (movementDirection === "right") {
		index++;
		if (index === total) {
			index = 0;
		}
		$(relatedItems).eq(index).css({ 'left': amountToMove });
		$visibleItem.stop().animate({
			left: '-' + amountToMove
		}, 'slow', 'easeInOutCirc', function () {
			$(this).hide();
		});
		$(relatedItems).eq(index).show().stop().animate({
			left: '0'
		}, 'slow', 'easeInOutCirc', function(){
			clickableCarouselNav = true;
			$(this).addClass('active');
		});
	} else if (movementDirection === "left") {
		index--;
		if (index === -1) {
			index = total - 1;
		}
		$(relatedItems).eq(index).css({ 'left': '-' + amountToMove + 'px' });
		$visibleItem.stop().animate({ 'left': amountToMove }, 'slow','easeInOutCirc', function () {
			$(this).hide();
		});
		$(relatedItems).eq(index).show().stop().animate({
			left: '0'
		},'slow', 'easeInOutCirc', function(){
			clickableCarouselNav = true;
			$(this).addClass('active');
		});
	}
}
//main carousel initialisation - sets up mouse and touch/swipe events
function letterboxInit(){
	$('.letterboxContainer').removeClass('hidden').show();
	var $elemImgStr = $('.letterboxItem:first').css('background-image').replace('url(', '').replace(')',''),
	$elemImg = $elemImgStr.replace('"','');
	$('body').prepend('<img src="'+$elemImg+'" class="hidden" id="jsImg" />');
	$('#jsImg').load(function(){
		$('.letterboxItem').removeClass('hidden').hide();
		$('.letterboxItem:first').fadeIn(function(){
			$(this).addClass('active');
		});

		if ($('.letterboxItem').length > 1) {
			$('#letterboxContainer .controls').fadeIn();
		}
		$('.letterboxControls a').bind('click touch', function(e){
			e.preventDefault();
			if(clickableCarouselNav === true){
				var relatedItems = $(this).closest('.letterboxContainer').children('.letterboxItem');
				var movementDirection = $(this).attr('class');
				letterboxMove(movementDirection,relatedItems);
			}
		});
		$('.letterboxItem').bind('swiperight', function(){
			if(clickableCarouselNav === true){
				var relatedItems = $('.letterboxContainer:visible').children('.letterboxItem');
				var movementDirection = 'left';
				letterboxMove(movementDirection,relatedItems);
			}
		});
		$('.letterboxItem').bind('swipeleft', function(){
			if(clickableCarouselNav === true){
				var relatedItems = $('.letterboxContainer:visible').children('.letterboxItem');
				var movementDirection = 'right';
				letterboxMove(movementDirection,relatedItems);
			}
		});
	});
}
//Moving the smaller location carousels
function locationCarouselMove(containerWidth, movementDirection, carItemWidth, carouselWidth){
		var carousel = $('.popularCarouselContainer ul'),
		totalToMove = carouselWidth - containerWidth,
		leftPos = parseFloat($(carousel).css('left').replace('px',''));
	if(movementDirection === 'right'){
		if(leftPos > -totalToMove){
			$(carousel).animate({
				left: '-='+carItemWidth
			});
		}
	} else {
		if(leftPos < 0){
			$(carousel).animate({
				left: '+='+carItemWidth
			});
		}
	}
}
//Initialise the small popular destination style carousel
function locationCarouselInit(){
	var numberOfCars = $('.popularCarouselContainer li').length,
		carItemWidth = $('.popularCarouselContainer li').eq(0).width(),
		carouselWidth = carItemWidth * numberOfCars,
		containerWidth = $('.popularCarouselContainer').parent().width(),
		navLinks = $('.popularCarouselControls a');
	if(numberOfCars>0){
		$('.popularCarouselContainer').fadeIn();
	}
	$('.popularCarouselContainer ul').width(carouselWidth).fadeIn();
	if(carouselWidth > containerWidth){
		$(navLinks).parent().addClass('visible');
	}
	$(navLinks).bind('click touch', function(e){
		e.preventDefault();
		if(clickableCarouselNav === true){
			var movementDirection = $(this).attr('class');
			locationCarouselMove(containerWidth, movementDirection, carItemWidth, carouselWidth);
		}
	});
}
//Adds a sticky sidebar to the side of the page
function sideBarStick(){
	
	var sideBar = $('#sideBar'),
		$window = $(window),
		$stickyArea = $('#mainContent').offset().top,
		$endOfthePage = parseInt($('#pageFooter').offset().top, 10),
		$distance = $(sideBar).offset().top;
	$(window).scroll(function () {
		if (($window.scrollTop() >= $distance) && (($window.scrollTop() + $window.height()) < $endOfthePage)) {
			$(sideBar).removeClass('stuck').addClass('sticky');
		}else if($window.scrollTop() < $stickyArea){
			$(sideBar).removeClass('sticky');
		}else if(($window.scrollTop() + $window.height()) > $endOfthePage +100){
			$(sideBar).addClass('stuck').removeClass('sticky');
		}
	});
}

//Closes the gallery again
function galleryClose(){
	$('.closeBtn').bind('click touch', function(e){
		galleryOpen = false;
		e.preventDefault();
		$('#mainGalleryImage, .closeBtn').fadeOut(function(){
			$('.postGallery').removeClass('active');
		});
	});
}

//Initialises the main gallery, intended for destination posts
function galleryInit(){
	var galleryItems = $('.postGallery li a');
		//Pre-load gallery images
		$(window).load(function(){
			$(galleryItems).each(function(){
				var imgSrc = $(this).attr('href');
				$('body').prepend('<img src="'+imgSrc+'" class="hidden" />');
			});
		});
		$(galleryItems).bind('click touch',function(e){
			e.preventDefault();
			var clickedLink = $(this),
				srcToLoad = clickedLink.attr('href'),
				title = clickedLink.attr('title'),
				caption =  clickedLink.attr('rel');
			if (galleryOpen === false) {
				galleryOpen = true;
				$('.postGallery').addClass('active');
				$('#mainGalleryImage img').attr('src',srcToLoad);
				$('#mainGalleryImage h3').html(title);
				$('#mainGalleryImage p').html(caption);
				$('#mainGalleryImage, #mainGalleryImage img').delay(300).fadeIn();
				$('.closeBtn').fadeIn(function(){
					galleryClose();
				});
			}else{
				$('#mainGalleryImage').fadeOut(function(){
					$('#mainGalleryImage img').attr('src', srcToLoad);
					$('#mainGalleryImage h3').html(title);
					$('#mainGalleryImage p').html(caption);
					$('#mainGalleryImage').fadeIn();
					galleryClose();
				});
			}
		});
}

$(document).ready(function(){

		/*isSafari = navigator.userAgent.match(/(Safari)/),
		isChrome = navigator.userAgent.match(/(Chrome)/),
		isIos = navigator.platform.match(/(iPad|iPhone|iPod)/);*/

	$('.mainNav li').each(function(){
		$(this).append('<span class="locationIndicator"></span>');
	});
	//In case there is no 'current' nav item or we are in the Forums since bbpress does not support this
	var urlStr = $(location).attr('href');
	if ($('.current-menu-item').length === 0) {
		if(urlStr.indexOf('forums')!== -1){
			$('.forumMenu').addClass('current-menu-item');
		}else{
			$('#menu-main-menu li').first().addClass('current-menu-item');
		}
	}
	var currentNav = $('#menu-main-menu .current-menu-item'),
		offset,
		scrollLocation,
		pageStart = currentNav.offset();
	//Above: Set variables and distance between the edge of the page and the position of the 'Current' nav
	//Below: When we hover over, we get the position of the tag you have hovered over by looking at it's parent id, then setting that as the position to return to. We minus the difference in page start to make sure it always moves to the beginning of the hovered item
	$('.mainNav li > a').mouseover(function () {
		scrollLocation = $(this).parent().attr('id');
        offset = $('#' + scrollLocation).offset();
        $('.locationIndicator').stop().animate({
            left: (offset.left - pageStart.left)
        }, { easing: 'easeInOutCubic' });
    });
	
	// Below: When we mouse out we just move it back to where it started. We could be more programatic but, as we are moving back to the far left, using an absolute is ok in the instance and is clearer to the reader what's happening.
    $('.mainNav li > a').mouseout(function () {
        $('.locationIndicator').stop().animate({
            left: 0
        }, { easing: 'easeInOutCubic' });
    });
	if ($('#letterboxContainer').length > 0){
		letterboxInit();
		if (!isMobile) {
			$(window).scroll(function () {
				if ($(window).width()>1500) {
					$(".letterboxItem").css({backgroundPosition:"0 " + (-$(window).scrollTop() / 3) + "px"});
				}else{
					$(".letterboxItem").css({backgroundPosition:"0 " + ($(window).scrollTop() / 2) + "px"});
				}
			});
		}
	}
	if($('.popularCarouselContainer').length >0){
		locationCarouselInit();
	}
	if ($('#sideBar').length >0) {
		if($(window).width()>600){
			sideBarStick();
		}
		galleryInit();
		$('.quicklinks ul li a').click(function (e) {
			e.preventDefault();
			$('.quicklinks ul li a').removeClass('selected');
			$(this).addClass('selected');
			var scrollLocationId = $(this).attr('href');
			var scrollLocation = $(scrollLocationId);
			if (scrollLocation.length) {
				var top = scrollLocation.offset().top;
				$('html,body').stop().animate({ scrollTop: top }, 1000, 'swing');
			}
			_gaq.push(['_trackEvent', 'navigation','click', $(this).attr('class')]);
		});
	}
	if ($('.destinationFilter li a').length > 0 ) {
		destinationFilter();
	}
	//Mobile navigation:
	$('.mobileNavTrigger').bind('click touch', function(e){
		e.preventDefault();
		$('.mobileNav').slideToggle('fast');
		$('.mobileNavTrigger span').toggle();
	});
});