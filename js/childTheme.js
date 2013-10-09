/**
 * File Name childTheme.js
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.2
 * @updated 06.28.13
 **/
jQuery(document).ready(function($) {
	
	childTheme.init({
		scaleFix : true,
		displayIEMessage : true
	});
	
});






/**
 * childTheme
 * @version 1.0
 * @updated 06.28.13
 **/
var childTheme = {
	
	
	/**
	 * init
	 * @version 1.0
	 * @updated 06.28.13
	 **/
	init : function( params ) {
		
		childTheme.setParams(params);
		
		childTheme.mbpScaleFix();
		childTheme.checkIEVersion();
		
		this.appendMenu();
		this.scrollTo();
		this.mailChimp();
		this.faq();
		this.classes();
		this.singleClass();
		this.cForms();
		
	}, // end init : function 
	
	
	
	/**
	 * cForms
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	cForms : function() {
		
		var form =jQuery('form.cform');
		jQuery('label[for="message"]', form).addClass('label-message');
		
	}, // end cForms
	
	
	
	/**
	 * singleClass
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	purchaseCloned : 0,
	singleClass : function() {
		
		if ( jQuery('body').hasClass('single-class') ) {
			var classText = jQuery('h1').text();
			var btn = jQuery('#btn-purchase');
			var btnClone = jQuery('#btn-purchase').clone();
			jQuery(btnClone).prepend( '<span class="icon-wordpress"></span> ' + classText + ': &nbsp; ' );
			jQuery('body').append('<div id="btn-float-wrapper" style="display:none;"></div>');
			
			childTheme.scrollToEnrollment();
			
			btn.waypoint(function() {
				
				if ( childTheme.getPurchaseCloned() == 1 ) {
					jQuery('#btn-float-wrapper').fadeOut(200, function() {
						childTheme.clearPurchaseCloned();
						childTheme.scrollToEnrollment();
					});
				} else {
					jQuery('#btn-float-wrapper').html(btnClone).fadeIn(200, function() {
						childTheme.setPurchaseCloned();
						childTheme.scrollToEnrollment();
					});
				}

			}, { offset: '0%' });
		
		} // end if ( jQuery('body').hasClass('single-class') )
		
		
	}, // end singleClass : function
	setPurchaseCloned : function() {
		childTheme.purchaseCloned = 1;
	},
	clearPurchaseCloned : function() {
		childTheme.purchaseCloned = 0;
	},
	getPurchaseCloned : function() {
		return childTheme.purchaseCloned;
	},
	
	
	
	/**
	 * scrollToEnrollment
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	scrollToEnrollment : function() {
		
		jQuery('.pre-enroll, .express-interest').click(function(event) {
			event.preventDefault();
			var click = jQuery(this);
			jQuery('input#name').focus();
			jQuery('html,body').animate({ 
				scrollTop : ( jQuery(click.attr('href')).offset().top - 100 )
				}, 300 );
		});
		
	}, // end scrollToEnrollment : function
	
	
	
	/**
	 * classes
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	classes : function() {
		
		if ( jQuery('body').hasClass('post-type-archive-class') ) {
			jQuery('body.post-type-archive-class #content-wrap h1').prepend('<span class="icon-wordpress"></span>&nbsp;');
		}
		
	}, // end classes : function
	
	
	
	/**
	 * faq
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	faq : function() {
		
		if ( jQuery('body').hasClass('post-type-archive-faq') ) {
			
			jQuery('body.post-type-archive-faq #content-wrap h1').prepend('<span class="icon-lifebuoy"></span>&nbsp;');
			jQuery('body.post-type-archive-faq #loop-archive-faq .h5').click(function() {
				jQuery(this).next().slideToggle(200);
			});
			
			
			if ( window.location.hash ) {
				jQuery(window.location.hash + ' .entry').slideToggle(200);
				jQuery('html,body').animate({ 
					scrollTop : ( jQuery(window.location.hash).offset().top - 100 )
					}, 300 );
			}
			
			
		}
		
	}, // end faq : function
	
	
	
	/**
	 * mailChimp
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	mailChimp : function() {
		
		jQuery('.widget_mailchimpsf_widget .widget-title-wrap').prepend('<span class="icon-envelope"></span>&nbsp;');
		
	}, // end mailChimp : function
	
	
	
	/**
	 * scrollTo
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	scrollTo : function() {
		
		jQuery('.scrollto').click(function(event) {
            event.preventDefault();			
			var click = jQuery(this);
			
			jQuery('html,body').animate({ 
				scrollTop : ( jQuery(click.attr('data-hash')).offset().top - 30 )
				}, 500 );

		});
		
	}, // end scrollTo : function
	
	
	
	/**
	 * appendMenu
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	appendMenu : function() {
		
		jQuery('#menu-primary-menu').prepend('<li class=\"menu\"><span class="icon-reorder"></span></li>');
		
	}, // end appendMenu : function 
	
	
	
	/**
	 * mbpScaleFix
	 * @version 1.0
	 * @updated 06.28.13
	 **/
	scaleFix : false,
	mbpScaleFix : function() {
		
		if ( typeof MBP != 'undefined' && childTheme.scaleFix == true ) {
			MBP.scaleFix();
		}
		
	}, // end mbpScaleFix : function
	
	
	
	/**
	 * Return IE Message in body tag
	 * @version 1.0
	 * @updated 11.18.12
	 **/
	displayIEMessage : false,
	ieVersion : get_ie_version(),
	ieMessage : 'You are using an outdated version of Internet Explorer please update your copy for a better experience.',
	checkIEVersion : function() {
		
		if ( childTheme.displayIEMessage == true && childTheme.ieVersion > -1 && childTheme.ieVersion <= 7.0 ) {
			jQuery('body').prepend('<div class="bad-ie-message" style="display:block;text-align:center;font-size:11px;padding-top:7px;height:15px;overflow:hidden;color:#000;background:#fff;width:100%;"><p>'+childTheme.ieMessage+'</p></div>');
		}
		
	}, // end checkIEVersion : function
	
	
	
	// ##################################################
	/**
	 * Setters
	 **/
	// ##################################################
	
	
	
	/**
	 * setParams
	 * 
	 * version 1.0
	 * updated 00.00.13
	 **/
	setParams : function( params ) {
		
		if ( typeof params != 'undefined' ) {
			
			if ( typeof params.scaleFix != 'undefined' && params.scaleFix == true ) {
				childTheme.scaleFix = params.scaleFix;
			}
			
			if ( typeof params.displayIEMessage != 'undefined' && params.displayIEMessage == true ) {
				childTheme.displayIEMessage = params.displayIEMessage;
			}
			
		}
		
	}  // end setParams : function
	
	
	
}; // end var childTheme