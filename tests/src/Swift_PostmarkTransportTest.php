<?php

namespace Openbuildings\Postmark\Test;

use Openbuildings\Postmark\Swift_PostmarkTransport;
use PHPUnit\Framework\TestCase;
use Swift_DependencyContainer;

/**
 * @covers \Openbuildings\Postmark\Swift_PostmarkTransport
 * @group swift.postmark-transport
 */
class Swift_PostmarkTransportTest extends TestCase
{
    public function testNewInstance()
    {
        $postmarkTransport = Swift_PostmarkTransport::newInstance();
        $this->assertInstanceOf(
            'Openbuildings\Postmark\Swift_PostmarkTransport',
            $postmarkTransport
        );
        $this->assertNull($postmarkTransport->getApi());

        $postmarkTransport = Swift_PostmarkTransport::newInstance('token');
        $this->assertEquals('token', $postmarkTransport->getApi()->getToken());
    }

    public function testNewInstanceWithToken()
    {
        $postmarkTransport = Swift_PostmarkTransport::newInstance('POSTMARK_API_TEST');
        $this->assertInstanceOf(
            'Openbuildings\Postmark\Swift_PostmarkTransport',
            $postmarkTransport
        );
        $this->assertInstanceOf('Openbuildings\Postmark\Api', $postmarkTransport->getApi());

        $postmarkTransport = Swift_PostmarkTransport::newInstance('token');
        $this->assertEquals('token', $postmarkTransport->getApi()->getToken());
    }

    public function testConstructor()
    {
        $postmarkTransport = Swift_PostmarkTransport::newInstance('token');
        $this->assertTrue(
            Swift_DependencyContainer::getInstance()->has('transport.postmark')
        );

        $this->assertEquals('token', $postmarkTransport->getApi()->getToken());
    }
}
