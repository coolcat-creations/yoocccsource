<?php

use YOOtheme\Builder;
use YOOtheme\Path;
use YOOtheme\Theme\Styler\StylerConfig;

include_once __DIR__ . '/src/SourceListener.php';
include_once __DIR__ . '/src/JoomlaReferencesProvider.php';
include_once __DIR__ . '/src/Type/JoomlaReferencesType.php';
include_once __DIR__ . '/src/Type/JoomlaReferencesQueryType.php';

return [

	'events' => [

		// Add custom demo source
		'source.init' => [
			SourceListener::class => 'initSource',
		],

	],
];




