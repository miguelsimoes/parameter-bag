<?php

/*
 * This file is part of Miguel Simões generic packages.
 *
 * (c) Miguel Simões <msimoes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MiguelSimoes\Component\ParameterBag;

use MiguelSimoes\Component\ParameterBag\ParameterBagInterface;

/**
 * Concrete implementation of a ParameterBag container
 *
 * @author Miguel Simões <msimoes@gmail.com>
 */
class ParameterBag implements ParameterBagInterface
{
    /**
     * @var array
     */
    private $parameters;

    /**
     * Constructor
     *
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function add(array $parameters)
    {
        $this->parameters = array_merge($this->parameters, $parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function all(): array
    {
        return $this->parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function get($parameter, $default = null)
    {
        return $this->has($parameter) ? $this->parameters[$parameter] : $default;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function has($parameter): bool
    {
        return array_key_exists($parameter, $this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function keys(): array
    {
        return array_keys($this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function remove($parameter)
    {
        unset($this->parameters[$parameter]);
    }

    /**
     * {@inheritdoc}
     */
    public function replace(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function set($parameter, $value = null)
    {
        $this->parameters[$parameter] = $value;
    }
}
