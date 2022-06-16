<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create(config('meta.table_name') ?? 'laravel_metas', function (Blueprint $table) {
			$table->id();
			$table->string('metable_type');
			$table->string('metable_id');
			$table->string('key');
			$table->text('value');
			$table->timestamps();

			$table->unique(['metable', 'key']);
		});
	}
};
