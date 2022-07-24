<?php
// src/Command/CreateUserCommand.php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CreateUserCommand extends Command
{

    protected static $defaultName = 'maxNumber';


    protected function configure(): void
    {

        $this->addArgument('number', InputArgument::REQUIRED, 'Girdiğiniz sayının');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $inputNumber = intval($input->getArgument('number')); //terminalden değer alıp bu değeri stringden  integera dönüştürüyorum.
        $array = array();
        for ($i = 0; $i < $inputNumber; $i++) {
            array_push($array, rand(1, 1000));
        } // Terminalden girilen değerler kadar bir diziye  1 ile 1000 sayıları arası random değerler oluşturuyorum.
        $bigNumber = 0;
        for ($i = 0; $i < $inputNumber; $i++) {
            if ($array[$i] > $bigNumber) {
                $bigNumber = $array[$i];  //elimde olan dizideki en büyük sayıyı tespit ediyorum.
            }
        }
      print_r( $array);

        $output->writeln('En büyük sayi :  ' .   $bigNumber);
        return Command::SUCCESS;
    }
}
