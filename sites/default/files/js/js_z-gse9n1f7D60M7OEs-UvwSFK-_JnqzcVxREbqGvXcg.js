/*!
 * jCarousel - Riding carousels with jQuery
 *   http://sorgalla.com/jcarousel/
 *
 * Copyright (c) 2006 Jan Sorgalla (http://sorgalla.com)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Built on top of the jQuery library
 *   http://jquery.com
 *
 * Inspired by the "Carousel Component" by Bill Scott
 *   http://billwscott.com/carousel/
 */

(function(g){var q={vertical:!1,rtl:!1,start:1,offset:1,size:null,scroll:3,visible:null,animation:"normal",easing:"swing",auto:0,wrap:null,initCallback:null,setupCallback:null,reloadCallback:null,itemLoadCallback:null,itemFirstInCallback:null,itemFirstOutCallback:null,itemLastInCallback:null,itemLastOutCallback:null,itemVisibleInCallback:null,itemVisibleOutCallback:null,animationStepCallback:null,buttonNextHTML:"<div></div>",buttonPrevHTML:"<div></div>",buttonNextEvent:"click",buttonPrevEvent:"click", buttonNextCallback:null,buttonPrevCallback:null,itemFallbackDimension:null},m=!1;g(window).bind("load.jcarousel",function(){m=!0});g.jcarousel=function(a,c){this.options=g.extend({},q,c||{});this.autoStopped=this.locked=!1;this.buttonPrevState=this.buttonNextState=this.buttonPrev=this.buttonNext=this.list=this.clip=this.container=null;if(!c||c.rtl===void 0)this.options.rtl=(g(a).attr("dir")||g("html").attr("dir")||"").toLowerCase()=="rtl";this.wh=!this.options.vertical?"width":"height";this.lt=!this.options.vertical? this.options.rtl?"right":"left":"top";for(var b="",d=a.className.split(" "),f=0;f<d.length;f++)if(d[f].indexOf("jcarousel-skin")!=-1){g(a).removeClass(d[f]);b=d[f];break}a.nodeName.toUpperCase()=="UL"||a.nodeName.toUpperCase()=="OL"?(this.list=g(a),this.clip=this.list.parents(".jcarousel-clip"),this.container=this.list.parents(".jcarousel-container")):(this.container=g(a),this.list=this.container.find("ul,ol").eq(0),this.clip=this.container.find(".jcarousel-clip"));if(this.clip.size()===0)this.clip= this.list.wrap("<div></div>").parent();if(this.container.size()===0)this.container=this.clip.wrap("<div></div>").parent();b!==""&&this.container.parent()[0].className.indexOf("jcarousel-skin")==-1&&this.container.wrap('<div class=" '+b+'"></div>');this.buttonPrev=g(".jcarousel-prev",this.container);if(this.buttonPrev.size()===0&&this.options.buttonPrevHTML!==null)this.buttonPrev=g(this.options.buttonPrevHTML).appendTo(this.container);this.buttonPrev.addClass(this.className("jcarousel-prev"));this.buttonNext= g(".jcarousel-next",this.container);if(this.buttonNext.size()===0&&this.options.buttonNextHTML!==null)this.buttonNext=g(this.options.buttonNextHTML).appendTo(this.container);this.buttonNext.addClass(this.className("jcarousel-next"));this.clip.addClass(this.className("jcarousel-clip")).css({position:"relative"});this.list.addClass(this.className("jcarousel-list")).css({overflow:"hidden",position:"relative",top:0,margin:0,padding:0}).css(this.options.rtl?"right":"left",0);this.container.addClass(this.className("jcarousel-container")).css({position:"relative"}); !this.options.vertical&&this.options.rtl&&this.container.addClass("jcarousel-direction-rtl").attr("dir","rtl");var j=this.options.visible!==null?Math.ceil(this.clipping()/this.options.visible):null,b=this.list.children("li"),e=this;if(b.size()>0){var h=0,i=this.options.offset;b.each(function(){e.format(this,i++);h+=e.dimension(this,j)});this.list.css(this.wh,h+100+"px");if(!c||c.size===void 0)this.options.size=b.size()}this.container.css("display","block");this.buttonNext.css("display","block");this.buttonPrev.css("display", "block");this.funcNext=function(){e.next()};this.funcPrev=function(){e.prev()};this.funcResize=function(){e.resizeTimer&&clearTimeout(e.resizeTimer);e.resizeTimer=setTimeout(function(){e.reload()},100)};this.options.initCallback!==null&&this.options.initCallback(this,"init");!m&&g.browser.safari?(this.buttons(!1,!1),g(window).bind("load.jcarousel",function(){e.setup()})):this.setup()};var f=g.jcarousel;f.fn=f.prototype={jcarousel:"0.2.8"};f.fn.extend=f.extend=g.extend;f.fn.extend({setup:function(){this.prevLast= this.prevFirst=this.last=this.first=null;this.animating=!1;this.tail=this.resizeTimer=this.timer=null;this.inTail=!1;if(!this.locked){this.list.css(this.lt,this.pos(this.options.offset)+"px");var a=this.pos(this.options.start,!0);this.prevFirst=this.prevLast=null;this.animate(a,!1);g(window).unbind("resize.jcarousel",this.funcResize).bind("resize.jcarousel",this.funcResize);this.options.setupCallback!==null&&this.options.setupCallback(this)}},reset:function(){this.list.empty();this.list.css(this.lt, "0px");this.list.css(this.wh,"10px");this.options.initCallback!==null&&this.options.initCallback(this,"reset");this.setup()},reload:function(){this.tail!==null&&this.inTail&&this.list.css(this.lt,f.intval(this.list.css(this.lt))+this.tail);this.tail=null;this.inTail=!1;this.options.reloadCallback!==null&&this.options.reloadCallback(this);if(this.options.visible!==null){var a=this,c=Math.ceil(this.clipping()/this.options.visible),b=0,d=0;this.list.children("li").each(function(f){b+=a.dimension(this, c);f+1<a.first&&(d=b)});this.list.css(this.wh,b+"px");this.list.css(this.lt,-d+"px")}this.scroll(this.first,!1)},lock:function(){this.locked=!0;this.buttons()},unlock:function(){this.locked=!1;this.buttons()},size:function(a){if(a!==void 0)this.options.size=a,this.locked||this.buttons();return this.options.size},has:function(a,c){if(c===void 0||!c)c=a;if(this.options.size!==null&&c>this.options.size)c=this.options.size;for(var b=a;b<=c;b++){var d=this.get(b);if(!d.length||d.hasClass("jcarousel-item-placeholder"))return!1}return!0}, get:function(a){return g(">.jcarousel-item-"+a,this.list)},add:function(a,c){var b=this.get(a),d=0,p=g(c);if(b.length===0)for(var j,e=f.intval(a),b=this.create(a);;){if(j=this.get(--e),e<=0||j.length){e<=0?this.list.prepend(b):j.after(b);break}}else d=this.dimension(b);p.get(0).nodeName.toUpperCase()=="LI"?(b.replaceWith(p),b=p):b.empty().append(c);this.format(b.removeClass(this.className("jcarousel-item-placeholder")),a);p=this.options.visible!==null?Math.ceil(this.clipping()/this.options.visible): null;d=this.dimension(b,p)-d;a>0&&a<this.first&&this.list.css(this.lt,f.intval(this.list.css(this.lt))-d+"px");this.list.css(this.wh,f.intval(this.list.css(this.wh))+d+"px");return b},remove:function(a){var c=this.get(a);if(c.length&&!(a>=this.first&&a<=this.last)){var b=this.dimension(c);a<this.first&&this.list.css(this.lt,f.intval(this.list.css(this.lt))+b+"px");c.remove();this.list.css(this.wh,f.intval(this.list.css(this.wh))-b+"px")}},next:function(){this.tail!==null&&!this.inTail?this.scrollTail(!1): this.scroll((this.options.wrap=="both"||this.options.wrap=="last")&&this.options.size!==null&&this.last==this.options.size?1:this.first+this.options.scroll)},prev:function(){this.tail!==null&&this.inTail?this.scrollTail(!0):this.scroll((this.options.wrap=="both"||this.options.wrap=="first")&&this.options.size!==null&&this.first==1?this.options.size:this.first-this.options.scroll)},scrollTail:function(a){if(!this.locked&&!this.animating&&this.tail){this.pauseAuto();var c=f.intval(this.list.css(this.lt)), c=!a?c-this.tail:c+this.tail;this.inTail=!a;this.prevFirst=this.first;this.prevLast=this.last;this.animate(c)}},scroll:function(a,c){!this.locked&&!this.animating&&(this.pauseAuto(),this.animate(this.pos(a),c))},pos:function(a,c){var b=f.intval(this.list.css(this.lt));if(this.locked||this.animating)return b;this.options.wrap!="circular"&&(a=a<1?1:this.options.size&&a>this.options.size?this.options.size:a);for(var d=this.first>a,g=this.options.wrap!="circular"&&this.first<=1?1:this.first,j=d?this.get(g): this.get(this.last),e=d?g:g-1,h=null,i=0,k=!1,l=0;d?--e>=a:++e<a;){h=this.get(e);k=!h.length;if(h.length===0&&(h=this.create(e).addClass(this.className("jcarousel-item-placeholder")),j[d?"before":"after"](h),this.first!==null&&this.options.wrap=="circular"&&this.options.size!==null&&(e<=0||e>this.options.size)))j=this.get(this.index(e)),j.length&&(h=this.add(e,j.clone(!0)));j=h;l=this.dimension(h);k&&(i+=l);if(this.first!==null&&(this.options.wrap=="circular"||e>=1&&(this.options.size===null||e<= this.options.size)))b=d?b+l:b-l}for(var g=this.clipping(),m=[],o=0,n=0,j=this.get(a-1),e=a;++o;){h=this.get(e);k=!h.length;if(h.length===0){h=this.create(e).addClass(this.className("jcarousel-item-placeholder"));if(j.length===0)this.list.prepend(h);else j[d?"before":"after"](h);if(this.first!==null&&this.options.wrap=="circular"&&this.options.size!==null&&(e<=0||e>this.options.size))j=this.get(this.index(e)),j.length&&(h=this.add(e,j.clone(!0)))}j=h;l=this.dimension(h);if(l===0)throw Error("jCarousel: No width/height set for items. This will cause an infinite loop. Aborting..."); this.options.wrap!="circular"&&this.options.size!==null&&e>this.options.size?m.push(h):k&&(i+=l);n+=l;if(n>=g)break;e++}for(h=0;h<m.length;h++)m[h].remove();i>0&&(this.list.css(this.wh,this.dimension(this.list)+i+"px"),d&&(b-=i,this.list.css(this.lt,f.intval(this.list.css(this.lt))-i+"px")));i=a+o-1;if(this.options.wrap!="circular"&&this.options.size&&i>this.options.size)i=this.options.size;if(e>i){o=0;e=i;for(n=0;++o;){h=this.get(e--);if(!h.length)break;n+=this.dimension(h);if(n>=g)break}}e=i-o+ 1;this.options.wrap!="circular"&&e<1&&(e=1);if(this.inTail&&d)b+=this.tail,this.inTail=!1;this.tail=null;if(this.options.wrap!="circular"&&i==this.options.size&&i-o+1>=1&&(d=f.intval(this.get(i).css(!this.options.vertical?"marginRight":"marginBottom")),n-d>g))this.tail=n-g-d;if(c&&a===this.options.size&&this.tail)b-=this.tail,this.inTail=!0;for(;a-- >e;)b+=this.dimension(this.get(a));this.prevFirst=this.first;this.prevLast=this.last;this.first=e;this.last=i;return b},animate:function(a,c){if(!this.locked&& !this.animating){this.animating=!0;var b=this,d=function(){b.animating=!1;a===0&&b.list.css(b.lt,0);!b.autoStopped&&(b.options.wrap=="circular"||b.options.wrap=="both"||b.options.wrap=="last"||b.options.size===null||b.last<b.options.size||b.last==b.options.size&&b.tail!==null&&!b.inTail)&&b.startAuto();b.buttons();b.notify("onAfterAnimation");if(b.options.wrap=="circular"&&b.options.size!==null)for(var c=b.prevFirst;c<=b.prevLast;c++)c!==null&&!(c>=b.first&&c<=b.last)&&(c<1||c>b.options.size)&&b.remove(c)}; this.notify("onBeforeAnimation");if(!this.options.animation||c===!1)this.list.css(this.lt,a+"px"),d();else{var f=!this.options.vertical?this.options.rtl?{right:a}:{left:a}:{top:a},d={duration:this.options.animation,easing:this.options.easing,complete:d};if(g.isFunction(this.options.animationStepCallback))d.step=this.options.animationStepCallback;this.list.animate(f,d)}}},startAuto:function(a){if(a!==void 0)this.options.auto=a;if(this.options.auto===0)return this.stopAuto();if(this.timer===null){this.autoStopped= !1;var c=this;this.timer=window.setTimeout(function(){c.next()},this.options.auto*1E3)}},stopAuto:function(){this.pauseAuto();this.autoStopped=!0},pauseAuto:function(){if(this.timer!==null)window.clearTimeout(this.timer),this.timer=null},buttons:function(a,c){if(a==null&&(a=!this.locked&&this.options.size!==0&&(this.options.wrap&&this.options.wrap!="first"||this.options.size===null||this.last<this.options.size),!this.locked&&(!this.options.wrap||this.options.wrap=="first")&&this.options.size!==null&& this.last>=this.options.size))a=this.tail!==null&&!this.inTail;if(c==null&&(c=!this.locked&&this.options.size!==0&&(this.options.wrap&&this.options.wrap!="last"||this.first>1),!this.locked&&(!this.options.wrap||this.options.wrap=="last")&&this.options.size!==null&&this.first==1))c=this.tail!==null&&this.inTail;var b=this;this.buttonNext.size()>0?(this.buttonNext.unbind(this.options.buttonNextEvent+".jcarousel",this.funcNext),a&&this.buttonNext.bind(this.options.buttonNextEvent+".jcarousel",this.funcNext), this.buttonNext[a?"removeClass":"addClass"](this.className("jcarousel-next-disabled")).attr("disabled",a?!1:!0),this.options.buttonNextCallback!==null&&this.buttonNext.data("jcarouselstate")!=a&&this.buttonNext.each(function(){b.options.buttonNextCallback(b,this,a)}).data("jcarouselstate",a)):this.options.buttonNextCallback!==null&&this.buttonNextState!=a&&this.options.buttonNextCallback(b,null,a);this.buttonPrev.size()>0?(this.buttonPrev.unbind(this.options.buttonPrevEvent+".jcarousel",this.funcPrev), c&&this.buttonPrev.bind(this.options.buttonPrevEvent+".jcarousel",this.funcPrev),this.buttonPrev[c?"removeClass":"addClass"](this.className("jcarousel-prev-disabled")).attr("disabled",c?!1:!0),this.options.buttonPrevCallback!==null&&this.buttonPrev.data("jcarouselstate")!=c&&this.buttonPrev.each(function(){b.options.buttonPrevCallback(b,this,c)}).data("jcarouselstate",c)):this.options.buttonPrevCallback!==null&&this.buttonPrevState!=c&&this.options.buttonPrevCallback(b,null,c);this.buttonNextState= a;this.buttonPrevState=c},notify:function(a){var c=this.prevFirst===null?"init":this.prevFirst<this.first?"next":"prev";this.callback("itemLoadCallback",a,c);this.prevFirst!==this.first&&(this.callback("itemFirstInCallback",a,c,this.first),this.callback("itemFirstOutCallback",a,c,this.prevFirst));this.prevLast!==this.last&&(this.callback("itemLastInCallback",a,c,this.last),this.callback("itemLastOutCallback",a,c,this.prevLast));this.callback("itemVisibleInCallback",a,c,this.first,this.last,this.prevFirst, this.prevLast);this.callback("itemVisibleOutCallback",a,c,this.prevFirst,this.prevLast,this.first,this.last)},callback:function(a,c,b,d,f,j,e){if(!(this.options[a]==null||typeof this.options[a]!="object"&&c!="onAfterAnimation")){var h=typeof this.options[a]=="object"?this.options[a][c]:this.options[a];if(g.isFunction(h)){var i=this;if(d===void 0)h(i,b,c);else if(f===void 0)this.get(d).each(function(){h(i,this,d,b,c)});else for(var a=function(a){i.get(a).each(function(){h(i,this,a,b,c)})},k=d;k<=f;k++)k!== null&&!(k>=j&&k<=e)&&a(k)}}},create:function(a){return this.format("<li></li>",a)},format:function(a,c){for(var a=g(a),b=a.get(0).className.split(" "),d=0;d<b.length;d++)b[d].indexOf("jcarousel-")!=-1&&a.removeClass(b[d]);a.addClass(this.className("jcarousel-item")).addClass(this.className("jcarousel-item-"+c)).css({"float":this.options.rtl?"right":"left","list-style":"none"}).attr("jcarouselindex",c);return a},className:function(a){return a+" "+a+(!this.options.vertical?"-horizontal":"-vertical")}, dimension:function(a,c){var b=g(a);if(c==null)return!this.options.vertical?b.outerWidth(!0)||f.intval(this.options.itemFallbackDimension):b.outerHeight(!0)||f.intval(this.options.itemFallbackDimension);else{var d=!this.options.vertical?c-f.intval(b.css("marginLeft"))-f.intval(b.css("marginRight")):c-f.intval(b.css("marginTop"))-f.intval(b.css("marginBottom"));g(b).css(this.wh,d+"px");return this.dimension(b)}},clipping:function(){return!this.options.vertical?this.clip[0].offsetWidth-f.intval(this.clip.css("borderLeftWidth"))- f.intval(this.clip.css("borderRightWidth")):this.clip[0].offsetHeight-f.intval(this.clip.css("borderTopWidth"))-f.intval(this.clip.css("borderBottomWidth"))},index:function(a,c){if(c==null)c=this.options.size;return Math.round(((a-1)/c-Math.floor((a-1)/c))*c)+1}});f.extend({defaults:function(a){return g.extend(q,a||{})},intval:function(a){a=parseInt(a,10);return isNaN(a)?0:a},windowLoaded:function(){m=!0}});g.fn.jcarousel=function(a){if(typeof a=="string"){var c=g(this).data("jcarousel"),b=Array.prototype.slice.call(arguments, 1);return c[a].apply(c,b)}else return this.each(function(){var b=g(this).data("jcarousel");b?(a&&g.extend(b.options,a),b.reload()):g(this).data("jcarousel",new f(this,a))})}})(jQuery);
;
/**
 * @file
 * Add jCarousel behaviors to the page and provide Views-support.
 */

(function($) {

Drupal.behaviors.jcarousel = {};
Drupal.behaviors.jcarousel.attach = function(context, settings) {
  settings = settings || Drupal.settings;

  // If no carousels exist on this part of the page, work no further. 
  if (!settings.jcarousel || !settings.jcarousel.carousels) {
    return;
  }

  $.each(settings.jcarousel.carousels, function(key, options) {
    var $carousel = $(options.selector + ':not(.jcarousel-processed)', context);

    // If this carousel has already been processed or doesn't exist, move on.
    if (!$carousel.length) {
      return;
    }

    // Callbacks need to be converted from a string to an actual function.
    $.each(options, function(optionKey) {
      if (optionKey.match(/Callback$/) && typeof options[optionKey] == 'string') {
        var callbackFunction = window;
        var callbackParents = options[optionKey].split('.');
        $.each(callbackParents, function(objectParent) {
          callbackFunction = callbackFunction[callbackParents[objectParent]];
        });
        options[optionKey] = callbackFunction;
      }
    });

    // Add standard options required for AJAX functionality.
    if (options.ajax && !options.itemLoadCallback) {
      options.itemLoadCallback = Drupal.jcarousel.ajaxLoadCallback;
    }

    // If auto-scrolling, pause animation when hoving over the carousel.
    if (options.auto && options.autoPause && !options.initCallback) {
      options.initCallback = function(carousel, state) {
        Drupal.jcarousel.autoPauseCallback(carousel, state);
      };
    }

    // Add navigation to the carousel if enabled.
    if (!options.setupCallback) {
      options.setupCallback = function(carousel) {
        Drupal.jcarousel.setupCarousel(carousel);
        if (options.navigation) {
          Drupal.jcarousel.addNavigation(carousel, options.navigation);
        }
      };
      if (options.navigation && !options.itemVisibleInCallback) {
        options.itemLastInCallback = {
          onAfterAnimation: Drupal.jcarousel.updateNavigationActive
        };
      }
    }

    if (!options.hasOwnProperty('buttonNextHTML') && !options.hasOwnProperty('buttonPrevHTML')) {
      options.buttonNextHTML = Drupal.theme('jCarouselButton', 'next');
      options.buttonPrevHTML = Drupal.theme('jCarouselButton', 'previous');
    }

    // Initialize the jcarousel.
    $carousel.addClass('jcarousel-processed').jcarousel(options);
  });
};

Drupal.jcarousel = {};
Drupal.jcarousel.ajaxLoadCallback = function(jcarousel, state) {
  // Check if the requested items already exist.
  if (state == 'init' || jcarousel.has(jcarousel.first, jcarousel.last)) {
    return;
  }

  var $list = jcarousel.list;
  var $view = $list.parents('.view:first');
  var ajaxPath = Drupal.settings.jcarousel.ajaxPath;
  var target = $view.get(0);

  // Find this view's settings in the Views AJAX settings.
  var settings;
  $.each(Drupal.settings.jcarousel.carousels, function(domID, carouselSettings) {
    if ($list.is('.' + domID)) {
      settings = carouselSettings['view_options'];
    }
  });

  // Copied from ajax_view.js:
  var viewData = { 'js': 1, 'first': jcarousel.first - 1, 'last': jcarousel.last };
  // Construct an object using the settings defaults and then overriding
  // with data specific to the link.
  $.extend(
    viewData,
    settings
  );

  $.ajax({
    url: ajaxPath,
    type: 'GET',
    data: viewData,
    success: function(response) {
      Drupal.jcarousel.ajaxResponseCallback(jcarousel, target, response);
    },
    error: function(xhr) {
      Drupal.jcarousel.ajaxErrorCallback(xhr, ajaxPath);
    },
    dataType: 'json'
  });

};

/**
 * Init callback for jCarousel. Pauses the carousel when hovering over.
 */
Drupal.jcarousel.autoPauseCallback = function(carousel, state) {
  function pauseAuto() {
    carousel.stopAuto();
  }
  function resumeAuto() {
    carousel.startAuto();
  }
  carousel.clip.hover(pauseAuto, resumeAuto);
  carousel.buttonNext.hover(pauseAuto, resumeAuto);
  carousel.buttonPrev.hover(pauseAuto, resumeAuto);
};

/**
 * Setup callback for jCarousel. Calculates number of pages.
 */
Drupal.jcarousel.setupCarousel = function(carousel) {
  // Determine the number of pages this carousel includes.
  // This only works for a positive starting point. Also, .first is 1-based
  // while .last is a count, so we need to reset the .first number to be
  // 0-based to make the math work.
  carousel.pageSize = carousel.last - (carousel.first - 1);

  // jCarousel's Views integration sets "size" in the carousel options. Use that
  // if available, otherwise count the number of items in the carousel.
  var itemCount = carousel.options.size ? carousel.options.size : $(carousel.list).children('li').length;
  carousel.pageCount =  Math.ceil(itemCount / carousel.pageSize);
  carousel.pageNumber = 1;

  // Disable the previous/next arrows if there is only one page.
  if (carousel.pageCount == 1) {
    carousel.buttonNext.addClass('jcarousel-next-disabled').attr('disabled', true);
    carousel.buttonPrev.addClass('jcarousel-prev-disabled').attr('disabled', true);
  }

  // Always remove the hard-coded display: block from the navigation.
  carousel.buttonNext.css('display', '');
  carousel.buttonPrev.css('display', '');
}

/**
 * Setup callback for jCarousel. Adds the navigation to the carousel if enabled.
 */
Drupal.jcarousel.addNavigation = function(carousel, position) {
  // Don't add a pager if there's only one page of results.
  if (carousel.pageCount <= 1) {
    return;
  }

  // Add a class to the wrapper so it can adjust CSS.
  $(carousel.list).parents('.jcarousel-container:first').addClass('jcarousel-navigation-' + position);

  var navigation = $('<ul class="jcarousel-navigation"></ul>');

  for (var i = 1; i <= carousel.pageCount; i++) {
    var pagerItem = $(Drupal.theme('jCarouselPageLink', i));
    var listItem = $('<li></li>').attr('jcarousel-page', i).append(pagerItem);
    navigation.append(listItem);

    // Make the first page active by default.
    if (i === 1) {
      listItem.addClass('active');
    }

    // Scroll to the correct page when a pager is clicked.
    pagerItem.bind('click', function() {
      // We scroll to the new page based on item offsets. This works with
      // circular carousels that do not divide items evenly, making it so that
      // going back or forward in pages will not skip or repeat any items.
      var newPageNumber = $(this).parent().attr('jcarousel-page');
      var itemOffset = (newPageNumber - carousel.pageNumber) * carousel.pageSize;

      if (itemOffset) {
        carousel.scroll(carousel.first + itemOffset);
      }

      return false;
    });
  }

  $(carousel.list).parents('.jcarousel-clip:first')[position](navigation);
}

/**
 * itemVisibleInCallback for jCarousel. Update the navigation after page change.
 */
Drupal.jcarousel.updateNavigationActive = function(carousel, item, idx, state) {
  // The navigation doesn't even exist yet when this is called on init.
  var $listItems = $(carousel.list).parents('.jcarousel-container:first').find('.jcarousel-navigation li');
  if ($listItems.length == 0) {
    return;
  }

  // jCarousel does some very odd things with circular wraps. Items before the
  // first item are given negative numbers and items after the last are given
  // numbers beyond the total number of items. This complicated logic calculates
  // which page number is active based off this numbering scheme.
  var pageNumber = Math.ceil(idx / carousel.pageSize);
  if (pageNumber <= 0 || pageNumber > carousel.pageCount) {
    pageNumber = pageNumber % carousel.pageCount;
    pageNumber = pageNumber == 0 ? carousel.pageCount : pageNumber;
    pageNumber = pageNumber < 0 ? pageNumber + carousel.pageCount : pageNumber;
  }
  carousel.pageNumber = pageNumber;
  var currentPage = $listItems.get(carousel.pageNumber - 1);

  // Set the current page to be active.
  $listItems.not(currentPage).removeClass('active');
  $(currentPage).addClass('active');
}

/**
 * AJAX callback for all jCarousel-style views.
 */
Drupal.jcarousel.ajaxResponseCallback = function(jcarousel, target, response) {
  if (response.debug) {
    alert(response.debug);
  }

  var $view = $(target);
  var jcarousel = $view.find('ul.jcarousel').data('jcarousel');

  // Add items to the jCarousel.
  $('ul.jcarousel > li', response.display).each(function(i) {
    var itemNumber = this.className.replace(/.*?jcarousel-item-(\d+).*/, '$1');
    jcarousel.add(itemNumber, this.innerHTML);
  });

  // Add Drupal behaviors to the content of the carousel to affect new items.
  Drupal.attachBehaviors(jcarousel.list.get(0));

  // Treat messages the same way that Views typically handles messages.
  if (response.messages) {
    // Show any messages (but first remove old ones, if there are any).
    $view.find('.views-messages').remove().end().prepend(response.messages);
  }
};

/**
 * Display error messages using the same mechanism as Views module.
 */
Drupal.jcarousel.ajaxErrorCallback = function (xhr, path) {
  var error_text = '';

  if ((xhr.status == 500 && xhr.responseText) || xhr.status == 200) {
    error_text = xhr.responseText;

    // Replace all &lt; and &gt; by < and >
    error_text = error_text.replace("/&(lt|gt);/g", function (m, p) {
      return (p == "lt")? "<" : ">";
    });

    // Now, replace all html tags by empty spaces
    error_text = error_text.replace(/<("[^"]*"|'[^']*'|[^'">])*>/gi,"");

    // Fix end lines
    error_text = error_text.replace(/[\n]+\s+/g,"\n");
  }
  else if (xhr.status == 500) {
    error_text = xhr.status + ': ' + Drupal.t("Internal server error. Please see server or PHP logs for error information.");
  }
  else {
    error_text = xhr.status + ': ' + xhr.statusText;
  }

  alert(Drupal.t("An error occurred at @path.\n\nError Description: @error", {'@path': path, '@error': error_text}));
};

Drupal.theme.prototype.jCarouselButton = function(type) {
  // Use links for buttons for accessibility.
  return '<a href="javascript:void(0)"></a>';
};

Drupal.theme.prototype.jCarouselPageLink = function(pageNumber) {
  return '<a href="javascript:void(0)"><span>' + (pageNumber) + '</span></a>';
};

})(jQuery);
;
/*!
 * jQuery Cycle Plugin (with Transition Definitions)
 * Examples and documentation at: http://jquery.malsup.com/cycle/
 * Copyright (c) 2007-2012 M. Alsup
 * Version: 2.9999.81 (15-JAN-2013)
 * Dual licensed under the MIT and GPL licenses.
 * http://jquery.malsup.com/license.html
 * Requires: jQuery v1.7.1 or later
 */
;(function($, undefined) {
"use strict";

var ver = '2.9999.81';

function debug(s) {
	if ($.fn.cycle.debug)
		log(s);
}		
function log() {
	if (window.console && console.log)
		console.log('[cycle] ' + Array.prototype.join.call(arguments,' '));
}
$.expr[':'].paused = function(el) {
	return el.cyclePause;
};


// the options arg can be...
//   a number  - indicates an immediate transition should occur to the given slide index
//   a string  - 'pause', 'resume', 'toggle', 'next', 'prev', 'stop', 'destroy' or the name of a transition effect (ie, 'fade', 'zoom', etc)
//   an object - properties to control the slideshow
//
// the arg2 arg can be...
//   the name of an fx (only used in conjunction with a numeric value for 'options')
//   the value true (only used in first arg == 'resume') and indicates
//	 that the resume should occur immediately (not wait for next timeout)

$.fn.cycle = function(options, arg2) {
	var o = { s: this.selector, c: this.context };

	// in 1.3+ we can fix mistakes with the ready state
	if (this.length === 0 && options != 'stop') {
		if (!$.isReady && o.s) {
			log('DOM not ready, queuing slideshow');
			$(function() {
				$(o.s,o.c).cycle(options,arg2);
			});
			return this;
		}
		// is your DOM ready?  http://docs.jquery.com/Tutorials:Introducing_$(document).ready()
		log('terminating; zero elements found by selector' + ($.isReady ? '' : ' (DOM not ready)'));
		return this;
	}

	// iterate the matched nodeset
	return this.each(function() {
		var opts = handleArguments(this, options, arg2);
		if (opts === false)
			return;

		opts.updateActivePagerLink = opts.updateActivePagerLink || $.fn.cycle.updateActivePagerLink;
		
		// stop existing slideshow for this container (if there is one)
		if (this.cycleTimeout)
			clearTimeout(this.cycleTimeout);
		this.cycleTimeout = this.cyclePause = 0;
		this.cycleStop = 0; // issue #108

		var $cont = $(this);
		var $slides = opts.slideExpr ? $(opts.slideExpr, this) : $cont.children();
		var els = $slides.get();

		if (els.length < 2) {
			log('terminating; too few slides: ' + els.length);
			return;
		}

		var opts2 = buildOptions($cont, $slides, els, opts, o);
		if (opts2 === false)
			return;

		var startTime = opts2.continuous ? 10 : getTimeout(els[opts2.currSlide], els[opts2.nextSlide], opts2, !opts2.backwards);

		// if it's an auto slideshow, kick it off
		if (startTime) {
			startTime += (opts2.delay || 0);
			if (startTime < 10)
				startTime = 10;
			debug('first timeout: ' + startTime);
			this.cycleTimeout = setTimeout(function(){go(els,opts2,0,!opts.backwards);}, startTime);
		}
	});
};

function triggerPause(cont, byHover, onPager) {
	var opts = $(cont).data('cycle.opts');
	if (!opts)
		return;
	var paused = !!cont.cyclePause;
	if (paused && opts.paused)
		opts.paused(cont, opts, byHover, onPager);
	else if (!paused && opts.resumed)
		opts.resumed(cont, opts, byHover, onPager);
}

// process the args that were passed to the plugin fn
function handleArguments(cont, options, arg2) {
	if (cont.cycleStop === undefined)
		cont.cycleStop = 0;
	if (options === undefined || options === null)
		options = {};
	if (options.constructor == String) {
		switch(options) {
		case 'destroy':
		case 'stop':
			var opts = $(cont).data('cycle.opts');
			if (!opts)
				return false;
			cont.cycleStop++; // callbacks look for change
			if (cont.cycleTimeout)
				clearTimeout(cont.cycleTimeout);
			cont.cycleTimeout = 0;
			if (opts.elements)
				$(opts.elements).stop();
			$(cont).removeData('cycle.opts');
			if (options == 'destroy')
				destroy(cont, opts);
			return false;
		case 'toggle':
			cont.cyclePause = (cont.cyclePause === 1) ? 0 : 1;
			checkInstantResume(cont.cyclePause, arg2, cont);
			triggerPause(cont);
			return false;
		case 'pause':
			cont.cyclePause = 1;
			triggerPause(cont);
			return false;
		case 'resume':
			cont.cyclePause = 0;
			checkInstantResume(false, arg2, cont);
			triggerPause(cont);
			return false;
		case 'prev':
		case 'next':
			opts = $(cont).data('cycle.opts');
			if (!opts) {
				log('options not found, "prev/next" ignored');
				return false;
			}
			$.fn.cycle[options](opts);
			return false;
		default:
			options = { fx: options };
		}
		return options;
	}
	else if (options.constructor == Number) {
		// go to the requested slide
		var num = options;
		options = $(cont).data('cycle.opts');
		if (!options) {
			log('options not found, can not advance slide');
			return false;
		}
		if (num < 0 || num >= options.elements.length) {
			log('invalid slide index: ' + num);
			return false;
		}
		options.nextSlide = num;
		if (cont.cycleTimeout) {
			clearTimeout(cont.cycleTimeout);
			cont.cycleTimeout = 0;
		}
		if (typeof arg2 == 'string')
			options.oneTimeFx = arg2;
		go(options.elements, options, 1, num >= options.currSlide);
		return false;
	}
	return options;
	
	function checkInstantResume(isPaused, arg2, cont) {
		if (!isPaused && arg2 === true) { // resume now!
			var options = $(cont).data('cycle.opts');
			if (!options) {
				log('options not found, can not resume');
				return false;
			}
			if (cont.cycleTimeout) {
				clearTimeout(cont.cycleTimeout);
				cont.cycleTimeout = 0;
			}
			go(options.elements, options, 1, !options.backwards);
		}
	}
}

function removeFilter(el, opts) {
	if (!$.support.opacity && opts.cleartype && el.style.filter) {
		try { el.style.removeAttribute('filter'); }
		catch(smother) {} // handle old opera versions
	}
}

// unbind event handlers
function destroy(cont, opts) {
	if (opts.next)
		$(opts.next).unbind(opts.prevNextEvent);
	if (opts.prev)
		$(opts.prev).unbind(opts.prevNextEvent);
	
	if (opts.pager || opts.pagerAnchorBuilder)
		$.each(opts.pagerAnchors || [], function() {
			this.unbind().remove();
		});
	opts.pagerAnchors = null;
	$(cont).unbind('mouseenter.cycle mouseleave.cycle');
	if (opts.destroy) // callback
		opts.destroy(opts);
}

// one-time initialization
function buildOptions($cont, $slides, els, options, o) {
	var startingSlideSpecified;
	// support metadata plugin (v1.0 and v2.0)
	var opts = $.extend({}, $.fn.cycle.defaults, options || {}, $.metadata ? $cont.metadata() : $.meta ? $cont.data() : {});
	var meta = $.isFunction($cont.data) ? $cont.data(opts.metaAttr) : null;
	if (meta)
		opts = $.extend(opts, meta);
	if (opts.autostop)
		opts.countdown = opts.autostopCount || els.length;

	var cont = $cont[0];
	$cont.data('cycle.opts', opts);
	opts.$cont = $cont;
	opts.stopCount = cont.cycleStop;
	opts.elements = els;
	opts.before = opts.before ? [opts.before] : [];
	opts.after = opts.after ? [opts.after] : [];

	// push some after callbacks
	if (!$.support.opacity && opts.cleartype)
		opts.after.push(function() { removeFilter(this, opts); });
	if (opts.continuous)
		opts.after.push(function() { go(els,opts,0,!opts.backwards); });

	saveOriginalOpts(opts);

	// clearType corrections
	if (!$.support.opacity && opts.cleartype && !opts.cleartypeNoBg)
		clearTypeFix($slides);

	// container requires non-static position so that slides can be position within
	if ($cont.css('position') == 'static')
		$cont.css('position', 'relative');
	if (opts.width)
		$cont.width(opts.width);
	if (opts.height && opts.height != 'auto')
		$cont.height(opts.height);

	if (opts.startingSlide !== undefined) {
		opts.startingSlide = parseInt(opts.startingSlide,10);
		if (opts.startingSlide >= els.length || opts.startSlide < 0)
			opts.startingSlide = 0; // catch bogus input
		else 
			startingSlideSpecified = true;
	}
	else if (opts.backwards)
		opts.startingSlide = els.length - 1;
	else
		opts.startingSlide = 0;

	// if random, mix up the slide array
	if (opts.random) {
		opts.randomMap = [];
		for (var i = 0; i < els.length; i++)
			opts.randomMap.push(i);
		opts.randomMap.sort(function(a,b) {return Math.random() - 0.5;});
		if (startingSlideSpecified) {
			// try to find the specified starting slide and if found set start slide index in the map accordingly
			for ( var cnt = 0; cnt < els.length; cnt++ ) {
				if ( opts.startingSlide == opts.randomMap[cnt] ) {
					opts.randomIndex = cnt;
				}
			}
		}
		else {
			opts.randomIndex = 1;
			opts.startingSlide = opts.randomMap[1];
		}
	}
	else if (opts.startingSlide >= els.length)
		opts.startingSlide = 0; // catch bogus input
	opts.currSlide = opts.startingSlide || 0;
	var first = opts.startingSlide;

	// set position and zIndex on all the slides
	$slides.css({position: 'absolute', top:0, left:0}).hide().each(function(i) {
		var z;
		if (opts.backwards)
			z = first ? i <= first ? els.length + (i-first) : first-i : els.length-i;
		else
			z = first ? i >= first ? els.length - (i-first) : first-i : els.length-i;
		$(this).css('z-index', z);
	});

	// make sure first slide is visible
	$(els[first]).css('opacity',1).show(); // opacity bit needed to handle restart use case
	removeFilter(els[first], opts);

	// stretch slides
	if (opts.fit) {
		if (!opts.aspect) {
	        if (opts.width)
	            $slides.width(opts.width);
	        if (opts.height && opts.height != 'auto')
	            $slides.height(opts.height);
		} else {
			$slides.each(function(){
				var $slide = $(this);
				var ratio = (opts.aspect === true) ? $slide.width()/$slide.height() : opts.aspect;
				if( opts.width && $slide.width() != opts.width ) {
					$slide.width( opts.width );
					$slide.height( opts.width / ratio );
				}

				if( opts.height && $slide.height() < opts.height ) {
					$slide.height( opts.height );
					$slide.width( opts.height * ratio );
				}
			});
		}
	}

	if (opts.center && ((!opts.fit) || opts.aspect)) {
		$slides.each(function(){
			var $slide = $(this);
			$slide.css({
				"margin-left": opts.width ?
					((opts.width - $slide.width()) / 2) + "px" :
					0,
				"margin-top": opts.height ?
					((opts.height - $slide.height()) / 2) + "px" :
					0
			});
		});
	}

	if (opts.center && !opts.fit && !opts.slideResize) {
		$slides.each(function(){
			var $slide = $(this);
			$slide.css({
				"margin-left": opts.width ? ((opts.width - $slide.width()) / 2) + "px" : 0,
				"margin-top": opts.height ? ((opts.height - $slide.height()) / 2) + "px" : 0
			});
		});
	}
		
	// stretch container
	var reshape = (opts.containerResize || opts.containerResizeHeight) && !$cont.innerHeight();
	if (reshape) { // do this only if container has no size http://tinyurl.com/da2oa9
		var maxw = 0, maxh = 0;
		for(var j=0; j < els.length; j++) {
			var $e = $(els[j]), e = $e[0], w = $e.outerWidth(), h = $e.outerHeight();
			if (!w) w = e.offsetWidth || e.width || $e.attr('width');
			if (!h) h = e.offsetHeight || e.height || $e.attr('height');
			maxw = w > maxw ? w : maxw;
			maxh = h > maxh ? h : maxh;
		}
		if (opts.containerResize && maxw > 0 && maxh > 0)
			$cont.css({width:maxw+'px',height:maxh+'px'});
		if (opts.containerResizeHeight && maxh > 0)
			$cont.css({height:maxh+'px'});
	}

	var pauseFlag = false;  // https://github.com/malsup/cycle/issues/44
	if (opts.pause)
		$cont.bind('mouseenter.cycle', function(){
			pauseFlag = true;
			this.cyclePause++;
			triggerPause(cont, true);
		}).bind('mouseleave.cycle', function(){
				if (pauseFlag)
					this.cyclePause--;
				triggerPause(cont, true);
		});

	if (supportMultiTransitions(opts) === false)
		return false;

	// apparently a lot of people use image slideshows without height/width attributes on the images.
	// Cycle 2.50+ requires the sizing info for every slide; this block tries to deal with that.
	var requeue = false;
	options.requeueAttempts = options.requeueAttempts || 0;
	$slides.each(function() {
		// try to get height/width of each slide
		var $el = $(this);
		this.cycleH = (opts.fit && opts.height) ? opts.height : ($el.height() || this.offsetHeight || this.height || $el.attr('height') || 0);
		this.cycleW = (opts.fit && opts.width) ? opts.width : ($el.width() || this.offsetWidth || this.width || $el.attr('width') || 0);

		if ( $el.is('img') ) {
			var loading = (this.cycleH === 0 && this.cycleW === 0 && !this.complete);
			// don't requeue for images that are still loading but have a valid size
			if (loading) {
				if (o.s && opts.requeueOnImageNotLoaded && ++options.requeueAttempts < 100) { // track retry count so we don't loop forever
					log(options.requeueAttempts,' - img slide not loaded, requeuing slideshow: ', this.src, this.cycleW, this.cycleH);
					setTimeout(function() {$(o.s,o.c).cycle(options);}, opts.requeueTimeout);
					requeue = true;
					return false; // break each loop
				}
				else {
					log('could not determine size of image: '+this.src, this.cycleW, this.cycleH);
				}
			}
		}
		return true;
	});

	if (requeue)
		return false;

	opts.cssBefore = opts.cssBefore || {};
	opts.cssAfter = opts.cssAfter || {};
	opts.cssFirst = opts.cssFirst || {};
	opts.animIn = opts.animIn || {};
	opts.animOut = opts.animOut || {};

	$slides.not(':eq('+first+')').css(opts.cssBefore);
	$($slides[first]).css(opts.cssFirst);

	if (opts.timeout) {
		opts.timeout = parseInt(opts.timeout,10);
		// ensure that timeout and speed settings are sane
		if (opts.speed.constructor == String)
			opts.speed = $.fx.speeds[opts.speed] || parseInt(opts.speed,10);
		if (!opts.sync)
			opts.speed = opts.speed / 2;
		
		var buffer = opts.fx == 'none' ? 0 : opts.fx == 'shuffle' ? 500 : 250;
		while((opts.timeout - opts.speed) < buffer) // sanitize timeout
			opts.timeout += opts.speed;
	}
	if (opts.easing)
		opts.easeIn = opts.easeOut = opts.easing;
	if (!opts.speedIn)
		opts.speedIn = opts.speed;
	if (!opts.speedOut)
		opts.speedOut = opts.speed;

	opts.slideCount = els.length;
	opts.currSlide = opts.lastSlide = first;
	if (opts.random) {
		if (++opts.randomIndex == els.length)
			opts.randomIndex = 0;
		opts.nextSlide = opts.randomMap[opts.randomIndex];
	}
	else if (opts.backwards)
		opts.nextSlide = opts.startingSlide === 0 ? (els.length-1) : opts.startingSlide-1;
	else
		opts.nextSlide = opts.startingSlide >= (els.length-1) ? 0 : opts.startingSlide+1;

	// run transition init fn
	if (!opts.multiFx) {
		var init = $.fn.cycle.transitions[opts.fx];
		if ($.isFunction(init))
			init($cont, $slides, opts);
		else if (opts.fx != 'custom' && !opts.multiFx) {
			log('unknown transition: ' + opts.fx,'; slideshow terminating');
			return false;
		}
	}

	// fire artificial events
	var e0 = $slides[first];
	if (!opts.skipInitializationCallbacks) {
		if (opts.before.length)
			opts.before[0].apply(e0, [e0, e0, opts, true]);
		if (opts.after.length)
			opts.after[0].apply(e0, [e0, e0, opts, true]);
	}
	if (opts.next)
		$(opts.next).bind(opts.prevNextEvent,function(){return advance(opts,1);});
	if (opts.prev)
		$(opts.prev).bind(opts.prevNextEvent,function(){return advance(opts,0);});
	if (opts.pager || opts.pagerAnchorBuilder)
		buildPager(els,opts);

	exposeAddSlide(opts, els);

	return opts;
}

// save off original opts so we can restore after clearing state
function saveOriginalOpts(opts) {
	opts.original = { before: [], after: [] };
	opts.original.cssBefore = $.extend({}, opts.cssBefore);
	opts.original.cssAfter  = $.extend({}, opts.cssAfter);
	opts.original.animIn	= $.extend({}, opts.animIn);
	opts.original.animOut   = $.extend({}, opts.animOut);
	$.each(opts.before, function() { opts.original.before.push(this); });
	$.each(opts.after,  function() { opts.original.after.push(this); });
}

function supportMultiTransitions(opts) {
	var i, tx, txs = $.fn.cycle.transitions;
	// look for multiple effects
	if (opts.fx.indexOf(',') > 0) {
		opts.multiFx = true;
		opts.fxs = opts.fx.replace(/\s*/g,'').split(',');
		// discard any bogus effect names
		for (i=0; i < opts.fxs.length; i++) {
			var fx = opts.fxs[i];
			tx = txs[fx];
			if (!tx || !txs.hasOwnProperty(fx) || !$.isFunction(tx)) {
				log('discarding unknown transition: ',fx);
				opts.fxs.splice(i,1);
				i--;
			}
		}
		// if we have an empty list then we threw everything away!
		if (!opts.fxs.length) {
			log('No valid transitions named; slideshow terminating.');
			return false;
		}
	}
	else if (opts.fx == 'all') {  // auto-gen the list of transitions
		opts.multiFx = true;
		opts.fxs = [];
		for (var p in txs) {
			if (txs.hasOwnProperty(p)) {
				tx = txs[p];
				if (txs.hasOwnProperty(p) && $.isFunction(tx))
					opts.fxs.push(p);
			}
		}
	}
	if (opts.multiFx && opts.randomizeEffects) {
		// munge the fxs array to make effect selection random
		var r1 = Math.floor(Math.random() * 20) + 30;
		for (i = 0; i < r1; i++) {
			var r2 = Math.floor(Math.random() * opts.fxs.length);
			opts.fxs.push(opts.fxs.splice(r2,1)[0]);
		}
		debug('randomized fx sequence: ',opts.fxs);
	}
	return true;
}

// provide a mechanism for adding slides after the slideshow has started
function exposeAddSlide(opts, els) {
	opts.addSlide = function(newSlide, prepend) {
		var $s = $(newSlide), s = $s[0];
		if (!opts.autostopCount)
			opts.countdown++;
		els[prepend?'unshift':'push'](s);
		if (opts.els)
			opts.els[prepend?'unshift':'push'](s); // shuffle needs this
		opts.slideCount = els.length;

		// add the slide to the random map and resort
		if (opts.random) {
			opts.randomMap.push(opts.slideCount-1);
			opts.randomMap.sort(function(a,b) {return Math.random() - 0.5;});
		}

		$s.css('position','absolute');
		$s[prepend?'prependTo':'appendTo'](opts.$cont);

		if (prepend) {
			opts.currSlide++;
			opts.nextSlide++;
		}

		if (!$.support.opacity && opts.cleartype && !opts.cleartypeNoBg)
			clearTypeFix($s);

		if (opts.fit && opts.width)
			$s.width(opts.width);
		if (opts.fit && opts.height && opts.height != 'auto')
			$s.height(opts.height);
		s.cycleH = (opts.fit && opts.height) ? opts.height : $s.height();
		s.cycleW = (opts.fit && opts.width) ? opts.width : $s.width();

		$s.css(opts.cssBefore);

		if (opts.pager || opts.pagerAnchorBuilder)
			$.fn.cycle.createPagerAnchor(els.length-1, s, $(opts.pager), els, opts);

		if ($.isFunction(opts.onAddSlide))
			opts.onAddSlide($s);
		else
			$s.hide(); // default behavior
	};
}

// reset internal state; we do this on every pass in order to support multiple effects
$.fn.cycle.resetState = function(opts, fx) {
	fx = fx || opts.fx;
	opts.before = []; opts.after = [];
	opts.cssBefore = $.extend({}, opts.original.cssBefore);
	opts.cssAfter  = $.extend({}, opts.original.cssAfter);
	opts.animIn	= $.extend({}, opts.original.animIn);
	opts.animOut   = $.extend({}, opts.original.animOut);
	opts.fxFn = null;
	$.each(opts.original.before, function() { opts.before.push(this); });
	$.each(opts.original.after,  function() { opts.after.push(this); });

	// re-init
	var init = $.fn.cycle.transitions[fx];
	if ($.isFunction(init))
		init(opts.$cont, $(opts.elements), opts);
};

// this is the main engine fn, it handles the timeouts, callbacks and slide index mgmt
function go(els, opts, manual, fwd) {
	var p = opts.$cont[0], curr = els[opts.currSlide], next = els[opts.nextSlide];

	// opts.busy is true if we're in the middle of an animation
	if (manual && opts.busy && opts.manualTrump) {
		// let manual transitions requests trump active ones
		debug('manualTrump in go(), stopping active transition');
		$(els).stop(true,true);
		opts.busy = 0;
		clearTimeout(p.cycleTimeout);
	}

	// don't begin another timeout-based transition if there is one active
	if (opts.busy) {
		debug('transition active, ignoring new tx request');
		return;
	}


	// stop cycling if we have an outstanding stop request
	if (p.cycleStop != opts.stopCount || p.cycleTimeout === 0 && !manual)
		return;

	// check to see if we should stop cycling based on autostop options
	if (!manual && !p.cyclePause && !opts.bounce &&
		((opts.autostop && (--opts.countdown <= 0)) ||
		(opts.nowrap && !opts.random && opts.nextSlide < opts.currSlide))) {
		if (opts.end)
			opts.end(opts);
		return;
	}

	// if slideshow is paused, only transition on a manual trigger
	var changed = false;
	if ((manual || !p.cyclePause) && (opts.nextSlide != opts.currSlide)) {
		changed = true;
		var fx = opts.fx;
		// keep trying to get the slide size if we don't have it yet
		curr.cycleH = curr.cycleH || $(curr).height();
		curr.cycleW = curr.cycleW || $(curr).width();
		next.cycleH = next.cycleH || $(next).height();
		next.cycleW = next.cycleW || $(next).width();

		// support multiple transition types
		if (opts.multiFx) {
			if (fwd && (opts.lastFx === undefined || ++opts.lastFx >= opts.fxs.length))
				opts.lastFx = 0;
			else if (!fwd && (opts.lastFx === undefined || --opts.lastFx < 0))
				opts.lastFx = opts.fxs.length - 1;
			fx = opts.fxs[opts.lastFx];
		}

		// one-time fx overrides apply to:  $('div').cycle(3,'zoom');
		if (opts.oneTimeFx) {
			fx = opts.oneTimeFx;
			opts.oneTimeFx = null;
		}

		$.fn.cycle.resetState(opts, fx);

		// run the before callbacks
		if (opts.before.length)
			$.each(opts.before, function(i,o) {
				if (p.cycleStop != opts.stopCount) return;
				o.apply(next, [curr, next, opts, fwd]);
			});

		// stage the after callacks
		var after = function() {
			opts.busy = 0;
			$.each(opts.after, function(i,o) {
				if (p.cycleStop != opts.stopCount) return;
				o.apply(next, [curr, next, opts, fwd]);
			});
			if (!p.cycleStop) {
				// queue next transition
				queueNext();
			}
		};

		debug('tx firing('+fx+'); currSlide: ' + opts.currSlide + '; nextSlide: ' + opts.nextSlide);
		
		// get ready to perform the transition
		opts.busy = 1;
		if (opts.fxFn) // fx function provided?
			opts.fxFn(curr, next, opts, after, fwd, manual && opts.fastOnEvent);
		else if ($.isFunction($.fn.cycle[opts.fx])) // fx plugin ?
			$.fn.cycle[opts.fx](curr, next, opts, after, fwd, manual && opts.fastOnEvent);
		else
			$.fn.cycle.custom(curr, next, opts, after, fwd, manual && opts.fastOnEvent);
	}
	else {
		queueNext();
	}

	if (changed || opts.nextSlide == opts.currSlide) {
		// calculate the next slide
		var roll;
		opts.lastSlide = opts.currSlide;
		if (opts.random) {
			opts.currSlide = opts.nextSlide;
			if (++opts.randomIndex == els.length) {
				opts.randomIndex = 0;
				opts.randomMap.sort(function(a,b) {return Math.random() - 0.5;});
			}
			opts.nextSlide = opts.randomMap[opts.randomIndex];
			if (opts.nextSlide == opts.currSlide)
				opts.nextSlide = (opts.currSlide == opts.slideCount - 1) ? 0 : opts.currSlide + 1;
		}
		else if (opts.backwards) {
			roll = (opts.nextSlide - 1) < 0;
			if (roll && opts.bounce) {
				opts.backwards = !opts.backwards;
				opts.nextSlide = 1;
				opts.currSlide = 0;
			}
			else {
				opts.nextSlide = roll ? (els.length-1) : opts.nextSlide-1;
				opts.currSlide = roll ? 0 : opts.nextSlide+1;
			}
		}
		else { // sequence
			roll = (opts.nextSlide + 1) == els.length;
			if (roll && opts.bounce) {
				opts.backwards = !opts.backwards;
				opts.nextSlide = els.length-2;
				opts.currSlide = els.length-1;
			}
			else {
				opts.nextSlide = roll ? 0 : opts.nextSlide+1;
				opts.currSlide = roll ? els.length-1 : opts.nextSlide-1;
			}
		}
	}
	if (changed && opts.pager)
		opts.updateActivePagerLink(opts.pager, opts.currSlide, opts.activePagerClass);
	
	function queueNext() {
		// stage the next transition
		var ms = 0, timeout = opts.timeout;
		if (opts.timeout && !opts.continuous) {
			ms = getTimeout(els[opts.currSlide], els[opts.nextSlide], opts, fwd);
         if (opts.fx == 'shuffle')
            ms -= opts.speedOut;
      }
		else if (opts.continuous && p.cyclePause) // continuous shows work off an after callback, not this timer logic
			ms = 10;
		if (ms > 0)
			p.cycleTimeout = setTimeout(function(){ go(els, opts, 0, !opts.backwards); }, ms);
	}
}

// invoked after transition
$.fn.cycle.updateActivePagerLink = function(pager, currSlide, clsName) {
   $(pager).each(function() {
       $(this).children().removeClass(clsName).eq(currSlide).addClass(clsName);
   });
};

// calculate timeout value for current transition
function getTimeout(curr, next, opts, fwd) {
	if (opts.timeoutFn) {
		// call user provided calc fn
		var t = opts.timeoutFn.call(curr,curr,next,opts,fwd);
		while (opts.fx != 'none' && (t - opts.speed) < 250) // sanitize timeout
			t += opts.speed;
		debug('calculated timeout: ' + t + '; speed: ' + opts.speed);
		if (t !== false)
			return t;
	}
	return opts.timeout;
}

// expose next/prev function, caller must pass in state
$.fn.cycle.next = function(opts) { advance(opts,1); };
$.fn.cycle.prev = function(opts) { advance(opts,0);};

// advance slide forward or back
function advance(opts, moveForward) {
	var val = moveForward ? 1 : -1;
	var els = opts.elements;
	var p = opts.$cont[0], timeout = p.cycleTimeout;
	if (timeout) {
		clearTimeout(timeout);
		p.cycleTimeout = 0;
	}
	if (opts.random && val < 0) {
		// move back to the previously display slide
		opts.randomIndex--;
		if (--opts.randomIndex == -2)
			opts.randomIndex = els.length-2;
		else if (opts.randomIndex == -1)
			opts.randomIndex = els.length-1;
		opts.nextSlide = opts.randomMap[opts.randomIndex];
	}
	else if (opts.random) {
		opts.nextSlide = opts.randomMap[opts.randomIndex];
	}
	else {
		opts.nextSlide = opts.currSlide + val;
		if (opts.nextSlide < 0) {
			if (opts.nowrap) return false;
			opts.nextSlide = els.length - 1;
		}
		else if (opts.nextSlide >= els.length) {
			if (opts.nowrap) return false;
			opts.nextSlide = 0;
		}
	}

	var cb = opts.onPrevNextEvent || opts.prevNextClick; // prevNextClick is deprecated
	if ($.isFunction(cb))
		cb(val > 0, opts.nextSlide, els[opts.nextSlide]);
	go(els, opts, 1, moveForward);
	return false;
}

function buildPager(els, opts) {
	var $p = $(opts.pager);
	$.each(els, function(i,o) {
		$.fn.cycle.createPagerAnchor(i,o,$p,els,opts);
	});
	opts.updateActivePagerLink(opts.pager, opts.startingSlide, opts.activePagerClass);
}

$.fn.cycle.createPagerAnchor = function(i, el, $p, els, opts) {
	var a;
	if ($.isFunction(opts.pagerAnchorBuilder)) {
		a = opts.pagerAnchorBuilder(i,el);
		debug('pagerAnchorBuilder('+i+', el) returned: ' + a);
	}
	else
		a = '<a href="#">'+(i+1)+'</a>';
		
	if (!a)
		return;
	var $a = $(a);
	// don't reparent if anchor is in the dom
	if ($a.parents('body').length === 0) {
		var arr = [];
		if ($p.length > 1) {
			$p.each(function() {
				var $clone = $a.clone(true);
				$(this).append($clone);
				arr.push($clone[0]);
			});
			$a = $(arr);
		}
		else {
			$a.appendTo($p);
		}
	}

	opts.pagerAnchors =  opts.pagerAnchors || [];
	opts.pagerAnchors.push($a);
	
	var pagerFn = function(e) {
		e.preventDefault();
		opts.nextSlide = i;
		var p = opts.$cont[0], timeout = p.cycleTimeout;
		if (timeout) {
			clearTimeout(timeout);
			p.cycleTimeout = 0;
		}
		var cb = opts.onPagerEvent || opts.pagerClick; // pagerClick is deprecated
		if ($.isFunction(cb))
			cb(opts.nextSlide, els[opts.nextSlide]);
		go(els,opts,1,opts.currSlide < i); // trigger the trans
//		return false; // <== allow bubble
	};
	
	if ( /mouseenter|mouseover/i.test(opts.pagerEvent) ) {
		$a.hover(pagerFn, function(){/* no-op */} );
	}
	else {
		$a.bind(opts.pagerEvent, pagerFn);
	}
	
	if ( ! /^click/.test(opts.pagerEvent) && !opts.allowPagerClickBubble)
		$a.bind('click.cycle', function(){return false;}); // suppress click
	
	var cont = opts.$cont[0];
	var pauseFlag = false; // https://github.com/malsup/cycle/issues/44
	if (opts.pauseOnPagerHover) {
		$a.hover(
			function() { 
				pauseFlag = true;
				cont.cyclePause++; 
				triggerPause(cont,true,true);
			}, function() { 
				if (pauseFlag)
					cont.cyclePause--; 
				triggerPause(cont,true,true);
			} 
		);
	}
};

// helper fn to calculate the number of slides between the current and the next
$.fn.cycle.hopsFromLast = function(opts, fwd) {
	var hops, l = opts.lastSlide, c = opts.currSlide;
	if (fwd)
		hops = c > l ? c - l : opts.slideCount - l;
	else
		hops = c < l ? l - c : l + opts.slideCount - c;
	return hops;
};

// fix clearType problems in ie6 by setting an explicit bg color
// (otherwise text slides look horrible during a fade transition)
function clearTypeFix($slides) {
	debug('applying clearType background-color hack');
	function hex(s) {
		s = parseInt(s,10).toString(16);
		return s.length < 2 ? '0'+s : s;
	}
	function getBg(e) {
		for ( ; e && e.nodeName.toLowerCase() != 'html'; e = e.parentNode) {
			var v = $.css(e,'background-color');
			if (v && v.indexOf('rgb') >= 0 ) {
				var rgb = v.match(/\d+/g);
				return '#'+ hex(rgb[0]) + hex(rgb[1]) + hex(rgb[2]);
			}
			if (v && v != 'transparent')
				return v;
		}
		return '#ffffff';
	}
	$slides.each(function() { $(this).css('background-color', getBg(this)); });
}

// reset common props before the next transition
$.fn.cycle.commonReset = function(curr,next,opts,w,h,rev) {
	$(opts.elements).not(curr).hide();
	if (typeof opts.cssBefore.opacity == 'undefined')
		opts.cssBefore.opacity = 1;
	opts.cssBefore.display = 'block';
	if (opts.slideResize && w !== false && next.cycleW > 0)
		opts.cssBefore.width = next.cycleW;
	if (opts.slideResize && h !== false && next.cycleH > 0)
		opts.cssBefore.height = next.cycleH;
	opts.cssAfter = opts.cssAfter || {};
	opts.cssAfter.display = 'none';
	$(curr).css('zIndex',opts.slideCount + (rev === true ? 1 : 0));
	$(next).css('zIndex',opts.slideCount + (rev === true ? 0 : 1));
};

// the actual fn for effecting a transition
$.fn.cycle.custom = function(curr, next, opts, cb, fwd, speedOverride) {
	var $l = $(curr), $n = $(next);
	var speedIn = opts.speedIn, speedOut = opts.speedOut, easeIn = opts.easeIn, easeOut = opts.easeOut;
	$n.css(opts.cssBefore);
	if (speedOverride) {
		if (typeof speedOverride == 'number')
			speedIn = speedOut = speedOverride;
		else
			speedIn = speedOut = 1;
		easeIn = easeOut = null;
	}
	var fn = function() {
		$n.animate(opts.animIn, speedIn, easeIn, function() {
			cb();
		});
	};
	$l.animate(opts.animOut, speedOut, easeOut, function() {
		$l.css(opts.cssAfter);
		if (!opts.sync) 
			fn();
	});
	if (opts.sync) fn();
};

// transition definitions - only fade is defined here, transition pack defines the rest
$.fn.cycle.transitions = {
	fade: function($cont, $slides, opts) {
		$slides.not(':eq('+opts.currSlide+')').css('opacity',0);
		opts.before.push(function(curr,next,opts) {
			$.fn.cycle.commonReset(curr,next,opts);
			opts.cssBefore.opacity = 0;
		});
		opts.animIn	   = { opacity: 1 };
		opts.animOut   = { opacity: 0 };
		opts.cssBefore = { top: 0, left: 0 };
	}
};

$.fn.cycle.ver = function() { return ver; };

// override these globally if you like (they are all optional)
$.fn.cycle.defaults = {
    activePagerClass: 'activeSlide', // class name used for the active pager link
    after:            null,     // transition callback (scope set to element that was shown):  function(currSlideElement, nextSlideElement, options, forwardFlag)
    allowPagerClickBubble: false, // allows or prevents click event on pager anchors from bubbling
    animIn:           null,     // properties that define how the slide animates in
    animOut:          null,     // properties that define how the slide animates out
    aspect:           false,    // preserve aspect ratio during fit resizing, cropping if necessary (must be used with fit option)
    autostop:         0,        // true to end slideshow after X transitions (where X == slide count)
    autostopCount:    0,        // number of transitions (optionally used with autostop to define X)
    backwards:        false,    // true to start slideshow at last slide and move backwards through the stack
    before:           null,     // transition callback (scope set to element to be shown):     function(currSlideElement, nextSlideElement, options, forwardFlag)
    center:           null,     // set to true to have cycle add top/left margin to each slide (use with width and height options)
    cleartype:        !$.support.opacity,  // true if clearType corrections should be applied (for IE)
    cleartypeNoBg:    false,    // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
    containerResize:  1,        // resize container to fit largest slide
    containerResizeHeight:  0,  // resize containers height to fit the largest slide but leave the width dynamic
    continuous:       0,        // true to start next transition immediately after current one completes
    cssAfter:         null,     // properties that defined the state of the slide after transitioning out
    cssBefore:        null,     // properties that define the initial state of the slide before transitioning in
    delay:            0,        // additional delay (in ms) for first transition (hint: can be negative)
    easeIn:           null,     // easing for "in" transition
    easeOut:          null,     // easing for "out" transition
    easing:           null,     // easing method for both in and out transitions
    end:              null,     // callback invoked when the slideshow terminates (use with autostop or nowrap options): function(options)
    fastOnEvent:      0,        // force fast transitions when triggered manually (via pager or prev/next); value == time in ms
    fit:              0,        // force slides to fit container
    fx:               'fade',   // name of transition effect (or comma separated names, ex: 'fade,scrollUp,shuffle')
    fxFn:             null,     // function used to control the transition: function(currSlideElement, nextSlideElement, options, afterCalback, forwardFlag)
    height:           'auto',   // container height (if the 'fit' option is true, the slides will be set to this height as well)
    manualTrump:      true,     // causes manual transition to stop an active transition instead of being ignored
    metaAttr:         'cycle',  // data- attribute that holds the option data for the slideshow
    next:             null,     // element, jQuery object, or jQuery selector string for the element to use as event trigger for next slide
    nowrap:           0,        // true to prevent slideshow from wrapping
    onPagerEvent:     null,     // callback fn for pager events: function(zeroBasedSlideIndex, slideElement)
    onPrevNextEvent:  null,     // callback fn for prev/next events: function(isNext, zeroBasedSlideIndex, slideElement)
    pager:            null,     // element, jQuery object, or jQuery selector string for the element to use as pager container
    pagerAnchorBuilder: null,   // callback fn for building anchor links:  function(index, DOMelement)
    pagerEvent:       'click.cycle', // name of event which drives the pager navigation
    pause:            0,        // true to enable "pause on hover"
    pauseOnPagerHover: 0,       // true to pause when hovering over pager link
    prev:             null,     // element, jQuery object, or jQuery selector string for the element to use as event trigger for previous slide
    prevNextEvent:    'click.cycle',// event which drives the manual transition to the previous or next slide
    random:           0,        // true for random, false for sequence (not applicable to shuffle fx)
    randomizeEffects: 1,        // valid when multiple effects are used; true to make the effect sequence random
    requeueOnImageNotLoaded: true, // requeue the slideshow if any image slides are not yet loaded
    requeueTimeout:   250,      // ms delay for requeue
    rev:              0,        // causes animations to transition in reverse (for effects that support it such as scrollHorz/scrollVert/shuffle)
    shuffle:          null,     // coords for shuffle animation, ex: { top:15, left: 200 }
    skipInitializationCallbacks: false, // set to true to disable the first before/after callback that occurs prior to any transition
    slideExpr:        null,     // expression for selecting slides (if something other than all children is required)
    slideResize:      1,        // force slide width/height to fixed size before every transition
    speed:            1000,     // speed of the transition (any valid fx speed value)
    speedIn:          null,     // speed of the 'in' transition
    speedOut:         null,     // speed of the 'out' transition
    startingSlide:    undefined,// zero-based index of the first slide to be displayed
    sync:             1,        // true if in/out transitions should occur simultaneously
    timeout:          4000,     // milliseconds between slide transitions (0 to disable auto advance)
    timeoutFn:        null,     // callback for determining per-slide timeout value:  function(currSlideElement, nextSlideElement, options, forwardFlag)
    updateActivePagerLink: null,// callback fn invoked to update the active pager link (adds/removes activePagerClass style)
    width:            null      // container width (if the 'fit' option is true, the slides will be set to this width as well)
};

})(jQuery);


/*!
 * jQuery Cycle Plugin Transition Definitions
 * This script is a plugin for the jQuery Cycle Plugin
 * Examples and documentation at: http://malsup.com/jquery/cycle/
 * Copyright (c) 2007-2010 M. Alsup
 * Version:	 2.73
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 */
(function($) {
"use strict";

//
// These functions define slide initialization and properties for the named
// transitions. To save file size feel free to remove any of these that you
// don't need.
//
$.fn.cycle.transitions.none = function($cont, $slides, opts) {
	opts.fxFn = function(curr,next,opts,after){
		$(next).show();
		$(curr).hide();
		after();
	};
};

// not a cross-fade, fadeout only fades out the top slide
$.fn.cycle.transitions.fadeout = function($cont, $slides, opts) {
	$slides.not(':eq('+opts.currSlide+')').css({ display: 'block', 'opacity': 1 });
	opts.before.push(function(curr,next,opts,w,h,rev) {
		$(curr).css('zIndex',opts.slideCount + (rev !== true ? 1 : 0));
		$(next).css('zIndex',opts.slideCount + (rev !== true ? 0 : 1));
	});
	opts.animIn.opacity = 1;
	opts.animOut.opacity = 0;
	opts.cssBefore.opacity = 1;
	opts.cssBefore.display = 'block';
	opts.cssAfter.zIndex = 0;
};

// scrollUp/Down/Left/Right
$.fn.cycle.transitions.scrollUp = function($cont, $slides, opts) {
	$cont.css('overflow','hidden');
	opts.before.push($.fn.cycle.commonReset);
	var h = $cont.height();
	opts.cssBefore.top = h;
	opts.cssBefore.left = 0;
	opts.cssFirst.top = 0;
	opts.animIn.top = 0;
	opts.animOut.top = -h;
};
$.fn.cycle.transitions.scrollDown = function($cont, $slides, opts) {
	$cont.css('overflow','hidden');
	opts.before.push($.fn.cycle.commonReset);
	var h = $cont.height();
	opts.cssFirst.top = 0;
	opts.cssBefore.top = -h;
	opts.cssBefore.left = 0;
	opts.animIn.top = 0;
	opts.animOut.top = h;
};
$.fn.cycle.transitions.scrollLeft = function($cont, $slides, opts) {
	$cont.css('overflow','hidden');
	opts.before.push($.fn.cycle.commonReset);
	var w = $cont.width();
	opts.cssFirst.left = 0;
	opts.cssBefore.left = w;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
	opts.animOut.left = 0-w;
};
$.fn.cycle.transitions.scrollRight = function($cont, $slides, opts) {
	$cont.css('overflow','hidden');
	opts.before.push($.fn.cycle.commonReset);
	var w = $cont.width();
	opts.cssFirst.left = 0;
	opts.cssBefore.left = -w;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
	opts.animOut.left = w;
};
$.fn.cycle.transitions.scrollHorz = function($cont, $slides, opts) {
	$cont.css('overflow','hidden').width();
	opts.before.push(function(curr, next, opts, fwd) {
		if (opts.rev)
			fwd = !fwd;
		$.fn.cycle.commonReset(curr,next,opts);
		opts.cssBefore.left = fwd ? (next.cycleW-1) : (1-next.cycleW);
		opts.animOut.left = fwd ? -curr.cycleW : curr.cycleW;
	});
	opts.cssFirst.left = 0;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
	opts.animOut.top = 0;
};
$.fn.cycle.transitions.scrollVert = function($cont, $slides, opts) {
	$cont.css('overflow','hidden');
	opts.before.push(function(curr, next, opts, fwd) {
		if (opts.rev)
			fwd = !fwd;
		$.fn.cycle.commonReset(curr,next,opts);
		opts.cssBefore.top = fwd ? (1-next.cycleH) : (next.cycleH-1);
		opts.animOut.top = fwd ? curr.cycleH : -curr.cycleH;
	});
	opts.cssFirst.top = 0;
	opts.cssBefore.left = 0;
	opts.animIn.top = 0;
	opts.animOut.left = 0;
};

// slideX/slideY
$.fn.cycle.transitions.slideX = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$(opts.elements).not(curr).hide();
		$.fn.cycle.commonReset(curr,next,opts,false,true);
		opts.animIn.width = next.cycleW;
	});
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
	opts.animIn.width = 'show';
	opts.animOut.width = 0;
};
$.fn.cycle.transitions.slideY = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$(opts.elements).not(curr).hide();
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.animIn.height = next.cycleH;
	});
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.height = 0;
	opts.animIn.height = 'show';
	opts.animOut.height = 0;
};

// shuffle
$.fn.cycle.transitions.shuffle = function($cont, $slides, opts) {
	var i, w = $cont.css('overflow', 'visible').width();
	$slides.css({left: 0, top: 0});
	opts.before.push(function(curr,next,opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,true,true);
	});
	// only adjust speed once!
	if (!opts.speedAdjusted) {
		opts.speed = opts.speed / 2; // shuffle has 2 transitions
		opts.speedAdjusted = true;
	}
	opts.random = 0;
	opts.shuffle = opts.shuffle || {left:-w, top:15};
	opts.els = [];
	for (i=0; i < $slides.length; i++)
		opts.els.push($slides[i]);

	for (i=0; i < opts.currSlide; i++)
		opts.els.push(opts.els.shift());

	// custom transition fn (hat tip to Benjamin Sterling for this bit of sweetness!)
	opts.fxFn = function(curr, next, opts, cb, fwd) {
		if (opts.rev)
			fwd = !fwd;
		var $el = fwd ? $(curr) : $(next);
		$(next).css(opts.cssBefore);
		var count = opts.slideCount;
		$el.animate(opts.shuffle, opts.speedIn, opts.easeIn, function() {
			var hops = $.fn.cycle.hopsFromLast(opts, fwd);
			for (var k=0; k < hops; k++) {
				if (fwd)
					opts.els.push(opts.els.shift());
				else
					opts.els.unshift(opts.els.pop());
			}
			if (fwd) {
				for (var i=0, len=opts.els.length; i < len; i++)
					$(opts.els[i]).css('z-index', len-i+count);
			}
			else {
				var z = $(curr).css('z-index');
				$el.css('z-index', parseInt(z,10)+1+count);
			}
			$el.animate({left:0, top:0}, opts.speedOut, opts.easeOut, function() {
				$(fwd ? this : curr).hide();
				if (cb) cb();
			});
		});
	};
	$.extend(opts.cssBefore, { display: 'block', opacity: 1, top: 0, left: 0 });
};

// turnUp/Down/Left/Right
$.fn.cycle.transitions.turnUp = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.cssBefore.top = next.cycleH;
		opts.animIn.height = next.cycleH;
		opts.animOut.width = next.cycleW;
	});
	opts.cssFirst.top = 0;
	opts.cssBefore.left = 0;
	opts.cssBefore.height = 0;
	opts.animIn.top = 0;
	opts.animOut.height = 0;
};
$.fn.cycle.transitions.turnDown = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.animIn.height = next.cycleH;
		opts.animOut.top   = curr.cycleH;
	});
	opts.cssFirst.top = 0;
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.height = 0;
	opts.animOut.height = 0;
};
$.fn.cycle.transitions.turnLeft = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true);
		opts.cssBefore.left = next.cycleW;
		opts.animIn.width = next.cycleW;
	});
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
	opts.animIn.left = 0;
	opts.animOut.width = 0;
};
$.fn.cycle.transitions.turnRight = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true);
		opts.animIn.width = next.cycleW;
		opts.animOut.left = curr.cycleW;
	});
	$.extend(opts.cssBefore, { top: 0, left: 0, width: 0 });
	opts.animIn.left = 0;
	opts.animOut.width = 0;
};

// zoom
$.fn.cycle.transitions.zoom = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,false,true);
		opts.cssBefore.top = next.cycleH/2;
		opts.cssBefore.left = next.cycleW/2;
		$.extend(opts.animIn, { top: 0, left: 0, width: next.cycleW, height: next.cycleH });
		$.extend(opts.animOut, { width: 0, height: 0, top: curr.cycleH/2, left: curr.cycleW/2 });
	});
	opts.cssFirst.top = 0;
	opts.cssFirst.left = 0;
	opts.cssBefore.width = 0;
	opts.cssBefore.height = 0;
};

// fadeZoom
$.fn.cycle.transitions.fadeZoom = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,false);
		opts.cssBefore.left = next.cycleW/2;
		opts.cssBefore.top = next.cycleH/2;
		$.extend(opts.animIn, { top: 0, left: 0, width: next.cycleW, height: next.cycleH });
	});
	opts.cssBefore.width = 0;
	opts.cssBefore.height = 0;
	opts.animOut.opacity = 0;
};

// blindX
$.fn.cycle.transitions.blindX = function($cont, $slides, opts) {
	var w = $cont.css('overflow','hidden').width();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts);
		opts.animIn.width = next.cycleW;
		opts.animOut.left   = curr.cycleW;
	});
	opts.cssBefore.left = w;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
	opts.animOut.left = w;
};
// blindY
$.fn.cycle.transitions.blindY = function($cont, $slides, opts) {
	var h = $cont.css('overflow','hidden').height();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts);
		opts.animIn.height = next.cycleH;
		opts.animOut.top   = curr.cycleH;
	});
	opts.cssBefore.top = h;
	opts.cssBefore.left = 0;
	opts.animIn.top = 0;
	opts.animOut.top = h;
};
// blindZ
$.fn.cycle.transitions.blindZ = function($cont, $slides, opts) {
	var h = $cont.css('overflow','hidden').height();
	var w = $cont.width();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts);
		opts.animIn.height = next.cycleH;
		opts.animOut.top   = curr.cycleH;
	});
	opts.cssBefore.top = h;
	opts.cssBefore.left = w;
	opts.animIn.top = 0;
	opts.animIn.left = 0;
	opts.animOut.top = h;
	opts.animOut.left = w;
};

// growX - grow horizontally from centered 0 width
$.fn.cycle.transitions.growX = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true);
		opts.cssBefore.left = this.cycleW/2;
		opts.animIn.left = 0;
		opts.animIn.width = this.cycleW;
		opts.animOut.left = 0;
	});
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
};
// growY - grow vertically from centered 0 height
$.fn.cycle.transitions.growY = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.cssBefore.top = this.cycleH/2;
		opts.animIn.top = 0;
		opts.animIn.height = this.cycleH;
		opts.animOut.top = 0;
	});
	opts.cssBefore.height = 0;
	opts.cssBefore.left = 0;
};

// curtainX - squeeze in both edges horizontally
$.fn.cycle.transitions.curtainX = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true,true);
		opts.cssBefore.left = next.cycleW/2;
		opts.animIn.left = 0;
		opts.animIn.width = this.cycleW;
		opts.animOut.left = curr.cycleW/2;
		opts.animOut.width = 0;
	});
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
};
// curtainY - squeeze in both edges vertically
$.fn.cycle.transitions.curtainY = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false,true);
		opts.cssBefore.top = next.cycleH/2;
		opts.animIn.top = 0;
		opts.animIn.height = next.cycleH;
		opts.animOut.top = curr.cycleH/2;
		opts.animOut.height = 0;
	});
	opts.cssBefore.height = 0;
	opts.cssBefore.left = 0;
};

// cover - curr slide covered by next slide
$.fn.cycle.transitions.cover = function($cont, $slides, opts) {
	var d = opts.direction || 'left';
	var w = $cont.css('overflow','hidden').width();
	var h = $cont.height();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts);
		opts.cssAfter.display = '';
		if (d == 'right')
			opts.cssBefore.left = -w;
		else if (d == 'up')
			opts.cssBefore.top = h;
		else if (d == 'down')
			opts.cssBefore.top = -h;
		else
			opts.cssBefore.left = w;
	});
	opts.animIn.left = 0;
	opts.animIn.top = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.left = 0;
};

// uncover - curr slide moves off next slide
$.fn.cycle.transitions.uncover = function($cont, $slides, opts) {
	var d = opts.direction || 'left';
	var w = $cont.css('overflow','hidden').width();
	var h = $cont.height();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,true,true);
		if (d == 'right')
			opts.animOut.left = w;
		else if (d == 'up')
			opts.animOut.top = -h;
		else if (d == 'down')
			opts.animOut.top = h;
		else
			opts.animOut.left = -w;
	});
	opts.animIn.left = 0;
	opts.animIn.top = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.left = 0;
};

// toss - move top slide and fade away
$.fn.cycle.transitions.toss = function($cont, $slides, opts) {
	var w = $cont.css('overflow','visible').width();
	var h = $cont.height();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,true,true);
		// provide default toss settings if animOut not provided
		if (!opts.animOut.left && !opts.animOut.top)
			$.extend(opts.animOut, { left: w*2, top: -h/2, opacity: 0 });
		else
			opts.animOut.opacity = 0;
	});
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
};

// wipe - clip animation
$.fn.cycle.transitions.wipe = function($cont, $slides, opts) {
	var w = $cont.css('overflow','hidden').width();
	var h = $cont.height();
	opts.cssBefore = opts.cssBefore || {};
	var clip;
	if (opts.clip) {
		if (/l2r/.test(opts.clip))
			clip = 'rect(0px 0px '+h+'px 0px)';
		else if (/r2l/.test(opts.clip))
			clip = 'rect(0px '+w+'px '+h+'px '+w+'px)';
		else if (/t2b/.test(opts.clip))
			clip = 'rect(0px '+w+'px 0px 0px)';
		else if (/b2t/.test(opts.clip))
			clip = 'rect('+h+'px '+w+'px '+h+'px 0px)';
		else if (/zoom/.test(opts.clip)) {
			var top = parseInt(h/2,10);
			var left = parseInt(w/2,10);
			clip = 'rect('+top+'px '+left+'px '+top+'px '+left+'px)';
		}
	}

	opts.cssBefore.clip = opts.cssBefore.clip || clip || 'rect(0px 0px 0px 0px)';

	var d = opts.cssBefore.clip.match(/(\d+)/g);
	var t = parseInt(d[0],10), r = parseInt(d[1],10), b = parseInt(d[2],10), l = parseInt(d[3],10);

	opts.before.push(function(curr, next, opts) {
		if (curr == next) return;
		var $curr = $(curr), $next = $(next);
		$.fn.cycle.commonReset(curr,next,opts,true,true,false);
		opts.cssAfter.display = 'block';

		var step = 1, count = parseInt((opts.speedIn / 13),10) - 1;
		(function f() {
			var tt = t ? t - parseInt(step * (t/count),10) : 0;
			var ll = l ? l - parseInt(step * (l/count),10) : 0;
			var bb = b < h ? b + parseInt(step * ((h-b)/count || 1),10) : h;
			var rr = r < w ? r + parseInt(step * ((w-r)/count || 1),10) : w;
			$next.css({ clip: 'rect('+tt+'px '+rr+'px '+bb+'px '+ll+'px)' });
			(step++ <= count) ? setTimeout(f, 13) : $curr.css('display', 'none');
		})();
	});
	$.extend(opts.cssBefore, { display: 'block', opacity: 1, top: 0, left: 0 });
	opts.animIn	   = { left: 0 };
	opts.animOut   = { left: 0 };
};

})(jQuery);
;
(function($) {
  Drupal.behaviors.field_slideshow = {
    attach: function(context) {

      for (i in Drupal.settings.field_slideshow) {
        var settings = Drupal.settings.field_slideshow[i],
          slideshow = $('div.' + i),
          num_slides = slideshow.children().length,
          $this = false;

        if (!slideshow.hasClass('field-slideshow-processed')) {
          slideshow.addClass('field-slideshow-processed');

          // Add padding if needed
          var max_outerWidth = 0;
          var max_outerHeight = 0;
          $('.field-slideshow-slide img', slideshow).each(function() {
            $this = $(this);
            max_outerWidth = Math.max(max_outerWidth, $this.outerWidth(true));
            max_outerHeight = Math.max(max_outerHeight, $this.outerHeight(true));
          });
          $('.field-slideshow-slide a', slideshow).each(function() {
            $this = $(this);
            max_outerWidth = Math.max(max_outerWidth, $this.outerWidth(true));
            max_outerHeight = Math.max(max_outerHeight, $this.outerHeight(true));
          });
          $('.field-slideshow-slide', slideshow).each(function() {
            $this = $(this);
            max_outerWidth = Math.max(max_outerWidth, $this.outerWidth(true));
            max_outerHeight = Math.max(max_outerHeight, $this.outerHeight(true));
          });
          slideshow.css({
            'padding-right': (max_outerWidth - parseInt(slideshow.css('width'))) + 'px',
            'padding-bottom': (max_outerHeight - parseInt(slideshow.css('height'))) + 'px'
          });

          // Add options
          var options = {
            resizing: 0,
            fx: settings.fx,
            speed: settings.speed,
            timeout: parseInt(settings.timeout),
            index: i,
            settings: settings
          }

          if (settings.speed == "0" && settings.timeout == "0") options.fastOnEvent = true;
          if (settings.controls) {
            options.prev = "#" + i + "-controls .prev";
            options.next = "#" + i + "-controls .next";
          }
          if (settings.pause) options.pause = true;

          if (settings.pager != '') {
            if (settings.pager == 'number' || settings.pager == 'image') options.pager = "#" + i + "-pager";
            if ((settings.pager == 'image' || settings.pager == 'carousel') && num_slides > 1) {
              options.pagerAnchorBuilder = function(idx, slide) {
                return '#' + i + '-pager li:eq(' + idx + ') a';
              };
              if (settings.pager == 'carousel') {
                var carouselops = {
                  visible: parseInt(settings.carousel_visible),
                  scroll: parseInt(settings.carousel_scroll),
                  animation: parseInt(settings.carousel_speed),
                  vertical: settings.carousel_vertical,
                  initCallback: function(carousel) {
                    $(".jcarousel-prev").addClass('carousel-prev');
                    $(".jcarousel-next").addClass('carousel-next');
                    if (carousel.options.visible && num_slides <= carousel.options.visible) {
                      // hide the carousel next and prev if all slide thumbs are displayed
                      $(".carousel-prev, .carousel-next", carousel.container.parent()).addClass("hidden");
                      return false;
                    }
                    $(".carousel-next", carousel.container.parent()).bind('click', function() {
                      carousel.next();
                      return false;
                    });
                    $(".carousel-prev", carousel.container.parent()).bind('click', function() {
                      carousel.prev();
                      return false;
                    });
                  }
                };
                if (!settings.carousel_skin) {
                  carouselops.buttonNextHTML = null;
                  carouselops.buttonPrevHTML = null;
                }
                if (parseInt(settings.carousel_circular)) carouselops.wrap = 'circular';

                $("#" + i + "-carousel").jcarousel(carouselops);
                // the pager is the direct item's parent element
                options.pager = "#" + i + "-carousel .field-slideshow-pager";
              }
            }
          }

          // Configure the cycle.before callback, it's called each time the slide change
          options.before = function(currSlideElement, nextSlideElement, options, forwardFlag) {
            // In this function we access the settins with options.settings
            // since the settings variable will be equal to the last slideshow settings
            // Acessing directly settings may cause issues if there are more than 1 slideshow

            // The options.nextSlide sometimes starts with 1 instead of 0, this is safer
            var nextIndex = $(nextSlideElement).index();

            // Add activeSlide manually for image pager
            if (options.settings.pager == 'image') {
              $('li', options.pager).removeClass("activeSlide");
              $('li:eq(' + nextIndex + ')', options.pager).addClass("activeSlide");
            }

            // If we are using the carousel make it follow the activeSlide
            // This will not work correctly with circular carousel until the version 0.3 of jcarousel
            // is released so we disble this until then
            if (options.settings.pager == 'carousel' && parseInt(options.settings.carousel_follow) && parseInt(options.settings.carousel_circular) == 0) {
              var carousel = $("#" + options.index + "-carousel").data("jcarousel");
              carousel.scroll(nextIndex, true);
            }
          }

          if (num_slides > 1) {

            if (settings.start_on_hover) {
              //If start_on_hover is set, stop cycling onload, and only activate
              //on hover
              slideshow.cycle(options).cycle("pause").hover(function() {
                $(this).cycle('resume');
              },function(){
                $(this).cycle('pause');
              });
            }
            else {
              // Cycle!
              slideshow.cycle(options);
            }

            // After the numeric pager has been built by Cycle, add some classes for theming
            if (settings.pager == 'number') {
              $('.field-slideshow-pager a').each(function(){
                $this = $(this);
                $this.addClass('slide-' + $this.html());
              });
            }
            // Keep a reference to the slideshow in the buttons since the slideshow variable
            // becomes invalid if there are multiple slideshows (equal to the last slideshow)
            $("#" + i + "-controls .play, #" + i + "-controls .pause").data("slideshow", slideshow);
            // if the play/pause button is enabled link the events
            $("#" + i + "-controls .play").click(function(e) {
              e.preventDefault();
              var target_slideshow = $(this).data("slideshow");
              target_slideshow.cycle("resume", true);
              $(this).hide();
              $(this).parent().find(".pause").show();
            });
            $("#" + i + "-controls .pause").click(function(e) {
              e.preventDefault();
              var target_slideshow = $(this).data("slideshow");
              target_slideshow.cycle("pause");
              $(this).hide();
              $(this).parent().find(".play").show();
            });
          }

        }

      }

      // Recalculate height for responsive layouts
      var rebuild_max_height = function(context) {
        var max_height = 0;
        var heights = $('.field-slideshow-slide',context).map(function ()
        {
          return $(this).height();
        }).get(),
        max_height = Math.max.apply(Math, heights);
        if (max_height > 0) {
          context.css("height", max_height);
        }
      };

      if (jQuery.isFunction($.fn.imagesLoaded)) {
        $('.field-slideshow').each(function() {
          $('img',this).imagesLoaded(function($images) {
            rebuild_max_height($images.parents('.field-slideshow'));
          });
        });
      }
      else {
        $(window).load(function(){
          $('.field-slideshow').each(function(){
            rebuild_max_height($(this))
          })
        });

      }
      $(window).resize(function(){
        $('.field-slideshow').each(function(){
          rebuild_max_height($(this))
        })
      });

    }
  }
})(jQuery);
;
(function ($) {

Drupal.toolbar = Drupal.toolbar || {};

/**
 * Attach toggling behavior and notify the overlay of the toolbar.
 */
Drupal.behaviors.toolbar = {
  attach: function(context) {

    // Set the initial state of the toolbar.
    $('#toolbar', context).once('toolbar', Drupal.toolbar.init);

    // Toggling toolbar drawer.
    $('#toolbar a.toggle', context).once('toolbar-toggle').click(function(e) {
      Drupal.toolbar.toggle();
      // Allow resize event handlers to recalculate sizes/positions.
      $(window).triggerHandler('resize');
      return false;
    });
  }
};

/**
 * Retrieve last saved cookie settings and set up the initial toolbar state.
 */
Drupal.toolbar.init = function() {
  // Retrieve the collapsed status from a stored cookie.
  var collapsed = $.cookie('Drupal.toolbar.collapsed');

  // Expand or collapse the toolbar based on the cookie value.
  if (collapsed == 1) {
    Drupal.toolbar.collapse();
  }
  else {
    Drupal.toolbar.expand();
  }
};

/**
 * Collapse the toolbar.
 */
Drupal.toolbar.collapse = function() {
  var toggle_text = Drupal.t('Show shortcuts');
  $('#toolbar div.toolbar-drawer').addClass('collapsed');
  $('#toolbar a.toggle')
    .removeClass('toggle-active')
    .attr('title',  toggle_text)
    .html(toggle_text);
  $('body').removeClass('toolbar-drawer').css('paddingTop', Drupal.toolbar.height());
  $.cookie(
    'Drupal.toolbar.collapsed',
    1,
    {
      path: Drupal.settings.basePath,
      // The cookie should "never" expire.
      expires: 36500
    }
  );
};

/**
 * Expand the toolbar.
 */
Drupal.toolbar.expand = function() {
  var toggle_text = Drupal.t('Hide shortcuts');
  $('#toolbar div.toolbar-drawer').removeClass('collapsed');
  $('#toolbar a.toggle')
    .addClass('toggle-active')
    .attr('title',  toggle_text)
    .html(toggle_text);
  $('body').addClass('toolbar-drawer').css('paddingTop', Drupal.toolbar.height());
  $.cookie(
    'Drupal.toolbar.collapsed',
    0,
    {
      path: Drupal.settings.basePath,
      // The cookie should "never" expire.
      expires: 36500
    }
  );
};

/**
 * Toggle the toolbar.
 */
Drupal.toolbar.toggle = function() {
  if ($('#toolbar div.toolbar-drawer').hasClass('collapsed')) {
    Drupal.toolbar.expand();
  }
  else {
    Drupal.toolbar.collapse();
  }
};

Drupal.toolbar.height = function() {
  var $toolbar = $('#toolbar');
  var height = $toolbar.outerHeight();
  // In modern browsers (including IE9), when box-shadow is defined, use the
  // normal height.
  var cssBoxShadowValue = $toolbar.css('box-shadow');
  var boxShadow = (typeof cssBoxShadowValue !== 'undefined' && cssBoxShadowValue !== 'none');
  // In IE8 and below, we use the shadow filter to apply box-shadow styles to
  // the toolbar. It adds some extra height that we need to remove.
  if (!boxShadow && /DXImageTransform\.Microsoft\.Shadow/.test($toolbar.css('filter'))) {
    height -= $toolbar[0].filters.item("DXImageTransform.Microsoft.Shadow").strength;
  }
  return height;
};

})(jQuery);
;
