<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Categories extends Model{
    protected $table = 'tbl_categories';
    protected $fillable = ['name', 'status', 'icon','slug'];
    public $timestamps = true;
    public function service(){
        return $this->hasMany(Services::class,'category_id');
    }

}
?>