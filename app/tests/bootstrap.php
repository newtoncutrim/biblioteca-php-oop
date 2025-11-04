<?php

use App\HTTP\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

JsonResponse::init(
    new Serializer([new ObjectNormalizer()], [new JsonEncoder()])
);
