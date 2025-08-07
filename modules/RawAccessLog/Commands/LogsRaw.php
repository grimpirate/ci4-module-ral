<?php

namespace Modules\RawAccessLog\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\Files\File;
use CodeIgniter\I18n\Time;

use Modules\RawAccessLog\Models\RawAccessLogModel;
use Modules\RawAccessLog\Config\RawAccessLog as RawAccessLogConfig;

class LogsRaw extends BaseCommand
{
	protected $group       = 'Housekeeping';
	protected $name        = 'logs:raw';
	protected $description = 'Converts raw access logs to sqlite.';

	public function run(array $params)
	{
		helper('raw_access_log');

		$config = config(RawAccessLogConfig::class);

		$date = Time::parse('1 month ago')->format('-M-Y');

		$log = array_merge(...array_map('raw_access_log', array_merge(
			array_map(fn($url) => new File("{$config->path}{$url}{$config->domain}{$date}.gz"), $config->subdomains),
			array_map(fn($url) => new File("{$config->path}{$url}{$config->domain}-ssl_log{$date}.gz"), $config->subdomains)
		)));
		
		model(RawAccessLogModel::class)->save($log);
	}
}