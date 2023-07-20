<?php 

namespace App\Repositories;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\User\User;
use Illuminate\Support\Collection;
use App\Repositories\UserRepositoryInterface;
use DataTables;

class UserRepositoryEloquent implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function updateUser($id, array $data)
    {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
