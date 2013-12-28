<?php
require_once($_SERVER['DOCUMENT_ROOT']."/app/process/global.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<link REL="SHORTCUT ICON" HREF="/favicon.ico">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="Description" content="Information about beach wheelchairs, holidays for the disabled, senior travel, wheelchair accessible vacation, disabled hotels, accessible vacation, wheelchair accessible hotels, wheelchair travel, disabled traveller, handicapped accessible travel, disabled travel, disability travel, wheelchair vacations, accessible transportation, handicap vacation, disabled cruise, disabled fly, handicapped travel, handicapped tours, vacations for disabled, wheelchair accessible travel, and disabled holidays.">
<meta name="Keywords" content="beach wheelchairs, holidays for the disabled, senior travel, wheelchair accessible vacation, disabled hotels, accessible vacation, wheelchair accessible hotels, wheelchair travel, disabled traveller, handicapped accessible travel, disabled travel, disability travel, wheelchair vacations, accessible transportation, handicap vacation, disabled cruise, disabled fly, handicapped travel, handicapped tours, vacations for disabled, wheelchair accessible travel, disabled holidays"> 

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> <?php } ?> <?php wp_title(); ?> - Beach Wheelchairs | Holidays for the Disabled | Senior Travel | Wheelchair Accessible Vacation | Disabled Hotels | Accessible Vacation | Wheelchair Accessible Hotels | Wheelchair Travel | Disabled Traveler | Handicapped Accessible Travel | Disabled Travel | Disability Travel | Wheelchair Vacations | Accessible Transportation | Handicap Vacation | Disabled Cruise | Disabled Fly | Handicapped Travel | Handicapped Tours | Vacations for Disabled | Wheelchair Accessible Travel | Disabled Holidays</title>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/_resources/css/AT.css" media="screen">
<?php if (!is_front_page() ) { ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/_resources/css/AT_layout2.css" media="screen">
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/_resources/css/AT_form.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/_resources/css/print.css" media="print">
<link rel="shortcut icon" href="/favicon.ico" >

<script type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.validate.min.js"></script>
<script type="text/javascript">
var j = jQuery.noConflict();

<?php if (is_page('67') || is_page('56') || is_page('65')) { ?>
j.validator.addMethod("atleastdigit", function(ph, element) {
if (ph == null) {
return false;
}
return ((/[0-9]+/).test(ph));
}, "Your password must contain at least one number");
<?php } ?>



j(document).ready( function() {
	j("#s").focus(function() {
		if( this.value == this.defaultValue ) {
			this.value = "";
		}
	}).blur(function() {
		if( !this.value.length ) {
			this.value = this.defaultValue;
		}
	});
	<?php if (is_page('47')) { ?>
		j("#contactus").validate();
	<?php } ?>
	
	
	<?php if (is_page('67')) { ?>
	j("#resetpassform").validate({
		rules: {
			regpassword: {
				required: true,
				atleastdigit: true,
				minlength: 7
			},
			regpassword2: {
				equalTo: "#regpassword"
			}
		},
		messages: {
			regpassword: {
				required: "This field is required.",
				atleastdigit: "Your password must contain at least one number",
				minlength: "Your password must be between 7-14 characters long and contain at least one number",
			},
			regpassword2: {
				equalTo: "Please enter the same password as above"
			}
		}
	})
	<?php } ?>
	
	<?php if (is_page('65')) { ?>
		j("#forgotpassword").validate({
		rules: {
			email: {
				required: true,
				email:true
			}
		},
		messages: {
			email: {
				required: "This field is required.",
				email: "Please enter a valid email address."
			}
		}
	})
	<?php } ?>
	
	
	
	<?php if (is_page('56')) { ?>
	j("#registration").validate({
		rules: {
			firstname: {
				required: true
			},
			lastname: {
				required: true
			},
			email: {
				required: true,
				email:true
			},
			regpassword: {
				required: true,
				atleastdigit: true,
				minlength: 7
			},
			regpassword2: {
				required: true,
				equalTo: "#regpassword"
			},
			zipcode: {
				digits: true,
				minlength: 5
			}
		},
		messages: {
			firstname: {
				required: "This field is required."
			},
			lastname: {
				required: "This field is required."
			},
			email: {
				required: "This field is required.",
				email: "Please enter a valid email address."
			},
			regpassword: {
				required: "This field is required.",
				atleastdigit: "Your password must be between 7 and 14 characters, and must contain at least one numeral.",
				minlength: "Your password must be between 7 and 14 characters, and must contain at least one numeral."
			},
			regpassword2: {
				required: "This must exactly match the password you entered above.",
				equalTo: "Please enter the same password as above."
			},
			zipcode: {
				digits: "Please enter a valid zip code.",
				minlength: "Please enter a valid zip code."
			}
		}
	})
	<?php } ?>
	
	
});

	
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="http://abilitytrip.com/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" href="http://abilitytrip.com/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<script type="text/javascript">
$(document).ready(function() {
	
	$("a#fancybtn").fancybox();

});

</script>



<?php wp_head(); ?>
</head>
<body>
<div id="pagecontainer">
