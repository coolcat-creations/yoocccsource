<?php

use YOOtheme\Builder\Joomla\Source\ArticleHelper;
use function YOOtheme\trans;

class JoomlaReferencesType
{
	public static function config()
	{
		return [
			'fields' => [
					'id' => [
					'type' => 'String',
					'metadata' => [
						'label' => trans('ID'),
					],
					'extensions' => [
						'call' => __CLASS__ . '::resolve'
					]
				],
			],
			'metadata' => [
				'type' => true,
				'label' => 'Reference Article'
			]
		];
	}

	public static function resolve($obj, $args, $context, $info)
	{
		return (isset($obj->id) && is_array($obj->id) && isset($obj->id[0]->value)) ? $obj->id[0]->value : null;
	}

}
