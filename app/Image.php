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

    public static function saveImage($image, $options)
    {
        $file_name = $image->getClientOriginalName();

        //Enables large image processing
        ini_set('memory_limit', '512M');

        SpatieImage::load($image)
            ->width($options['width'] ?? 1440)
            ->height($options['height'] ?? 1024)
            ->optimize()
            ->save();

        Storage::disk('public')->putFileAs('resized', $image, $file_name);

        Image::updateOrCreate([
            'file_name' => $file_name,
            'path' => '/resized/' . $file_name,
        ]);
    }
}
