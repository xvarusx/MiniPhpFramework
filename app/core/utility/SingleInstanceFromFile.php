<?php

declare(strict_types=1);

namespace app\core\utility;

class SingleInstanceFromFile
{
    private static $instance = null;
    private $className;
    private $loadedInstance = null;

    private function __construct(string $className)
    {
        // Store the class name
        $this->className = $className;
    }

    public static function getInstance(string $className): SingleInstanceFromFile
    {
        // Ensure only one instance is created
        if (self::$instance === null || self::$instance->className !== $className) {
            self::$instance = new self($className);
        }
        return self::$instance;
    }

    public function getInstanceFromFile()
    {
        // Include the file and return an instance
        if ($this->loadedInstance === null) {
            // Assuming PSR-4 autoloading is used, the class should be autoloaded
            if (!class_exists($this->className)) {
                throw new \InvalidArgumentException("Class '{$this->className}' not found.");
            }

            $this->loadedInstance = new $this->className();
        }

        return $this->loadedInstance;
    }
}
