<?php

namespace App\Services;

use App\Repositories\GenreRepository;

class GenreService
{
    protected $genreRepository;

    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function getAllGenres()
    {
        return $this->genreRepository->getAll();
    }

    public function getGenreById($id)
    {
        return $this->genreRepository->getById($id);
    }

    public function createGenre(array $data)
    {
        return $this->genreRepository->create($data);
    }

    public function updateGenre($id, array $data)
    {
        return $this->genreRepository->update($id, $data);
    }

    public function deleteGenre($id)
    {
        return $this->genreRepository->delete($id);
    }

    public function getGenreBooks($genreId)
    {
        return $this->genreRepository->getGenreBooks($genreId);
    }

    public function getGenresWithBooks()
    {
        return $this->genreRepository->getGenresWithBooks();
    }
}