<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrimeNumberController extends AbstractController
{
    public function index(): Response
    {
        $multipleList = [];
        $number = 2 ;
        while ($number < 100)
        {
            $div_count=0;
            for ( $i=1;$i<=$number;$i++)
            {
                if (($number % $i) == 0)
                {
                    $div_count++;
                }
            }
            if ($div_count<3)
            {
                $rawPrimal[] = $number;
            }
            $number++;
        }
        for($i=1;$i<=100;$i++) {
            if(!in_array($i, $rawPrimal)) {
                $multipleList[] = $i;
            }

        }

        foreach ($rawPrimal as $primal) {
            $primal = $primal . " - [PRIME]";
            $convertedPrime[] = $primal;
        }

        $output = [...$multipleList, ...$rawPrimal];
        for($i = 1; $i <= count($output); $i++) {
            if(in_array($i, $rawPrimal)) {
                $output[$i] = "[PRIME]";

            }

        }
        return new JsonResponse(['RAW PRIMAL' => $rawPrimal, 'CONVERTED PRIMAL' => $convertedPrime, 'Merged Array' => $output]);
    }
}
