<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table            = 'books';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true;

    protected $allowedFields = ['title', 'author', 'genre', 'publication_year'];

    protected $validationRules = [
        'title'            => 'required|max_length[255]',
        'author'           => 'required|max_length[255]',
        'publication_year' => 'required|numeric',
    ];

    protected $validationMessages = [
        'title'            => ['required' => 'Title is required.'],
        'author'           => ['required' => 'Author is required.'],
        'publication_year' => [
            'required' => 'Publication year is required.',
            'numeric'  => 'Publication year must be a number.',
        ],
    ];
}