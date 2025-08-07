<?php

namespace Modules\RawAccessLog\Config;

use CodeIgniter\Config\BaseConfig;

class RawAccessLog extends BaseConfig
{
    public string $path      = WRITEPATH . 'access_logs/';
	public string $domain    = 'yourdomain.com';
	public array $subdomains = [
        '',
        'sub.',
    ];
}