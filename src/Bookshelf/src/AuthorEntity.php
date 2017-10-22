<?php declare(strict_types=1);

namespace Bookshelf;

use Spot\Entity;
use Spot\EntityInterface;
use Spot\MapperInterface;
use Zend\InputFilter\Factory as InputFilterFactory;

class AuthorEntity extends Entity
{
    protected static $table = 'authors';
    protected static $mapper = AuthorMapper::class;


    public static function fields()
    {
        return [
            'id'        => ['type' => 'integer', 'autoincrement' => true, 'primary' => true],
            'name'      => ['type' => 'string', 'required' => true],
            'biography' => ['type' => 'text', 'required' => false],
        ];
    }

    public static function relations(MapperInterface $mapper, EntityInterface $entity)
    {
        return [
            'books' => $mapper->hasMany($entity, BookEntity::class, 'author_id')
        ];
    }

    public static function getInputFilter()
    {
        $specification = [
            'name' => [
                'required' => true,
                'filters' => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                ],
                'validators' => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                ]
            ],
            'biography' => [
                'required' => true,
                'allow_empty' => true,
                'filters' => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                ],
            ],
        ];

        $factory = new InputFilterFactory();
        $inputFilter = $factory->createInputFilter($specification);

        return $inputFilter;
    }
}
