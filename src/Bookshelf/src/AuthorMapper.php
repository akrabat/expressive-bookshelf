<?php declare(strict_types=1);

namespace Bookshelf;

use Spot\Mapper;
use Spot\Query;
use RuntimeException;

class AuthorMapper extends Mapper
{
    public function fetchAll() : Query
    {
        return $this->all()->order(['name' => 'ASC']);
    }

    public function loadById(int $id) : AuthorEntity
    {
        $record = $this->first(['id' => $id]);

        if (!$record) {
            throw new RuntimeException("Author not found", 404);
        }

        return $record;
    }
}
