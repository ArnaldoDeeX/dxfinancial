<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Auth extends Model
{
    use HasFactory;

    /**
     * Get User Logged Data
     *
     * @return object
     */
    public static function user(): object
    {
        return Request()->session()->get('auth');
    }

    /**
     * Check if user is Logged
     *
     * @return boolean
     */
    public static function is_logged(): bool
    {
        if (Request()->session()->has('auth')) {
            return true;
        } else {
            return false;
        }
        return false;
    }

    /**
     * User Logout
     *
     * @return void
     */
    public static function logout()
    {
        return Request()->session()->remove('auth');
    }
}
