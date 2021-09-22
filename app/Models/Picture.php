<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\assertTrue;

class Picture extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['place_id', 'picture'];
    use HasFactory;

    public static function getPictureByPlaceId($placeId){
        $pictures = array();
        $pictures = DB::select("SELECT * FROM pictures WHERE place_id=" . $placeId . " ORDER BY created_at DESC");
        return $pictures;
    }

    public static function deleteAllPictureByPlaceId($placeId){
        $pictures = array();
        $pictures = DB::select("SELECT * FROM pictures WHERE place_id=" . $placeId . " ORDER BY created_at DESC");
        foreach ($pictures as $picture){
            Storage::disk('public')->delete($picture->picture);
        }
        return DB::table('pictures')->where('place_id', '=', $placeId)->delete();
    }

}
