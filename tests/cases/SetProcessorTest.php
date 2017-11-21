<?php

namespace Tests\Cases;

require __DIR__ . '/../bootstrap.php';

use Grapesc\GrapeFluid\Logger;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\WebProcessor;
use Tester\Assert;
use Tester\TestCase;


class SetProcessorTest extends TestCase
{

	public function testSetProcessor()
	{
		$logger = new Logger("Test");
		$logger->setProcessors([
			new IntrospectionProcessor(\Monolog\Logger::INFO),
			new WebProcessor
		]);

		$processor = $logger->getProcessors();

		Assert::count(2, $processor);
		Assert::type(IntrospectionProcessor::class, $processor[0]);
		Assert::type(WebProcessor::class, $processor[1]);
	}

}

(new SetProcessorTest)->run();