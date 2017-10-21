<?php declare(strict_types=1);

namespace Bookshelf;

use Spot\Mapper;

class BookMapper extends Mapper
{
    public function fetchAll()
    {
        return $this->all()->order(['name' => 'ASC']);
    }

    public function loadById(int $id)
    {
        $record = $this->first(['id' => $id]);

        if (!$record) {
            throw new \RuntimeException("Book not found", 404);
        }

        return $record;
    }
}
