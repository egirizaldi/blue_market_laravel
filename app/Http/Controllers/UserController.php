<?php

namespace App\Http\Controllers;
use App\Repositories\UserRepository;
use App\Interface\UserRepositoryInterface;
use App\Http\Resources\PaginateResource;
use App\Http\Resources\UserResource;
use App\Helpers\ResponseHelper;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    
    public function index(Request $request)
    {
        try {
            $users = $this->userRepository->getAll(
                $request->search,
                $request->limit,
                true
            );

            return ResponseHelper::jsonResponse(true,'data user berhasil diambil',UserResource::collection($users),200);
        } catch(\Exception $e){
            return ResponseHelper::jsonResponse(false,'data user gagal diambil',$e->getMessage(),500);
        }
    }

    public function getAllPaginated(Request $request)
    {
        $request=$request->validate([
            'search' => 'nullable|string',
            'rowsPerPage' => 'nullable|integer|min:1',
        ]);

        try {
            $users = $this->userRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page'] ?? 10,
            );

            return ResponseHelper::jsonResponse(true,'data user berhasil diambil',PaginateResource::make($users,UserResource::class),200);
        } catch(\Exception $e){
            return ResponseHelper::jsonResponse(false,'data user gagal diambil',$e->getMessage(),500);
        }        


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
