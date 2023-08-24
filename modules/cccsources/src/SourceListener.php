<?php

use YOOtheme\Builder\Source;

class SourceListener
{
	/**
	 * @param Source $source
	 */
	public static function initSource($source)
	{
		$source->queryType(JoomlaReferencesQueryType::config());
	}
}

