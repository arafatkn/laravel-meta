<?php

namespace Arafatkn\LaravelMeta\Database\Factories;

use Arafatkn\LaravelMeta\Models\Meta;
use Illuminate\Database\Eloquent\Factories\Factory;

class MetaFactory extends Factory
{
	protected $model = Meta::class;

	public function definition()
	{
		return [
			'key' => '',
			'value' => '',
		];
	}
}