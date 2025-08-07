<?php

namespace Modules\RawAccessLog\Entities;

use CodeIgniter\Entity\Entity;

class RawAccessLogEntity extends Entity
{
	protected $casts = [
		'log_file' => 'string',
		'ip_address' => 'string',
		'method' => 'string',
		'endpoint' => 'string',
		'protocol' => 'string',
		'response_code' => 'integer',
		'response_size_bytes' => 'integer',
		'referrer' => '?string',
		'user_agent' => '?string',
	];

	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];

	public function setReferrer(string $referrer)
	{
		$this->attributes['referrer'] = match($referrer) {
			'-' => null,
			default => $referrer,
		};

		return $this;
	}

	public function setUserAgent(string $userAgent)
	{
		$this->attributes['user_agent'] = match($userAgent) {
			'-' => null,
			default => $userAgent,
		};

		return $this;
	}
}