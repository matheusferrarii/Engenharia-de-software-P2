<?php
namespace App\Repositories;

use App\Models\Review;

class ReviewRepository
{
    protected $model;

    public function __construct(Review $review)
    {
        $this->model = $review;
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
        $review = $this->getById($id);
        $review->update($data);
        return $review;
    }

    public function delete($id)
    {
        $review = $this->getById($id);
        $review->delete();
        return $review;
    }
}