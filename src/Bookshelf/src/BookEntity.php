<?php declare(strict_types=1);

namespace Bookshelf;

use Spot\Entity;
use Spot\EntityInterface;
use Spot\MapperInterface;

class BookEntity extends Entity
{
    protected static $table = 'books';
    protected static $mapper = BookMapper::class;


    public static function fields()
    {
        return [
            'id'          => ['type' => 'integer', 'autoincrement' => true, 'primary' => true],
            'author_id'   => ['type' => 'integer', 'autoincrement' => true, 'primary' => true],
            'title'       => ['type' => 'string', 'required' => true],
            'isbn'        => ['type' => 'string', 'required' => true],
            'description' => ['type' => 'text', 'required' => true],
        ];
    }

    public static function relations(MapperInterface $mapper, EntityInterface $entity)
    {
        return [
            'author' => $mapper->belongsTo($entity, AuthorEntity::class, 'author_id')
        ];
    }
}
