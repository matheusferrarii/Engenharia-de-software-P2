<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Services\BookService;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return BookResource::collection($books);
    }

    public function store(BookRequest $request)
    {
        $book = $this->bookService->createBook($request->validated());
        return new BookResource($book);
    }

    public function show($id)
    {
        $book = $this->bookService->getBookById($id);
        return new BookResource($book);
    }

    public function update(BookRequest $request, $id)
    {
        $book = $this->bookService->updateBook($id, $request->validated());
        return new BookResource($book);
    }

    public function destroy($id)
    {
        $this->bookService->deleteBook($id);
        return response()->noContent();
    }

    public function getReviews($bookId)
    {
        $reviews = $this->bookService->getReviewsByBook($bookId);
        return ReviewResource::collection($reviews);
    }

    public function getBooksWithDetails()
    {
        $books = $this->bookService->getBooksWithReviewsAndAuthorAndGenre();
        return BookResource::collection($books);
    }
}