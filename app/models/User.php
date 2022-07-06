<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $table = 'tbl_users';
    protected $fillable = ['username', 'email', 'password','role','avatar',"balance"];
    public $timestamps = true;
    public function orders()
    {
        return $this->hasMany(Orders::class,'user_id');
    }
    public function transactions()
    {
        return $this->hasMany(Transactions::class,'user_id');
    }
}
?>