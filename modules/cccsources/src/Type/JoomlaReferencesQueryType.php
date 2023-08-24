<?php

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\CMS\Helper\ComponentHelper;
use YOOtheme\Builder\Joomla\Source\ArticleHelper;


class JoomlaReferencesQueryType
{
	public static function config()
	{
		return [
			'fields' => [
				'current_custom_reference' => [
					'type' => [
						'listOf' => 'Article'
					],
					'metadata' => [
						'label' => 'Custom Related References',
						'group' => 'COOLCAT creations',
					],
					'extensions' => [
						'call' => __CLASS__ . '::resolve',
					],
				]
			]
		];
	}

	public static function resolve($item, $args, $context, $info)
	{

		$references = JoomlaReferencesProvider::getCurrentReferences();

		$mvc = Factory::getApplication()->bootComponent('com_content')->getMVCFactory();
		$model = $mvc->createModel('Article', 'Site', ['ignore_request' => true]);

	/*	return array_map(function ($id) use ($model) {
			$article = $model->getItem($id);
			return $article;
		}, $references);*/

		return ArticleHelper::query($references);


	}
}
