<?php
/*
 * Copyright (c) Piotr Bator <prbator@gmail.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

  $urlGenerator = $_['urlGenerator'];
  $version = \OCP\App::getAppVersion('guitartabplayer');
  $contentSecurityNonceManager = \OC::$server->getContentSecurityPolicyNonceManager();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

	<link rel="stylesheet" href="<?php p($urlGenerator->linkTo('apps/guitartabplayer', 'css/style.css')) ?>?v=<?php p($version) ?>"/>
    <link rel="stylesheet" href="<?php p($urlGenerator->linkTo('apps/guitartabplayer', 'css/webguide.css')) ?>?v=<?php p($version) ?>"/>

	<script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('core/vendor', 'jquery/dist/jquery.min.js')) ?>?v=<?php p($version) ?>"></script>
	<script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaTab/AlphaTab.min.js')) ?>?v=<?php p($version) ?>"></script>
    <script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaTab/jquery.alphaTab.js')) ?>?v=<?php p($version) ?>"></script>
    <script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaSynth/AlphaSynth.min.js')) ?>?v=<?php p($version) ?>"></script>
    <script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaTab/jquery.alphaTab.alphaSynth.js')) ?>?v=<?php p($version) ?>"></script>
	<script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/js', 'playerScript.js')) ?>?v=<?php p($version) ?>"></script>
  </head>
  <body>
    <div class="controls">
	    <span id="play" class="button icon-play"></span>
        <span id="stop" class="button icon-stop"></span>
        <span id="metronome" class="button icon-metronome"></span>   
        Speed:
        <span class="dropdown">
            <select id="playbackSpeedSelector" class="select">
                <option value="0.25">25%</option>
                <option value="0.5">50%</option>
                <option value="0.75">75%</option>
                <option value="1" selected="selected">100%</option>
                <option value="1.25">125%</option>
                <option value="1.5">150%</option>
                <option value="2">200%</option>
            </select>
        </span>
        Track:
        <span class="dropdown">
            <span id="tracks" class="select">&nbsp;</span>
            <span id="trackList" class="itemList dropdown-content"></span>
        </span>
    </div>
  	<div id="alphaTab" data-player="/apps/guitartabplayer/3rdparty/alphaSynth/default.sf2" data-file="<?php echo $_GET['file'] ?>" data-tracks="0"></div>
  </body>
</html>
