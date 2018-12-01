(function ($) {
    $(function () {
        var current_audio;
        var current_index = Cookies.get('audio_current_index') || 0;
        var current_time  = Cookies.get('audio_current_time') || 0;
        current_index     = current_index === undefined ? 0 : current_index;
        current_time      = current_time === undefined ? 0 : current_time;

        init();

        function init()
        {
            var audio     = $('#audio');
            current_audio = audio[0];
            var playlist  = $('#playlist');
            var len       = playlist.find('li a').length;
            current_index = current_index >= len ? len - 1 : current_index;
            var current_anchor;

            playlist.find('a').click(function (e) {
                e.preventDefault();
                current_anchor = $(this);
                current_index  = current_anchor.parent().index();
                current_time   = 0;
                run(current_anchor, current_audio, current_time);
            });
            current_audio.addEventListener('ended', function (e) {
                current_index++;
                if (current_index >= len)
                {
                    current_index = 0;
                }
                current_time = 0;
                run($(current_anchor = playlist.find('a')[current_index]), current_audio, current_time);
            });

            run($(current_anchor = playlist.find('a')[current_index]), current_audio, current_time)
        }

        function run(link, player, track)
        {
            player.src = link.attr('href');
            var par    = link.parent();
            par.addClass('active').siblings().removeClass('active');
            player.load();
            player.currentTime = parseFloat(track);
            player.play();
        }

        $(window).on("beforeunload", function (e) {
            Cookies.set('audio_current_index', current_index);
            Cookies.set('audio_current_time', current_audio.currentTime);
        });
    });
})(jQuery);
