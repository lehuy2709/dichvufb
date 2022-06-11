<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Packages extends Model{
    protected $table = 'tbl_packages';
    protected $fillable = ['service_id', 'name', 'price','min_quantity','max_quantity','note','status'];
    // public function service()
    // {
    //     return $this->belongsTo(Services::class,'service_id');
    // }
    public function service(){
        return $this->belongsTo(Services::class,'service_id');
    }
    public $timestamps = true;

}
?>