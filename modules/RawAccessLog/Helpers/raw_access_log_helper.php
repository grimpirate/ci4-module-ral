<?php

use CodeIgniter\Files\File;
use Modules\RawAccessLog\Entities\RawAccessLogEntity;

function raw_access_log(File $file): array
{
	return array_map(function($row) use($file) {
		preg_match_all('/^(\H+)\h+-\h+-\h+\[([^\]]+)\]\h+"(\w+)\h+(\H+)\h+([^"]+)"\h+(\d+)\h+(\d+)\h+"([^"]+)"\h+"([^"]+)"$/m', $row, $matches);
		return new RawAccessLogEntity([
			'log_file' => $file->getBasename(),
			'ip_address' => reset($matches[1]),
			'created_at' => reset($matches[2]),
			'method' => reset($matches[3]),
			'endpoint' => reset($matches[4]),
			'protocol' => reset($matches[5]),
			'response_code' => intval(reset($matches[6])),
			'response_size_bytes' => intval(reset($matches[7])),
			'referrer' => reset($matches[8]),
			'user_agent' => reset($matches[9]),
		]);
	}, gzfile($file->getRealPath()));
}