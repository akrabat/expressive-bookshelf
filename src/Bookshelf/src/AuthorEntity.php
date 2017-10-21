<?php declare(strict_types=1);

namespace Bookshelf;

use Spot\Entity;
use Spot\EntityInterface;
use Spot\MapperInterface;

class AuthorEntity extends Entity
{
    protected static $table = 'authors';
    protected static $mapper = AuthorMapper::class;


    public static function fields()
    {
        return [
            'id'        => ['type' => 'integer', 'autoincrement' => true, 'primary' => true],
            'name'      => ['type' => 'string', 'required' => true],
            'biography' => ['type' => 'text', 'required' => true],
        ];
    }

    public static function relations(MapperInterface $mapper, EntityInterface $entity)
    {
        return [
            'books' => $mapper->hasMany($entity, BookEntity::class, 'author_id')
        ];
    }
}
