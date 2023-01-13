<?php
include_once 'LoggerInterface.php';

class Logger implements LoggerInterface
{
    private array $arLevel = ['info', 'INFO', 'error', 'ERROR', 'debug', 'DEBUG'];
    private string $level;
    final public const PATH = './logs/';


    /**
     * @param string $level level logger:
     * debug,info,error;
     * default level = debug;
     */
    public function __construct(string $level='debug') {
       $this->setLevel($level);
        date_default_timezone_set('Turkey');
    }

    public function setLevel(string $level): void
    {
        try {
            if (in_array($level, $this->arLevel)) {
                $this->level = $level;

            } else throw new Exception('Уровень не существует');
        } catch (Exception $exception) {
            echo $exception;
        }

    }

    public function debug(string $message): void
    {
        if (($this->level == 'debug') || ($this->level == 'DEBUG')) {
            $data = '[' . date('d.m.Y H:i:s') . ']' . ' ' . 'DEBUG:' . ' ' . '"' . $message . '"';
            self::addFile('debug', $data);
        }
        //[10.01.2022 17:00:11] INFO: "Hello world"
        // TODO: Implement debug() method.
    }

    public function info(string $message): void
    {
        if (($this->level=='debug') || ($this->level=='DEBUG')
        || ($this->level == 'info' ) || ($this->level=='INFO')) {
            $data = '[' . date('d.m.Y H:i:s') . ']' . ' ' . 'INFO:' . ' ' . '"' . $message . '"';
            self::addFile('info', $data);
            self::addFile('debug', $data);
        }
        // TODO: Implement info() method.
    }

    public function error(string $message): void
    {
        if (in_array($this->level, $this->arLevel)) {
            $data = '[' . date('d.m.Y H:i:s') . ']' . ' ' . 'ERROR:' . ' ' . '"' . $message . '"';
            self::addFile('error', $data);
            self::addFile('info', $data);
            self::addFile('debug', $data);
        }

        //[10.01.2022 17:00:11] INFO: "Hello world"
        // TODO: Implement error() method.
    }

    static function addFile(string $name, string $data): void
    {
        if (!is_dir('logs')) {
            mkdir('logs');
        }
        if (file_exists(self::PATH . $name.'.log')) {
            file_put_contents(self::PATH . $name.'.log', PHP_EOL . $data, FILE_APPEND);
        } else {
            file_put_contents(self::PATH . $name.'.log', $data, FILE_APPEND);
        }

    }
public function getLevel(): string {
        return $this->level;
}
}