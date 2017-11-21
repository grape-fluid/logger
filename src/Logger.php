<?php

namespace Grapesc\GrapeFluid;

/**
 * @author Mira Jakes <jakes@grapesc.cz>
 */
class Logger extends \Monolog\Logger
{
	
	/**
	 * @param callable[] $processors
	 */
	public function setProcessors(array $processors = [])
	{
		$this->processors = [];
		foreach (array_reverse($processors) as $processor) {
			$this->pushProcessor($processor);
		}
	}
	
}
