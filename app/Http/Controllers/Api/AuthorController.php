<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        $authors = $this->authorService->getAllAuthors();
        return AuthorResource::collection($authors);
    }

    public function store(AuthorRequest $request)
    {
        $author = $this->authorService->createAuthor($request->validated());
        return new AuthorResource($author);
    }

    public function show($id)
    {
        $author = $this->authorService->getAuthorById($id);
        return new AuthorResource($author);
    }

    public function update(AuthorRequest $request, $id)
    {
        $author = $this->authorService->updateAuthor($id, $request->validated());
        return new AuthorResource($author);
    }

    public function destroy($id)
    {
        $this->authorService->deleteAuthor($id);
        return response()->noContent();
    }

    public function getAuthorBooks($authorId)
    {
        $books = $this->authorService->getAuthorBooks($authorId);
        return BookResource::collection($books);
    }

    public function getAuthorsWithBooks()
    {
        $authors = $this->authorService->getAuthorsWithBooks();
        return AuthorResource::collection($authors);
    }
}