/*
 * Copyright (c) Piotr Bator <prbator@gmail.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

$(document).ready(function(){
    var at = $('#alphaTab');
    var trackList = $('#trackList');
    at.alphaTab();
    
    $('#play').click(function(){
        at.alphaTab('playPause');
    });

    $('#stop').click(function() { 
        at.alphaTab('stop');
    });

    var onTrackIndicatorClicked = function(e) {
        var track = $(this).closest('li').data('track');
        tracks = [track];
        // render new tracks
        at.alphaTab('tracks', tracks); 
        trackList.hide();  
    };

    var onTrackMuteClicked = function(e) {
        $(this).toggleClass('checked');
        var isMute = $(this).hasClass('checked');
        var track = $(this).closest('li').data('track');
        at.alphaTab('muteTrack', track, isMute);                    
    };

    var onTrackSoloClicked = function(e) {
        $(this).toggleClass('checked');
        var isSolo = $(this).hasClass('checked');
        var track = $(this).closest('li').data('track');
        at.alphaTab('soloTrack', track, isSolo);                    
    }

    var onTrackVolumeChanged = function(e) {
        console.log(e.target.value);
        var track = $(this).closest('li').data('track');
        at.alphaTab('trackVolume', track, e.target.value);
    };

    at.on('alphaTab.loaded', function(e, score) {
        trackList.empty();
        for( var i = 0; i < score.Tracks.length; i++) {
            // Build list item for tracks
            var li = $('<li class="item"></li>').data('track', score.Tracks[i].Index);
            
            // Track selection indicator
            var indicator = $('<span class="indicator"></i>');
            indicator.on('click', onTrackIndicatorClicked);
            li.append(indicator);

            var trackPanel = $('<span class="track-panel"></span>');
            var title = $('<div class="title"></div>');
            title.append(score.Tracks[i].Name);
            trackPanel.append(title);

            // Volume
            var volumeSlider = $('<input value="'+ score.Tracks[i].PlaybackInfo.Volume +'" type="range" min="0" max="16" step="1">')
            volumeSlider.on('change', onTrackVolumeChanged);
            trackPanel.append(volumeSlider);  
            
            // Solo and Mute
            var solo = $('<button type="button" class="button solo">Solo</button>');
            solo.on('click', onTrackSoloClicked);
            var mute = $('<button type="button" class="button mute">Mute</button>');
            mute.on('click', onTrackMuteClicked); 
            trackPanel.append(solo).append(mute);

            li.append(trackPanel);

            trackList.append(li);
        }
    });

    $('#metronome').click(function(e) {
        e.preventDefault();
        var metronomeVolume = at.alphaTab('metronomeVolume');
        if (metronomeVolume == 0) {
            at.alphaTab('metronomeVolume', 1);
            $('#metronome').addClass('checked');
        } else {
            at.alphaTab('metronomeVolume', 0);
            $('#metronome').removeClass('checked');
        }
    });

    $('#playbackSpeedSelector').on('change', function(e) {
        at.alphaTab('playbackSpeed', e.target.value);
    });
    
    $('#tracks').click(function(){
        $('#trackList').show();
    });

    at.on('alphaTab.rendered', function(e) {
        // load track indices
        tracks = at.alphaTab('tracks');
        for(var i = 0; i < tracks.length; i++) {
            tracks[i] = tracks[i].Index;
        }
        var selectedTrackName;
        // check checkboxes 
        $('#trackList li').each(function() {
            var track = $(this).data('track');
            var isSelected = tracks.indexOf(track) > -1;
            if(isSelected) {
                selectedTrackName = $(this).find('.title').text();
                $(this).addClass('selected');
            }
            else {
                $(this).removeClass('selected');
            }
        });
        $('#tracks').text(selectedTrackName); 
    });

    $(document).mouseup(function(e) {
        if (!trackList.is(e.target) && trackList.has(e.target).length === 0) {
            trackList.hide();
        }
    });
    
});