<?php

namespace App\Task;

use App\Models\Task as TaskModel;
use Illuminate\Database\Eloquent\Collection;

final class TaskRepository
{
    public function all(): Collection
    {
        return TaskModel::query()->orderByDesc('id')->get();
    }

    public function findOrFail(int $id): TaskModel
    {
        return TaskModel::query()->findOrFail($id);
    }

    public function create(TaskEntity $entity): TaskModel
    {
        return TaskModel::query()->create([
            'title' => $entity->title(),
            'description' => $entity->description(),
            'status' => $entity->status(),
        ]);
    }

    public function update(TaskModel $task, TaskEntity $entity): TaskModel
    {
        $task->update([
            'title' => $entity->title(),
            'description' => $entity->description(),
            'status' => $entity->status(),
        ]);

        return $task->refresh();
    }

    public function delete(TaskModel $task): void
    {
        $task->delete();
    }
}
