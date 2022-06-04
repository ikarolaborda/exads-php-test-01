<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ASCIITableController extends AbstractController
{

    public static function recursiveConvertToUTF8($data): array|string
    {
        if (is_string($data)) {
            return utf8_encode($data);
        } elseif (is_array($data)) {
            $ret = [];
            foreach ($data as $index => $d) $ret[ $index ] = self::recursiveConvertToUTF8($d);

            return $ret;
        } elseif (is_object($data)) {
            foreach ($data as $index => $d) $data->$index = self::recursiveConvertToUTF8($d);

            return $data;
        } else {
            return $data;
        }
    }

    public function index(): JsonResponse
    {

        $bytes =  range (0 , 255);
        $all_chars = array_map('chr', $bytes);

        shuffle($all_chars);

        $element = array_pop($all_chars);
        $removed_elements[] = $element;

        return new JsonResponse(
            [
                'ASCII Table' => ASCIITableController::recursiveConvertToUTF8($all_chars),
                'Removed Elements' => ASCIITableController::recursiveConvertToUTF8($removed_elements)
            ]
        );
    }
}
