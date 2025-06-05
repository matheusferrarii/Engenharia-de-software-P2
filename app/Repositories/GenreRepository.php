<?php
namespace App\Repositories;

use App\Models\Genre;

class GenreRepository
{
    protected $model;

    public function __construct(Genre $genre)
    {
        $this->model = $genre;
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
        $genre = $this->getById($id);
        $genre->update($data);
        return $genre;
    }

    public function delete($id)
    {
        $genre = $this->getById($id);
        $genre->delete();
        return $genre;
    }

    public function getGenreBooks($genreId)
    {
        return $this->getById($genreId)->books;
    }

    public function getGenresWithBooks()
    {
        return $this->model->with('books')->get();
    }
}