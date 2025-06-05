<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Services\GenreService;

class GenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index()
    {
        $genres = $this->genreService->getAllGenres();
        return GenreResource::collection($genres);
    }

    public function store(GenreRequest $request)
    {
        $genre = $this->genreService->createGenre($request->validated());
        return new GenreResource($genre);
    }

    public function show($id)
    {
        $genre = $this->genreService->getGenreById($id);
        return new GenreResource($genre);
    }

    public function update(GenreRequest $request, $id)
    {
        $genre = $this->genreService->updateGenre($id, $request->validated());
        return new GenreResource($genre);
    }

    public function destroy($id)
    {
        $this->genreService->deleteGenre($id);
        return response()->noContent();
    }

    public function getGenreBooks($genreId)
    {
        $books = $this->genreService->getGenreBooks($genreId);
        return BookResource::collection($books);
    }

    public function getGenresWithBooks()
    {
        $genres = $this->genreService->getGenresWithBooks();
        return GenreResource::collection($genres);
    }
}