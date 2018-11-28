<?php

namespace App\Service;

use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class MarkdownHelper
{
    /**
     * @var AdapterInterface
     */
    private $cache;

    /**
     * @var MarkdownInterface
     */
    private $markdown;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(AdapterInterface $cache, MarkdownInterface $markdown, LoggerInterface $markdownLogger)
    {
        $this->cache = $cache;
        $this->markdown = $markdown;
        $this->logger = $markdownLogger;
    }

    public function parse(string $source): string
    {
        $this->logger->info('parsing markdown source');

        $item = $this->cache->getItem('markdown_' . md5($source));
        if (!$item->isHit()) {
            $articleContent = $this->markdown->transform($source);
            $item->set($articleContent);
            $this->cache->save($item);
        }

        return $item->get();
    }
}
