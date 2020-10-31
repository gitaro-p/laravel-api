<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetTaskTest extends TestCase
{
    use RefreshDatabase;

    public function testGetTask()
    {
        $task = Task::factory()->create(); // ①ファクトリでレコード追加

        $response = $this->get('/api/tasks/' . $task->id); // ②GET リクエスト

        $response->assertStatus(200); // ③レスポンスの検証
        $response->assertJson([
            'id' => $task->id,
            'name' => $task->name,
        ]);
    }
}