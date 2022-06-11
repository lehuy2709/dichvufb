<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $table = 'tbl_users';
    protected $fillable = ['username', 'email', 'password','role','avatar'];
    public $timestamps = true;
}
?>