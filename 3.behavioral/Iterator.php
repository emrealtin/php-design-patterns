<?php

// Iterator interface
interface Iterator
{
    public function next();
    public function current();
    public function key();
    public function valid();
}

// ConcreteIterator
class MyIterator implements Iterator
{
    private $collection;
    private $position;

    public function __construct($collection)
    {
        $this->collection = $collection;
        $this->position = 0;
    }

    public function next()
    {
        $this->position++;
    }

    public function current()
    {
        return $this->collection[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->collection[$this->position]);
    }
}

// Iterable Collection
interface Collection
{
    public function getIterator();
}

// Concrete Collection
class MyCollection implements Collection
{
    private $elements;

    public function __construct($elements)
    {
        $this->elements = $elements;
    }

    public function getIterator()
    {
        return new MyIterator($this->elements);
    }
}

// Usage
$collection = new MyCollection(['Apple', 'Banana', 'Orange']);

$iterator = $collection->getIterator();
while ($iterator->valid()) {
    echo $iterator->current() . "\n";
    $iterator->next();
}