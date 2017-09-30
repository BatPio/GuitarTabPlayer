<?php

namespace OCA\GuitarTabPlayer\Migration;

use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use OCP\ILogger;;

class RestoreFilecache implements IRepairStep {
  
  /** @var ILogger */
  protected $logger;
    
  public function __construct(ILogger $logger) {
    $this->logger = $logger;
  }

  public function getName() {
    return "Remove guitarpro mimetype from filecache";
  }

  public function run(IOutput $output) {
      $mimeTypeLoader = \OC::$server->getMimeTypeLoader();
      $mimetypeId = $mimeTypeLoader->getId('application/octet-stream');
      $mimeTypeLoader->updateFilecache('gp3', $mimetypeId);
      $mimeTypeLoader->updateFilecache('gp4', $mimetypeId);
      $mimeTypeLoader->updateFilecache('gp5', $mimetypeId);
      $mimeTypeLoader->updateFilecache('gp6', $mimetypeId);
  }
}
