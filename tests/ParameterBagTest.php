<?php

/*
 * This file is part of Miguel Simões generic packages.
 *
 * (c) Miguel Simões <msimoes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MiguelSimoes\Component\ParameterBag\Tests;

use MiguelSimoes\Component\ParameterBag\ParameterBag;
use PHPUnit\Framework\TestCase;

/**
 * Tests for the concrete implementation of the parameter container
 *
 * @author Miguel Simões <msimoes@gmail.com>
 */
class ParameterBagTest extends TestCase
{
    /**
     * @var ParameterBag
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->container = new ParameterBag(['foo' => 'bar']);
    }

    /**
     * Tests whether a new element added to the container is available to be
     * retrieved
     */
    public function testAdd()
    {
        $this->container->add(['bar' => 'foo']);
        $this->assertEquals(['foo' => 'bar', 'bar' => 'foo'], $this->container->all());
    }

    /**
     * Tests the constructor and ensures that the all() method returns all the
     * provided parameters when generating the container
     */
    public function testAll()
    {
        $this->assertEquals(['foo' => 'bar'], $this->container->all());
    }

    /**
     * Tests whether we receive the expected number of parameters from the container
     */
    public function testCount()
    {
        $this->assertEquals(1, $this->container->count());
    }

    /**
     * Tests whether we are able to retrieve the value of a known parameter and
     * if it does not exist if the default parameter is returned
     */
    public function testGet()
    {
        $this->assertEquals('bar'        , $this->container->get('foo'));
        $this->assertEquals('notExistent', $this->container->get('bar', 'notExistent'));

    }

    /**
     * Tests whether the iterator is returned with the expected elements
     */
    public function testGetIterator()
    {
        $parameters = ['foo' => 'bar', 'bar' => 'foo'];
        $container  = new ParameterBag($parameters);

        $elements = 0;
        foreach ($container as $parameter => $value) {
            /* Cycle all the parameters to ensure we have all the expected ones */
            ++$elements;

            $this->assertEquals($parameters[$parameter], $value);
        }
        #
        # We will also need to ensure that we have the number of elements matching the expected
        $this->assertEquals(count($parameters), $elements);
    }

    /**
     * Tests whether the provided keys on the constructor are available to be
     * retrieved with the keys() method
     */
    public function testKeys()
    {
        $this->assertEquals(['foo'], $this->container->keys());
    }

    /**
     * Test whether we are able to remove parameters from the container
     */
    public function testRemove()
    {
        $this->container->remove('foo');
        $this->assertEmpty($this->container->all());
    }

    /**
     * Tests whether we are able to replace the parameters in the container with
     * a new set
     */
    public function testReplace()
    {
        $this->container->replace(['bar' => 'foo']);
        $this->assertEquals(['bar' => 'foo'], $this->container->all());
    }

    /**
     * Tests whether we are able to set a parameter value using the set
     */
    public function testSet()
    {
        $this->container->set('foo', 'newValue');
        $this->assertEquals('newValue', $this->container->get('foo'));
    }

    /**
     * Tests whether the set method created the parameter when it does not exist
     */
    public function testSetNotExistent()
    {
        $this->container->set('notExistent', 'created');
        $this->assertEquals('created', $this->container->get('notExistent'));
    }
}
