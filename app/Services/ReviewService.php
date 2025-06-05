<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function getAllReviews()
    {
        return $this->reviewRepository->getAll();
    }

    public function getReviewById($id)
    {
        return $this->reviewRepository->getById($id);
    }

    public function createReview(array $data)
    {
        return $this->reviewRepository->create($data);
    }

    public function updateReview($id, array $data)
    {
        return $this->reviewRepository->update($id, $data);
    }

    public function deleteReview($id)
    {
        return $this->reviewRepository->delete($id);
    }
}