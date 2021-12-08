<?php declare(strict_types=1);

namespace App\Contract;

use Illuminate\Http\UploadedFile;

interface Upload
{
    public function upload(UploadedFile $file, string $path);
}
