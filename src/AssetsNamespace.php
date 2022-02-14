<?php

namespace Carrooi\Assets;

use Nette\SmartObject;

/**
 *
 * @author David Kudera
 */
class AssetsNamespace
{

    use SmartObject;

	/** @var \Carrooi\Assets\AssetsResource[] */
	private $resources = [];


	/**
	 * @param string $name
	 * @param \Carrooi\Assets\AssetsResource $resource
	 * @return $this
	 */
	public function addResource($name, AssetsResource $resource)
	{
		$this->resources[$name] = $resource;
		return $this;
	}


	/**
	 * @param string $name
	 * @return \Carrooi\Assets\AssetsResource
	 */
	public function getResource($name)
	{
		if (!isset($this->resources[$name])) {
			throw new AssetsResourceNotExists('Assets resource '. $name. ' does not exists.');
		}

		return $this->resources[$name];
	}

}
