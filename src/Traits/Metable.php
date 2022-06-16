<?php

namespace Arafatkn\LaravelMeta\Traits;

use Arafatkn\LaravelMeta\Models\Meta;
use Illuminate\Support\Facades\DB;

trait Metable
{
	public function saveMeta(string $key, string $value): Meta
	{
		return $this->updateMeta($key, $value);
	}

	public function updateMeta(string $key, string $value): Meta
	{
		return $this->metas()->updateOrCreate(
			['key' => $key],
			['value' => $value]
		);
	}

	public function deleteMeta(string $key): int
	{
		return $this->metas()
			->where('key', $key)
			->delete();
	}

	public function metas()
	{
		return $this->morphMany(Meta::class, 'metable');
	}

	public function scopeWithMetas($query)
	{
		return $query->with('metas');
	}

	public function getMetaTableName(): string
	{
		return config('meta.table_name') ?? 'laravel_metas';
	}

	public function getMetaTable(): \Illuminate\Database\Query\Builder
	{
		return DB::table($this->getMetaTableName());
	}
}