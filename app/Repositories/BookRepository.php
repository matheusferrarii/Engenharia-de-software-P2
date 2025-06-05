<?php
namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    protected $model;

    public function __construct(Book $book)
    {
        $this->model = $book;
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
        $book = $this->getById($id);
        $book->update($data);
        return $book;
    }

    public function delete($id)
    {
        $book = $this->getById($id);
        $book->delete();
        return $book;
    }

    public function getBooksWithReviewsAndAuthorAndGenre()
    {
        return $this->model->with(['reviews', 'author', 'genre'])->get();
    }

    public function getReviewsByBook($bookId)
    {
        return $this->getById($bookId)->reviews;
    }
}