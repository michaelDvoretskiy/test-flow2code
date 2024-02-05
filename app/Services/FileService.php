<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;


class FileService
{
    public function storeMovieCover(UploadedFile $file)
    {
        $filename = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs(config('app.image_base_path'), $filename, ['disk' => 'public_uploads']);
        $image = ImageManager::imagick()->read($path);
        $image->resize(config('app.image_width'), config('app.image_height'));
        $image->save();

        return $filename;
    }

    public function removeMovieCover(string $coverPath)
    {
        $filePath = config('app.image_base_path') . $coverPath;
        if (File::exists(public_path($filePath))) {
            File::delete(public_path($filePath));
        }
    }
}
