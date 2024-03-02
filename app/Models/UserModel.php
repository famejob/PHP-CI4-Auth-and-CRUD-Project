<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'us_id';
    protected $allowedFields = ['us_fname', 'us_lname', 'us_name', 'us_email', 'us_password', 'us_reset_token', 'us_role', 'us_created_at'];
    public function isUniqueUsername($username, $user_id)
    {
        $user = $this->where('us_name', $username)
            ->where('us_id !=', $user_id)
            ->first();

        return ($user === null);
    }
    public function isUniqueEmail($email, $user_id)
    {
        $user = $this->where('us_email', $email)
            ->where('us_id !=', $user_id)
            ->first();

        return ($user === null);
    }
}
