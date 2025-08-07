<?php

namespace Modules\RawAccessLog\Models;

use CodeIgniter\Model;
use Modules\RawAccessLog\Entities\RawAccessLogEntity;

class RawAccessLogModel extends Model
{
	protected $DBGroup    = 'logs';
	protected $table      = 'raw_access_log';
	protected $primaryKey = 'id';

	protected $useAutoIncrement = true;

	protected $returnType     = RawAccessLogEntity::class;
	protected $useSoftDeletes = true;

	protected $allowedFields = [
		'log_file',
		'ip_address',
		'created_at',
		'method',
		'endpoint',
		'protocol',
		'response_code',
		'response_size_bytes',
		'referrer',
		'user_agent',
	];
}