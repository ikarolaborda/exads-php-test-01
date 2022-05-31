<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrimeNumberController extends AbstractController
{
    public function index(): JsonResponse
    {
        /* Finding The Prime Numbers */
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

        /* Building the CONVERTED PRIME Array */
        foreach ($rawPrimal as $primal) {
            $primal = $primal . " - [PRIME]";
            $convertedPrime[] = $primal;
        }

        /* Building the FINAL Merged Array */
        $output = [...$multipleList, ...$rawPrimal];
        for($i = 1; $i <= count($output); $i++) {
            if(in_array($i, $rawPrimal)) {
                $output[$i] = "[PRIME]";

            }
            if(!in_array($i, $rawPrimal)) {
                if($i % 2 === 0 && $i % 5 === 0) {
                    $multiples[] = $i;

                }
            }
        }

        return new JsonResponse(['RAW PRIME' => $rawPrimal, 'CONVERTED PRIME' => $convertedPrime, 'Merged Array' => $output, 'Array of Multiples' => $multiples]);
    }
}
