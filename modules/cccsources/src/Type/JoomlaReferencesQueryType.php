<?php
class JoomlaReferencesQueryType
{
	public static function config()
	{
		return [
			'fields' => [
				'current_custom_reference' => [
					'type' => 'Article',
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
		return JoomlaReferencesProvider::getCurrentReferences();
	}
}
