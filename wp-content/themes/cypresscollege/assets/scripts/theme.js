(function ($) {

  // Run video commands.
  var VideoEvents = {
    // POST commands to YouTube or Vimeo API
    postMessageToPlayer: function (player, command) {
      if (player == null || command == null) {
        return;
      }
      player.contentWindow.postMessage(JSON.stringify(command), "*");
    }
  }
  if (typeof define === 'function' && define.VideoEvents) {
    define(VideoEvents);
  }
  else {
    window.VideoEvents = VideoEvents;
  }

  // Document ready function.
  $(document).ready(function () {

    // persons-carousel
    var personsCarousel = $('.persons-carousel');
    if (personsCarousel.length) {
      personsCarousel.owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          }
        }
      });
    }
    // Homepage slider
        //Hero video play pause
        $(".hero-video #player").hide();
        $(".hero-video #playButton").click(function () {
            //console.log('play');
            $(this).addClass("d-none");
            $(".hero-video #pauseButton").removeClass("d-none");
            //$(".hero-video .carousel-caption").css("bottom", "5px");
            $(".hero-video .preview").hide();
            $(".hero-video #player").show();
            $(".hero-video #player").trigger("play");
        });

        $(".hero-video #pauseButton").click(function () {
            // alert('pause');
            $(this).addClass("d-none");
            $(".hero-video #playButton").removeClass("d-none");
            $(".hero-video .preview").hide();
            $(".hero-video #player").show();
            $(".hero-video #player").trigger("pause");
            //$(".hero-video .carousel-caption").css("bottom", "0px");
        });
    // Sidebar video modal.
    var bsVideoModal = $('#bs-video-modal');
    if(bsVideoModal.length){
      bsVideoModal.on('show.bs.modal',function(e){
        var src = $(e.relatedTarget).data('src');
        if(src){
          var url = new URL(src);
          url.searchParams.set('autoplay',1);
          $(this).find('iframe').attr('src', url.toString());
        }
      });
      bsVideoModal.on('hidden.bs.modal',function(e){
        $(this).find('iframe').attr('src', '');
      });
    }

    // News Filter.
    var newsWrapper = $('.news-filters-inner');
    if(newsWrapper.length){
      newsWrapper.find('.base_button').on('click', function (e){
        e.preventDefault();
        $.ajax({
          url: theme.ajaxurl,
          data: {
            action: 'news_filter',
            pathway: newsWrapper.find('#pathway').val(),
            department: newsWrapper.find('#department').val(),
            term_id: newsWrapper.find('#categories').val(),
            year: newsWrapper.find('#categories').data('year')
          },
          type: 'GET',
          success: function (data) {
            $('.news-results .row').html(data);
          }
        });
      });

      newsWrapper.find('.reset_button').on('click', function(e){
        e.preventDefault();
        newsWrapper.find('form')[0].reset();
        newsWrapper.find('.base_button').trigger('click');
      });
    }
  });

  // AJAX
  $.fn.wpPagination = function( options ) {
    var newsWrapper = $('.news-filters-inner');
    options = $.extend({
      links: "a",
      action: "pagination",
      ajaxURL: "https://" + location.host + "/wp-admin/admin-ajax.php",
      next: ".next"
    }, options);

    function WPPagination( element ) {
      this.$el = $( element );
      this.init();
    }

    WPPagination.prototype = {
      init: function() {
        this.createLoader();
        this.createEnd();
        this.handleNext();
        this.handleLinks();
      },
      createLoader: function() {
        var self = this;
        $('#pagination').prepend( "<span id='pagination-loader'>Loading...</span>" );
        $('#pagination-loader').hide();
      },
      createEnd: function() {
        var self = this;
        $('#pagination').prepend( "<span id='pagination-end'>No more results.</span>" );
        $('#pagination-end').hide();
      },
      handleNext: function() {
        var self = this;
        var $next = $( options.next, self.$el );
      },
      handleLinks: function() {
        var self = this,
            $links = $( options.links, self.$el ),
            $pagination = $( "#pagination" );
        $loader = $( "#pagination-loader" );
        $end = $( "#pagination-end" );

        $links.click(function( e ) {
          e.preventDefault();

          $('#pagination .next').fadeOut();
          $loader.fadeIn();

          var $a = $( this ),
              url = $a.attr("href"),
              page = url.match( /\d+/ ),
              pageNumber = page[0],
              data = {
                action: options.action,
                page: pageNumber,
                posttype: $('#pagination-post-type').text(),
                pathway: newsWrapper.find('#pathway').val(),
                department: newsWrapper.find('#department').val(),
                term_id: newsWrapper.find('#categories').val()
              };

          $.get( options.ajaxURL, data, function( html ) {
            $pagination.before( "<div id='page-" + pageNumber + "'></div>" );
            $pagination.before( html );
            $a.attr("href", url.replace('/' + pageNumber + '/', '/' + ( parseInt(pageNumber) + 1 ) + '/'));

            if ( !html ) {
              $('#pagination .next').remove();
              $loader.fadeOut();
              $end.fadeIn();
            } else {
              $loader.fadeOut();
              $('#pagination .next').fadeIn();
              smoothScroll($('#page-' + pageNumber), 85);
            }
          });
        });
      }
    };

    return this.each(function() {
      var element = this;
      var pagination = new WPPagination( element );
    });
  };

  $(function() {
    if( $( "#pagination" ).length ) {
      console.log('hey')
      $( "#pagination" ).wpPagination();
    }
  });
})(jQuery);
