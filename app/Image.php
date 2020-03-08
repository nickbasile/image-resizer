<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image as SpatieImage;

class Image extends Model
{
    protected $fillable = [
        'file_name',
        'path',
    ];

    protected static function booted()
    {
        static::deleting(function(Image $image) {
            Storage::disk('public')->delete($image->path);
        });
    }

    public static function saveImage($image)
    {
        $file_name = $image->getClientOriginalName();

        //Enables large image processing
        ini_set('memory_limit', '512M');

        SpatieImage::load($image)
            ->width(1200)
            ->height(600)
            ->optimize()
            ->save();

        Storage::putFileAs('public/resized', $image, $file_name);

        Image::updateOrCreate([
            'file_name' => $file_name,
            'path' => '/resized/' . $file_name,
        ]);
    }
}
