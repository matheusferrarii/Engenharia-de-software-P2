<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return UserResource::collection($users);
    }

    public function store(UserRequest $request)
    {
        $user = $this->userService->createUser($request->validated());
        return new UserResource($user);
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        return new UserResource($user);
    }

    public function update(UserRequest $request, $id)
    {
        $user = $this->userService->updateUser($id, $request->validated());
        return new UserResource($user);
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return response()->noContent();
    }

    public function getUserReviews($userId)
    {
        $reviews = $this->userService->getUserReviews($userId);
        return ReviewResource::collection($reviews);
    }
}