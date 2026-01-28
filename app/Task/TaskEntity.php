<?php

namespace App\Task;

use App\Task\TaskRequest;

final class TaskEntity
{
    public function __construct(
        private string $title,
        private ?string $description,
        private string $status,
    ) {}

    public static function fromRequest(TaskRequest $request): self
    {
        return new self(
            $request->string('title')->toString(),
            $request->input('description'),
            $request->string('status')->toString(),
        );
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function status(): string
    {
        return $this->status;
    }
}
