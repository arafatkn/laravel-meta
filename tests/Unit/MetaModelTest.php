<?php

namespace Arafatkn\LaravelMeta\Tests\Unit;

use Arafatkn\LaravelMeta\Tests\Models\Post;
use Arafatkn\LaravelMeta\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MetaModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_saving_and_getting_meta_with_model()
    {
        $post = new Post();
        $post->id = rand(1, 99);

        $meta = $post->saveMeta('fake_key', 'fake value');

        $this->assertEquals('fake_key', $meta->key);

        $meta_value = $post->getMeta('fake_key');

        $this->assertEquals('fake value', $meta_value);
    }

    /** @test */
    public function test_updating_meta_with_model()
    {
        $post = new Post();
        $post->id = rand(1, 99);

        $post->saveMeta('fake_key', 'fake value');
        $post->updateMeta('fake_key', 'real value');
        $meta_value = $post->getMeta('fake_key');

        $this->assertEquals('real value', $meta_value);
    }

    /** @test */
    public function test_deleting_meta_with_model()
    {
        $post = new Post();
        $post->id = rand(1, 99);

        $post->saveMeta('fake_key', 'fake value');
        $meta_value = $post->getMeta('fake_key');

        $this->assertEquals('fake value', $meta_value);

        $post->deleteMeta('fake_key');
        $meta_value = $post->getMeta('fake_key');

        $this->assertEquals(null, $meta_value);
    }
}
