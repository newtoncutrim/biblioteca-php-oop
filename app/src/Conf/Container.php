<?php

namespace App\Conf;

use ReflectionClass;

class Container
{

    private array $bindings = [];

    public function bind(string $abstract, object $concrete): void
    {
        $this->bindings[$abstract] = $concrete;
    }

    public function resolveDependency($class): object
    {
        if (isset($this->bindings[$class])) {
            return $this->bindings[$class];
        }

        $reflectionClass = new ReflectionClass($class);

        if (!$reflectionClass->getConstructor()) {
            return new $class();
        }

        $params = [];
        $dependencies = $reflectionClass->getConstructor()->getParameters();

        foreach ($dependencies as $dependency) {
            $type = $dependency->getType();

            if ($type && !$type->isBuiltin()) {
                $params[] = $this->resolveDependency($type->getName());
            } else {
                throw new \Exception('Type dependency not found');
            }
        }

        return new $class(...$params);
    }
}