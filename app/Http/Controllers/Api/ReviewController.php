<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        $reviews = $this->reviewService->getAllReviews();
        return ReviewResource::collection($reviews);
    }

    public function store(ReviewRequest $request)
    {
        $review = $this->reviewService->createReview($request->validated());
        return new ReviewResource($review);
    }

    public function show($id)
    {
        $review = $this->reviewService->getReviewById($id);
        return new ReviewResource($review);
    }

    public function update(ReviewRequest $request, $id)
    {
        $review = $this->reviewService->updateReview($id, $request->validated());
        return new ReviewResource($review);
    }

    public function destroy($id)
    {
        $this->reviewService->deleteReview($id);
        return response()->noContent();
    }
}