<?php

namespace OCA\GuitarTabPlayer\Migration;

use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use OCP\ILogger;


class UpdateFilecache implements IRepairStep {
  
  /** @var ILogger */
  protected $logger;
    
  public function __construct(ILogger $logger) {
    $this->logger = $logger;
  }

  public function getName() {
    return "Add guitarpro mimetype to filecache";
  }

  public function run(IOutput $output) {
    // Register custom mimetype
    $mimeTypeDetector = \OC::$server->getMimeTypeDetector();
    $mimeTypeDetector->getAllMappings();
    $mimeTypeDetector->registerType('gp3', 'application/x-guitarpro', 'application/x-guitarpro');
    $mimeTypeDetector->registerType('gp4', 'application/x-guitarpro', 'application/x-guitarpro');
    $mimeTypeDetector->registerType('gp5', 'application/x-guitarpro', 'application/x-guitarpro');
    $mimeTypeDetector->registerType('gp6', 'application/x-guitarpro', 'application/x-guitarpro');

    // And update the filecache for it.
    $mimeTypeLoader = \OC::$server->getMimeTypeLoader();
    $mimetypeId = $mimeTypeLoader->getId('application/x-guitarpro');
    $mimeTypeLoader->updateFilecache('gp3', $mimetypeId);
    $mimeTypeLoader->updateFilecache('gp4', $mimetypeId);
    $mimeTypeLoader->updateFilecache('gp5', $mimetypeId);
    $mimeTypeLoader->updateFilecache('gp6', $mimetypeId);
  }
}
