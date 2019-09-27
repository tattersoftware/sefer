<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBooksTables extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		
		// Books
		$fields = [
			'slug'         => ['type' => 'varchar', 'constraint' => 31],
			'title'        => ['type' => 'varchar', 'constraint' => 255],
			'isbn'         => ['type' => 'varchar', 'constraint' => 255],
			'image_cover'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'image_spine'  => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'image_back'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'created_at'   => ['type' => 'datetime', 'null' => true],
			'updated_at'   => ['type' => 'datetime', 'null' => true],
			'deleted_at'   => ['type' => 'datetime', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addKey('slug');
		$this->forge->addKey('created_at');
		
		$this->forge->createTable('books');
		
		// Books-Users
		$fields = [
			'book_id'     => ['type' => 'int'],
			'user_id'     => ['type' => 'int', 'unsigned' => true],
			'created_at'  => ['type' => 'datetime', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addUniqueKey(['book_id', 'user_id']);
		$this->forge->addUniqueKey(['user_id', 'book_id']);
		$this->forge->addForeignKey('book_id', 'books', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
		
		$this->forge->createTable('books_users');
		
		// Pages
		$fields = [
			'book_id'      => ['type' => 'int'],
			'name'         => ['type' => 'varchar', 'constraint' => 31],
			'order'        => ['type' => 'int', 'unsigned' => true],
			'image'        => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'created_at'   => ['type' => 'datetime', 'null' => true],
			'updated_at'   => ['type' => 'datetime', 'null' => true],
			'deleted_at'   => ['type' => 'datetime', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addKey('name');
		$this->forge->addKey('order');
		$this->forge->addForeignKey('book_id', 'books', 'id', false, 'CASCADE');
		
		$this->forge->createTable('pages');
				
		// Authors
		$fields = [
			'firstname'    => ['type' => 'varchar', 'constraint' => 63],
			'lastname'     => ['type' => 'varchar', 'constraint' => 63],
			'created_at'   => ['type' => 'datetime', 'null' => true],
			'updated_at'   => ['type' => 'datetime', 'null' => true],
			'deleted_at'   => ['type' => 'datetime', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addKey('lastname');
		$this->forge->addKey('created_at');
		
		$this->forge->createTable('authors');
		
		// Authors-Books
		$fields = [
			'author_id'   => ['type' => 'int'],
			'book_id'     => ['type' => 'int'],
			'created_at'  => ['type' => 'datetime', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addUniqueKey(['author_id', 'book_id']);
		$this->forge->addUniqueKey(['book_id', 'author_id']);
		$this->forge->addForeignKey('author_id', 'authors', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('book_id', 'books', 'id', false, 'CASCADE');
		
		$this->forge->createTable('authors_books');
		
		$this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->db->disableForeignKeyChecks();
		
		$this->forge->dropTable('books');
		$this->forge->dropTable('books_users');
		$this->forge->dropTable('pages');
		$this->forge->dropTable('authors');
		$this->forge->dropTable('authors_books');
		
		$this->db->enableForeignKeyChecks();
	}
}
