<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Transactions extends Model{
    protected $table = 'tbl_transactions';
    protected $fillable = ['user_id', 'amount', 'type', 'balance', 'description'];
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
?>