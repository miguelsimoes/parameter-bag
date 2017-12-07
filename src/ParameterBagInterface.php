<?php

/*
 * This file is part of the Actual Sales package.
 *
 * (c) Actual Sales Group <info@actualsalesgroup.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MiguelSimoes\Component\ParameterBag;

/**
 * Definition of the public contract to be available on a ParameterBag instance
 *
 * @author Miguel Simões <msimoes@gmail.com>
 */
interface ParameterBagInterface extends \Countable, \IteratorAggregate
{
    /**
     * Adds a new list of parameters to the ones that are already stored in the
     * container
     *
     * @param array $parameters
     */
    public function add(array $parameters);

    /**
     * Gets all the parameters stored in the container
     *
     * @return array
     */
    public function all(): array;

    /**
     * Gets the value of a certain parameter in the container or the default if
     * it does not exist
     *
     * @param string $parameter
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($parameter, $default = null);

    /**
     * Gets whether a certain parameter exists in the container
     *
     * @param string $parameter
     *
     * @return bool
     */
    public function has($parameter): bool;

    /**
     * Gets the list of parameters that are defined in the container
     *
     * @return array
     */
    public function keys(): array;

    /**
     * Removes a parameter from the container
     *
     * @param string $parameter
     */
    public function remove($parameter);

    /**
     * Replaces the current list of parameters with a new set
     *
     * @param array $parameters
     */
    public function replace(array $parameters);

    /**
     * Sets the value of a parameter in the container, creating it if it does not
     * exist
     *
     * @param string $parameter
     * @param mixed  $value
     */
    public function set($parameter, $value = null);
}
