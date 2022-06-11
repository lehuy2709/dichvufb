<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Services extends Model{
    protected $table = 'tbl_services';
    protected $fillable = ['category_id', 'name', 'slug','description','lable','placeholder','status'];
    public $timestamps = true;

    public function category(){
        return $this->belongsTo(Categories::class,'category_id');
    }
    public function packages(){
        return $this->hasMany(Packages::class,'service_id');
    }
}
?>