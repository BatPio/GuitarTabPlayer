<?php
namespace OCA\GuitarTabPlayer\Controller;

use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

class PageController extends Controller {
	private $userId;

	/** @var IURLGenerator */
	private $urlGenerator;

	public function __construct($AppName, IRequest $request, $UserId, IURLGenerator $urlGenerator){
		parent::__construct($AppName, $request);
		$this->userId = $UserId;
		$this->urlGenerator = $urlGenerator;
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @return TemplateResponse
	 */
	 public function tabPlayer() {
		$params = [
			'urlGenerator' => $this->urlGenerator
		];
		return new TemplateResponse('guitartabplayer', 'player', $params, 'blank');  // templates/index.php

	}

}
