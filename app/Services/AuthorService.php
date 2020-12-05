<?php

namespace App\Services;

use App\Models\Author;

class AuthorService
{
    protected $file;

    public function __construct(FileService $file)
    {
        $this->file = $file;
    }

    public function storeAuthor($request)
    {
        $author = new Author();
        $author->name = $request->name;
        $author->description = $request->name;
        if ($request->file('image')->isValid()) {
            $author->image = $this->file->storeFile($request->file('image'));
        }
        $author->save();
    }
}