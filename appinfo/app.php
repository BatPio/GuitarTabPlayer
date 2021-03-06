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

Util::addScript('guitartabplayer', 'filesPlugin');
if(class_exists('\\OCP\\AppFramework\\Http\\EmptyContentSecurityPolicy')) {
    $manager = \OC::$server->getContentSecurityPolicyManager();
    $csp = new \OCP\AppFramework\Http\EmptyContentSecurityPolicy();
    $csp->addAllowedChildSrcDomain('\'self\'');
    $manager->addDefaultPolicy($csp);
}
