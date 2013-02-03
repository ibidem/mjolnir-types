<?php namespace mjolnir\types;

/**
 * @package    mjolnir
 * @category   Types
 * @author     Ibidem Team
 * @copyright  (c) 2012 Ibidem Team
 * @license    https://github.com/ibidem/ibidem/blob/master/LICENSE.md
 */
trait Trait_ThemeDriver
{
	use \app\Trait_Channeled;
	use \app\Trait_Renderable;
	use \app\Trait_Resetable;
	use \app\Trait_Recoverable;

	/**
	 * ...
	 */
	function recover()
	{
		$this->channel()->set('http:status', '404 Not Found');
		$this->channel()->set('body', null);
	}

	protected function combine($basepath, array $files, $ext)
	{
		$combined = '';
		$basepath = \rtrim($basepath, '\\/').'/';
		foreach ($files as $file)
		{
			$combined .= \app\Filesystem::gets($basepath.$file.$ext);
		}

		return $combined;
	}

	/**
	 * @return array
	 */
	protected function collection_entityfile($entity, $collection)
	{
		$themeconfig = $this->channel()->get('themeconfig');
		$themepath = $this->channel()->get('themepath');

		if ( ! isset($themeconfig[$collection]))
		{
			$themeconfig[$collection] = \app\CFS::config('mjolnir/themes')['default.'.$collection.'.dir'];
			$this->channel()->set('themeconfig', $themeconfig);
		}

		$entityname = $this->channel()->get('relaynode')->get($entity);

		$entitypath = $themepath.$themeconfig[$collection].DIRECTORY_SEPARATOR.$entityname.DIRECTORY_SEPARATOR;
		$this->channel()->set($entity.'path', $entitypath);

		if ( ! isset($themeconfig["$entity.configname"]))
		{
			$themeconfig["$entity.configname"] = "+$entity";
			$this->channel()->set('themeconfig', $themeconfig);
		}

		$entityconfig = include "$entitypath/{$themeconfig["$entity.configname"]}".EXT;

		return $entityconfig;
	}

	/**
	 * @return array
	 */
	protected function collectionfile($collection)
	{
		$themeconfig = $this->channel()->get('themeconfig');
		$themepath = $this->channel()->get('themepath');

		if ( ! isset($themeconfig[$collection]))
		{
			$themeconfig[$collection] = \app\CFS::config('mjolnir/themes')['default.'.$collection.'.dir'];
			$this->channel()->set('themeconfig', $themeconfig);
		}

		$collectionpath = $themepath.$themeconfig[$collection].DIRECTORY_SEPARATOR;
		$this->channel()->set($collection.'path', $collectionpath);

		if ( ! isset($themeconfig["$collection.configname"]))
		{
			$themeconfig["$collection.configname"] = "+$collection";
			$this->channel()->set('themeconfig', $themeconfig);
		}

		if (\file_exists("$collectionpath/{$themeconfig["$collection.configname"]}".EXT))
		{
			$collectionconfig = include "$collectionpath/{$themeconfig["$collection.configname"]}".EXT;
		}
		else # fallback to minimal default
		{
			$collectionconfig = [ 'root' => '' ];
		}

		return $collectionconfig;
	}

	/**
	 * Checks a path segment and throws a NotAllowed exception if there's any
	 * know source for exploits in it. Errors are logged as Hacking attempts,
	 * since the probability of development error of this type slipping into
	 * production is very low.
	 */
	protected function security_pathcheck($path)
	{
		if (\preg_match('#\.\.#', $path))
		{
			\mjolnir\log('Hacking', 'Path exploit detected.', 'Hacking/');
			throw new \app\Exception_NotAllowed('Path is not allowed to have parent references (ie. double dot).');
		}
	}

} # trait
