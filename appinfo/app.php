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
namespace OCA\GuitarTabPlayer\AppInfo;

use OCP\Util;

// Register custom mimetype
$mimeTypeDetector = \OC::$server->getMimeTypeDetector();
$mimeTypeDetector->getAllMappings();
$mimeTypeDetector->registerType('gp3', 'application/x-guitarpro', 'application/x-guitarpro');
$mimeTypeDetector->registerType('gp4', 'application/x-guitarpro', 'application/x-guitarpro');

Util::addScript('guitartabplayer', 'filesPlugin');
