jQuery(document).ready(function($) {
	'use strict';

	swpMusicPlayer($);

});


function swpMusicPlayer($) {
	$('.mpfe-sr-helper').click(function(e){
		e.preventDefault();
	})

	$('.swp_music_player').each(function(){

		var item_hover_color = $(this).data("entryhbgcolor");
		$(this).find('.swp_music_player_entry.wpb_smc_elt').each(function(){
			$(this).hover(
				function() {
					$(this).css("background-color", item_hover_color);
				}, function() {
					$(this).css("background-color", "transparent");
				}
			);
		});

		var $player = $(this);
		var $play_btn = $player.find('.fa-play.player_play');
		var $pause_btn = $player.find('.fa-pause');
		var $fwd_btn = $player.find('.fa-step-forward');
		var $bkw_btn = $player.find('.fa-step-backward');		
		var $first_song = $player.find('.swp_music_player_entry').first();
		var $last_song = $player.find('.swp_music_player_entry').last();
		var $playing_song_name = $player.find('.current_song_name');
		var $time_slider = $player.find('.player_time_slider');
		var $song_duration = $player.find('.song_duration');
		var $song_current_progress = $player.find('.song_current_progress');
		var autoplay = $player.data('autoplay');
		var playmode = $player.data('playmode');
		var stop_on_playlist_end = $player.data('stopplaylistend');

		$player.find('.swp_music_player_entry').each(function(){
			var $player_entry = $(this);
			var audio = new Audio($player_entry.data("mediafile"));
			audio.type= 'audio/mpeg';
			audio.preload = 'metadata';
			$(this).append(audio);

			audio.onloadedmetadata = function() {
				$player_entry.find('.entry_duration').text(toMinutes(audio.duration));
				if ($first_song.is($player_entry)) {
					$song_duration.text(toMinutes(audio.duration));
				}
			};

			audio.onended  = function() {
				var $crt_elt = $player.find('.swp_music_player_entry.now_playing');
				var $next_elt = get_next_player_elt($crt_elt);

				$playing_song_name.text($next_elt.find('.player_song_name').text());
				$song_duration.text(toMinutes($next_elt.find('audio').get(0).duration));
				$crt_elt.removeClass('now_playing');
				$next_elt.addClass('now_playing');

				if (("yes" == stop_on_playlist_end) && (!$crt_elt.next().length)) {
					$play_btn.removeClass("display_none");
					$pause_btn.addClass("display_none");
					
					return;
				}

				$next_elt.find('audio').get(0).play();
				$play_btn.addClass("display_none");
				$pause_btn.removeClass("display_none");
			};			

			audio.addEventListener("timeupdate", function() {
			    var currentTime = audio.currentTime;
			    var duration = audio.duration;
			    $time_slider.stop(true,true).css('width', (currentTime +.25)/duration*100+'%');
			    $song_current_progress.text(toMinutes(currentTime));
			});			
		});

		/*load the 1st song*/
		$first_song.addClass("now_playing");
		$playing_song_name.text($first_song.find('.player_song_name').text());
		$song_current_progress.text("0:00");
		if ("yes" == autoplay) {
			$first_song.find('audio').get(0).play();
			$play_btn.toggleClass("display_none");
			$pause_btn.toggleClass("display_none");
		}

		$play_btn.unbind().click(function() {
			var $crt_elt = $player.find('.swp_music_player_entry.now_playing');
			$crt_elt.find('audio').get(0).play();
			$play_btn.addClass("display_none");
			$pause_btn.removeClass("display_none");
		});
		$pause_btn.unbind().click(function() {
			var $crt_elt = $player.find('.swp_music_player_entry.now_playing');
			$crt_elt.find('audio').get(0).pause();
			$play_btn.removeClass("display_none");
			$pause_btn.addClass("display_none");
		});

		$fwd_btn.unbind().click(function() {
			var $crt_elt = $player.find('.swp_music_player_entry.now_playing');
			$crt_elt.find('audio').get(0).pause();

			var $next_elt = get_next_player_elt($crt_elt);

			$playing_song_name.text($next_elt.find('.player_song_name').text());
			$next_elt.find('audio').get(0).play();
			$song_duration.text(toMinutes($next_elt.find('audio').get(0).duration));
			$crt_elt.removeClass('now_playing');
			$next_elt.addClass('now_playing');
			$play_btn.addClass("display_none");
			$pause_btn.removeClass("display_none");
		});

		$bkw_btn.unbind().click(function() {
			var $crt_elt = $player.find('.swp_music_player_entry.now_playing');
			$crt_elt.find('audio').get(0).pause();
			var $prev_elt = $crt_elt.prev();
			if (!$prev_elt.length) {
				$prev_elt = $last_song;
			}
			$playing_song_name.text($prev_elt.find('.player_song_name').text());
			$prev_elt.find('audio').get(0).play();
			$song_duration.text(toMinutes($prev_elt.find('audio').get(0).duration));
			$crt_elt.removeClass('now_playing');
			$prev_elt.addClass('now_playing');
			$play_btn.addClass("display_none");
			$pause_btn.removeClass("display_none");
		});

		$player.find('.player_entry_left').click(function(){
			var $crt_elt = $player.find('.swp_music_player_entry.now_playing');
			$crt_elt.find('audio').get(0).pause();
			$crt_elt.removeClass('now_playing');

			$(this).parent().addClass('now_playing');
			$(this).parent().find('audio').get(0).play();
			$song_duration.text(toMinutes($(this).parent().find('audio').get(0).duration));
			$playing_song_name.text($(this).find('.player_song_name').text());

			$play_btn.addClass("display_none");
			$pause_btn.removeClass("display_none");			
		});

		$player.find('.player_time_slider_base').click(function(e){
			var $slider_elt = $(this);
			var click_pos = e.pageX - Math.floor($slider_elt.offset().left);
			var elt_width = $slider_elt.width();
			var percent_progress = Math.floor(click_pos/elt_width*100);
			$time_slider.width(percent_progress + "%");

			var $crt_elt = $player.find('.swp_music_player_entry.now_playing');
			$crt_elt.find('audio').get(0).currentTime = $crt_elt.find('audio').get(0).duration * (percent_progress/100);
		});

		var get_next_player_elt = function($crt_elt) {
			if ("repeat" == playmode) {
				var $next_elt = $crt_elt.next();
				if (!$next_elt.length) {
					$next_elt = $first_song;
				}
				return $next_elt;
			}
			/*shuffle*/
			var $playlist = $player.find('.swp_music_player_entry').not('.now_playing').toArray();
			return jQuery($playlist[Math.floor(Math.random() * $playlist.length)]);
		}

		$player.find('i.playback-shuffle').click(function(e){
			$player.attr('data-playmode', "shuffle");
			playmode = "shuffle";
		});
		$player.find('i.playback-repeat').click(function(e){
			$player.attr('data-playmode', "repeat");
			playmode = "repeat";
		});
	});
}

function toMinutes(seconds) {
	seconds = Math.floor(seconds);
	min_part = Math.floor(seconds/60);
	sec_part = seconds % 60;
	if (sec_part < 10) {
		sec_part = '0' + sec_part;
	}
	return min_part + ":" + sec_part;
}
