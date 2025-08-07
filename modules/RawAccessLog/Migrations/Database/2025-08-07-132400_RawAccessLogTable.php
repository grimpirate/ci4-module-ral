<?php

namespace Modules\RawAccessLog\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class RawAccessLogTable extends Migration
{
	protected $DBGroup = 'logs';

	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INTEGER',
				'unsigned' => true,
				'auto_increment' => true,
				'unique' => true,
			],
			'log_file' => [
				'type' => 'TEXT',
			],
			'ip_address' => [
				'type' => 'TEXT',
			],
			'method' => [
				'type' => 'TEXT',
			],
			'endpoint' => [
				'type' => 'TEXT',
			],
			'protocol' => [
				'type' => 'TEXT',
			],
			'response_code' => [
				'type' => 'INTEGER',
			],
			'response_size_bytes' => [
				'type' => 'INTEGER',
			],
			'referrer' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'user_agent' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'created_at' => [
				'type' => 'INTEGER',
				'default' => new RawSql('CURRENT_TIMESTAMP'),
				'null' => true,
			],
			'updated_at' => [
				'type' => 'INTEGER',
				'default' => new RawSql('CURRENT_TIMESTAMP'),
				'null' => true,
			],
			'deleted_at' => [
				'type' => 'INTEGER',
				'null' => true,
			],
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('raw_access_log', true);
	}

	public function down()
	{
		$this->forge->dropTable('raw_access_log', true);
	}
}