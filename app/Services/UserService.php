namespace App\Services;
 
class UserService {
 
    public function store(array $userData): User
    {
        $user = User::create($userData);
 
        $user->roles()->sync($userData['roles']);
 
        // More actions with that user: let's say, 5+ more lines of code
        // - Upload avatar
        // - Email to the user
        // - Notify admins about new user
        // - Create some data for that user
        // - and more...
 
        return $user;
    }
 
    public function update(array $userData, User $user): User
    {
        $user->update($userData);
        $user->roles()->sync($userData['roles']);
 
        // Also, more actions with that user
    }
}