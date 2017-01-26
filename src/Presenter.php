<?php

namespace Kayrunm\Anchorman;

use Illuminate\Support\Str;

abstract class Presenter
{
    /**
     * The entity that this class will act as a presenter for
     * @var  \Kayrunm\Anchorman\Presentable
     */
    protected $entity;

    /**
     * Set up the presenter class by storing the associated model.
     *
     * @param \Illuminate\Eloquent\Model  $entity
     */
    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * Our attribute getter tries to return a method on this class with the
     * equivalent name to the camelCase version of the property accessed,
     * or it will try return the same property from the parent entity.
     *
     * @param  string  $property  The presenter to return
     * @return mixed
     */
    public function __get($property)
    {
        // Get a camel-case version of the property called
        $key = Str::camel($property);

        if (method_exists($this, $key)) {
            return $this->{$key}();
        }

        return $this->entity->getAttribute($key);
    }
}