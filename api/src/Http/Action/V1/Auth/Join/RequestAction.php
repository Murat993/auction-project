<?php

declare(strict_types=1);

namespace App\Http\Action\V1\Auth\Join;

use App\Auth\Command\JoinByEmail\Request\Command;
use App\Auth\Command\JoinByEmail\Request\Handler;
use App\Http\Response\EmptyResponse;
use App\Validator\Validator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class RequestAction implements RequestHandlerInterface
{
    public function __construct(
        private readonly DenormalizerInterface $denormalizer,
        private readonly Validator $validator,
        private readonly Handler $handler
    ) {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $command = $this->denormalizer->denormalize($request->getParsedBody(), Command::class, null, [
            DenormalizerInterface::COLLECT_DENORMALIZATION_ERRORS => true,
            AbstractNormalizer::ALLOW_EXTRA_ATTRIBUTES => false,
        ]);

        $this->validator->validate($command);

        $this->handler->handle($command);

        return new EmptyResponse(201);
    }
}
