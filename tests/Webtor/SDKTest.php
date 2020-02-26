<?php
use PHPUnit\Framework\TestCase;

class SDKTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testCanBeCreated()
    {
        $sdk = new Webtor\SDK();
    }

}