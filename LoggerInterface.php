<?php

interface LoggerInterface
{
    public function debug(string $message): void;

    public function info(string $message): void;

    public function error(string $message): void;
}