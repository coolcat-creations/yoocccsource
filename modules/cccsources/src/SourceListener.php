<?php

use YOOtheme\Builder\Source;

class SourceListener
{
	/**
	 * @param Source $source
	 */
	public static function initSource($source)
	{
		$source->objectType('JoomlaReferencesType', JoomlaReferencesType::config());
		$source->queryType(JoomlaReferencesQueryType::config());
	}
}

