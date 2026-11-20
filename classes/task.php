
<?php

class Task
{
    private string $id;
    private string $title;
    private string $description;
    private bool $completed = false;

    public function __construct(string $id, string $title, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function printTask(): void
    {
        echo "<p>Information de la tâche</p>";
        echo "<p>ID : " . htmlspecialchars($this->id) . "</p>";
        echo "<p>Titre : " . htmlspecialchars($this->title) . "</p>";
        echo "<p>Description : " . htmlspecialchars($this->description) . "</p>";
    }


    public function getCompleted()
    {
        return $this->completed;
    }



    public function setCompleted(bool $completed)
    {
        $this->completed = $completed;

        return $this;
    }
    public function toggleCompleted(): self
    {
        $this->completed = !$this->completed;

        return $this;
    }
}
