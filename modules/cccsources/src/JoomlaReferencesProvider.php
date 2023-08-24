<?php

use Joomla\CMS\Factory;

class JoomlaReferencesProvider
{
	public static function getCurrentReferences()
	{
		$jinput = \Joomla\CMS\Factory::getApplication()->input;
		$article = $jinput->getInt('id');
		$references = []; // default to an empty array

		if($article > 0) {
			// now make a call on the database in the fields_values and retrieve the article ids for the current article and the field_id 126
			$db = Factory::getDbo();
			$query = $db->getQuery(true);
			$query->select($db->quoteName('value'));
			$query->from($db->quoteName('#__fields_values'));
			$query->where($db->quoteName('item_id') . ' = ' . $article);
			$query->where($db->quoteName('field_id') . ' = 126');
			$db->setQuery($query);
			try {
				$references = $db->loadObjectList();
			} catch (\RuntimeException $e) {
				error_log($e->getMessage());
			}
		}

 		// return $references as an array of article ids

		return array_map(function ($reference) {
			return $reference->value;
		}, $references);


	}
}
