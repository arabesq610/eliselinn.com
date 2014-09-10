/*
 * stacktable
 * https://github.com/johnpolacek/stacktable.js
 *
 * Copyright (c) 2014 Elise Linn
 * Licensed under the MIT license.
 */

(function($) {

  // Collection method.
  $.fn.stacktable = function() {
    return this.each(function(i) {
      // Do something awesome to each selected element.
      $(this).html('awesome' + i);
    });
  };

  // Static method.
  $.stacktable = function(options) {
    // Override default options with passed-in options.
    options = $.extend({}, $.stacktable.options, options);
    // Return something awesome.
    return 'awesome' + options.punctuation;
  };

  // Static method default options.
  $.stacktable.options = {
    punctuation: '.'
  };

  // Custom selector.
  $.expr[':'].stacktable = function(elem) {
    // Is this element awesome?
    return $(elem).text().indexOf('awesome') !== -1;
  };

}(jQuery));
