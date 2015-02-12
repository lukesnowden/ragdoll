<?php namespace Lukesnowden\Ragdoll\Repositories;

use Lukesnowden\Ragdoll\Interfaces\RagdollInterface;

class RagdollRepository extends Repository implements RagdollInterface {

	/**
	 * [$viewPath description]
	 * @var string
	 */
	protected $viewPath = 'ragdoll::';

	public function __construct() {

	}

}