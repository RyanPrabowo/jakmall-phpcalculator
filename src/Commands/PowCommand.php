<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Illuminate\Console\Command;

class PowCommand extends Command
{
    /**
     * @var string
     */
    protected $signature;

    /**
     * @var string
     */
    protected $description;

    public function __construct()
    {
        $commandVerb = $this->getCommandVerb();

        $this->signature = sprintf(
            '%s {base : The base number}, {exp : The %s number}',
            'pow',
            $this->getCommandPassiveVerb()
        );
        $this->description = sprintf('%s all given Numbers', ucfirst($commandVerb));
        parent::__construct();
    }

    protected function getCommandVerb(): string
    {
        return 'exponent';
    }

    protected function getCommandPassiveVerb(): string
    {
        return 'exponent';
    }

    public function handle(): void
    {
        $numbers = $this->getInput();
        $description = $this->generateCalculationDescription($numbers);
        $result = $this->calcPow($numbers);

        $this->comment(sprintf('%s = %s', $description, $result));
    }

    protected function calcPow(array $numbers): string
    {
        $result = pow($numbers['base'], $numbers['exp']);
        return $result;
    }

    protected function getInput(): array
    {
        $numbers = [
            'base' => $this->argument('base'),
            'exp' => $this->argument('exp')
        ];
        return $numbers;
    }

    protected function generateCalculationDescription(array $numbers): string
    {
        $command = $this->argument('command');
        $operator = getOperator($command);
        $glue = sprintf(' %s ', $operator);

        return implode($glue, $numbers);
    }

}
