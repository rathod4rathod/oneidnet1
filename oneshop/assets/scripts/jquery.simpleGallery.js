!function(a){"use strict";function e(a){window.console&&console.log(a)}var i="simpleGallery-1.0.1";a.fn.simpleGallery=function(i){var n=a.extend({},a.fn.simpleGallery.defaults,i);if(this.length<=0)return e("There are no thumbnails in the gallery"),!1;this.each(function(){var e=a("<img>");e.src=a(this).attr("rel")});var t=function(){var e=a(this).parents(n.thumbnail_anchor),i=e.attr(n.big_image_attr),t=e.attr(n.lens_image_attr),l=a(this).parents(n.gallery_container).find(n.big_image_container),r=a("<img>",{src:n.loading_image});l.html(r);var s=a("<a>").attr("data-lens-image",t).addClass(n.parent_anchor_class),g=a("<img>").load(function(){g.appendTo(s),l.html(s)}).attr("src",i).addClass(n.big_image_class)};return a(this).on(n.show_event,t),this},a.fn.simpleGallery.ver=function(){return i},a.fn.simpleGallery.defaults={thumbnail_anchor:".simpleLens-thumbnail-wrapper",big_image_class:"simpleLens-big-image",lens_image_attr:"data-lens-image",big_image_attr:"data-big-image",parent_anchor_class:"simpleLens-lens-image",gallery_container:".simpleLens-gallery-container",big_image_container:".simpleLens-big-image-container",loading_image:"images/loading.gif",show_event:"mouseenter"}}(jQuery);
