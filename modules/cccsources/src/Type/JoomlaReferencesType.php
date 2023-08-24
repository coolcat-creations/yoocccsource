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
		$references = JoomlaReferencesProvider::getCurrentReferences();
print_r($references);
die();

		$mvc = Factory::getApplication()->bootComponent('com_content')->getMVCFactory();

		$model = $mvc->createModel('Article', 'Site', ['ignore_request' => true]);

		return array_map(function ($id) use ($model) {
			return $model->getItem($id);
		}, $references);
	}

}
