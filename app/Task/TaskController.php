<?php

namespace App\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

final class TaskController extends Controller
{
    public function __construct(private TaskRepository $repo) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $this->repo->all(),
            'message' => null,
        ]);
    }

    public function store(TaskRequest $request): JsonResponse
    {
        $entity = TaskEntity::fromRequest($request);
        $task = $this->repo->create($entity);

        return response()->json([
            'status' => 'success',
            'data' => $task,
            'message' => 'Task created successfully',
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $task = $this->repo->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $task,
            'message' => null,
        ]);
    }

    public function update(TaskRequest $request, int $id): JsonResponse
    {
        $task = $this->repo->findOrFail($id);
        $entity = TaskEntity::fromRequest($request);
        $task = $this->repo->update($task, $entity);

        return response()->json([
            'status' => 'success',
            'data' => $task,
            'message' => 'Task updated successfully',
        ]);
    }

    public function destroy(int $id)
    {
        $task = $this->repo->findOrFail($id);
        $this->repo->delete($task);

        return response()->json([
            'status' => 'success',
            'data' => [
                'task_id' => $id,
            ],
            'message' => 'Task deleted successfully',
        ]);
    }
}
