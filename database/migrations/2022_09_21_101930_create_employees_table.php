<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->bigIncrements('id'); // ID записи
            $table->string('uuid')->nullable(); // UUID

            $table->string('name')->nullable(); // Имя
            $table->string('surName')->nullable(); // Фамилия
            $table->string('middleName')->nullable(); // Отчество

            $table->integer('age')->nullable(); // Возраст
            $table->integer('children')->nullable(); // Кол-во детей
            $table->integer('isCompanyCar')->nullable(); // Если использует служебный автомобиль
            $table->integer('salary')->nullable(); // Зарплата

            $table->timestamp('created_at')->nullable(); // Дата создания
            $table->timestamp('updated_at')->nullable(); // Дата изменения
            $table->timestamp('deleted_at')->nullable(); // Дата удаления

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
