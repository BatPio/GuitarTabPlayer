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
	 * CAUTION: the @Stuff turns off security checks; for this page no admin is
	 *          required and no CSRF check. If you don't know what CSRF is, read
	 *          it up in the docs or you might create a security hole. This is
	 *          basically the only required method to add this exemption, don't
	 *          add it to any other method if you don't exactly know what it does
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		return new TemplateResponse('guitartabplayer', 'index');  // templates/index.php
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
