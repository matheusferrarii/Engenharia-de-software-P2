<?php

namespace App\Services;

use App\Repositories\BookRepository;

class BookService
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBooks()
    {
        return $this->bookRepository->getAll();
    }

    public function getBookById($id)
    {
        return $this->bookRepository->getById($id);
    }

    public function createBook(array $data)
    {
        return $this->bookRepository->create($data);
    }

    public function updateBook($id, array $data)
    {
        return $this->bookRepository->update($id, $data);
    }

    public function deleteBook($id)
    {
        return $this->bookRepository->delete($id);
    }

    public function getBooksWithReviewsAndAuthorAndGenre()
    {
        return $this->bookRepository->getBooksWithReviewsAndAuthorAndGenre();
    }

    public function getReviewsByBook($bookId)
    {
        return $this->bookRepository->getReviewsByBook($bookId);
    }
}