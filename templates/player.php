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

	<script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('core/vendor', 'jquery/dist/jquery.min.js')) ?>?v=<?php p($version) ?>"></script>
	<script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaTab/AlphaTab.min.js')) ?>?v=<?php p($version) ?>"></script>
    <script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaTab/jquery.alphaTab.js')) ?>?v=<?php p($version) ?>"></script>
    <script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaSynth/AlphaSynth.min.js')) ?>?v=<?php p($version) ?>"></script>
    <script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/3rdparty', 'alphaTab/jquery.alphaTab.alphaSynth.js')) ?>?v=<?php p($version) ?>"></script>
	<script nonce="<?php p($contentSecurityNonceManager->getNonce()) ?>" src="<?php p($urlGenerator->linkTo('apps/guitartabplayer/js', 'playerScript.js')) ?>?v=<?php p($version) ?>"></script>

	<style type="text/css">
        .barCursor {
            background: rgba(255, 242, 0, 0.25);
        }
        
        .beatCursor {
            background: rgba(255, 0, 0, 0.75);
			z-index: 1;
        }
        
        .selectionWrapper div {
            background: rgba(64, 64, 255, 0.1);
        }
        
        .atHighlight * {
            fill: #0078ff;
        }
    </style>
 
  </head>
  <body>
	<div id="play">play</div>
  	<div id="alphaTabDataInit" data-player="/apps/guitartabplayer/3rdparty/alphaSynth/default.sf2" data-file="<?php echo $_GET['file'] ?>" data-tracks="0"></div>
  </body>
</html>
