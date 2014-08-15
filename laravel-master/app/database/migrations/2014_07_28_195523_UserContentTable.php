<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('submissions', function($table) {
			$table->increments('id');
			$table->string('chrom');
			$table->integer('chromStart');
			$table->integer('chromEnd');
			$table->string('name');
			$table->string('forwardPrimer');
			$table->string('reversePrimer');
			$table->string('polyClass');
			$table->string('polyFamily');
			$table->string('polySubfamily');
			$table->string('polySeq');
			$table->string('polySource');
			$table->string('reference');
			$table->string('ascertainingMethod');
			$table->string('disease');
			$table->string('genoRegion');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('submissions');
	}

}
