<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


/*
 * 1 - Кафе
 * 2 - Ресторан
 * 3 - Парк
 */
class Place extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['title', 'type', 'link'];
    use HasFactory;
    public function getTypeNameAttribute()
    {
        $typeName = '';
        if ($this->type == 1){
            return 'Кафе';
        } elseif ($this->type == 2){
            return 'Ресторан';
        } elseif ($this->type == 3){
            return 'Парк';
        }
    }

    public static function deletePlaceById($id){
        DB::table('places')->where('id', '=', $id)->delete();
        Picture::deleteAllPictureByPlaceId($id);
        return true;
    }


}
