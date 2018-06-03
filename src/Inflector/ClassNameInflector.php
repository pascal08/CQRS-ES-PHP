<?php

namespace PascalZeroEight\Inflector;

use PascalZeroEight\CommandInterface;

class ClassNameInflector implements InflectorInterface
{

    public function getHandlerClassName(CommandInterface $command): string
    {
        $handlerClass = str_replace('Command', 'CommandHandler', get_class($command));

        if(!class_exists($handlerClass)) {
            throw new \RuntimeException('Command Handler not found.');
        }

        return $handlerClass;
    }
}