<?php

namespace PPLCZVendor\Http\Message\Encoding;

use PPLCZVendor\Clue\StreamFilter as Filter;
use PPLCZVendor\Psr\Http\Message\StreamInterface;
/**
 * Stream for decoding from gzip format (RFC 1952).
 *
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
class GzipDecodeStream extends FilteredStream
{
    /**
     * @param int $level
     */
    public function __construct(StreamInterface $stream, $level = -1)
    {
        if (!\extension_loaded('zlib')) {
            throw new \RuntimeException('The zlib extension must be enabled to use this stream');
        }
        parent::__construct($stream, ['window' => 31]);
        // @deprecated will be removed in 2.0
        $this->writeFilterCallback = Filter\fun($this->writeFilter(), ['window' => 31, 'level' => $level]);
    }
    protected function readFilter() : string
    {
        return 'zlib.inflate';
    }
    protected function writeFilter() : string
    {
        return 'zlib.deflate';
    }
}
