<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Orders extends Model{
    protected $table = 'tbl_orders';
    protected $fillable = ['user_id', 'package_id', 'input', 'quantity', 'total', 'note', 'status'];
    public $timestamps = true;
    public function package(){
        return $this->belongsTo(Packages::class,'package_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
?>