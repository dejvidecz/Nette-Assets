<?php

namespace Carrooi\Assets\Helpers;


use Nette\SmartObject;

/**
 *
 * @author David Kudera
 */
class PathHelpers
{

    use SmartObject;

	/**
	 * @param string $path
	 * @return string
	 */
	public static function normalize($path)
	{
		$wrapper = '';

		if (DIRECTORY_SEPARATOR === '\\') {
			$path = strtr($path, '\\', '/');
		}

		preg_match('/^([a-z]+\:\/\/)?(.*)$/', $path, $match);
		if (count($match) === 3) {
			$wrapper = $match[1];
			$path = $match[2];
		}

		$root = ($path[0] === '/') ? '/' : '';

		$segments = explode('/', trim($path, '/'));
		$ret = [];

		foreach ($segments as $segment) {
			if (($segment == '.') || empty($segment)) {
				continue;
			}

			if ($segment == '..') {
				array_pop($ret);
			} else {
				array_push($ret, $segment);
			}
		}

		return $wrapper. $root. implode('/', $ret);
	}

}
