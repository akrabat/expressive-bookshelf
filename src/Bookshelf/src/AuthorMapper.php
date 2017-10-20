<?php declare(strict_types=1);

namespace Bookshelf;

use Spot\Mapper;

class AuthorMapper extends Mapper
{
    public function fetchAll()
    {
        return $this->all()->order(['name' => 'ASC']);
    }

    public function loadById(int $id)
    {
        $record = $this->first(['id' => $id]);

        if (!$record) {
            throw new \RuntimeException("Author not found", 404);
        }

        return $record;
    }
}
