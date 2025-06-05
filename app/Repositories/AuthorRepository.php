<?php
namespace App\Repositories;

use App\Models\Author;

class AuthorRepository
{
    protected $model;

    public function __construct(Author $author)
    {
        $this->model = $author;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $author = $this->getById($id);
        $author->update($data);
        return $author;
    }

    public function delete($id)
    {
        $author = $this->getById($id);
        $author->delete();
        return $author;
    }

    public function getAuthorBooks($authorId)
    {
        return $this->getById($authorId)->books;
    }

    public function getAuthorsWithBooks()
    {
        return $this->model->with('books')->get();
    }
}