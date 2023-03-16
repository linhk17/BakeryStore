<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $table = 'accounts';
    protected $primaryKey = 'ussername';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'username',
        'password',
        'auth'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'username');
    }

    
    public $errors = [];
    public function validate($data = [])
    {
        $pattern = '/^[a-zA-Z0-9_]{6,20}$/';
        if (!preg_match($pattern, $data['username'])) {
            $this->errors['username'] = 'Only letters, numbers, underscore and at least 6 character long allowed';
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format';
        }

        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';
        if (!preg_match($pattern, $data['password'])) {
            $this->errors['password'] = 'Password must contains at least one capitalize letter, number and special character.';
        }

        if ($data['password'] != $data['confirm_password']) {
            $this->errors['confirm_password'] = 'Password does not match.';
        }
        $user = Account::where(['username' => $data['username']])->first();
        if ($user) {
            $this->errors['username'] = 'This username is already taken. Please choose another one.';
        }

        if (count($this->errors)) {
            return false;
        }
        return true;
    }
}
