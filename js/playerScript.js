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
    var at = $('#alphaTabDataInit');
    at.alphaTab();
    console.log('playerScript');

    
    $('#play').click(function(){
        at.alphaTab('playPause');
    });
    
});