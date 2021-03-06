<?php
namespace Noodlehaus\File\Test;

use Noodlehaus\File\Php;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-04-21 at 22:37:22.
 */
class PhpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Php
     */
    protected $php;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->php = new Php();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers                   Noodlehaus\File\Php::load()
     * @expectedException        Noodlehaus\Exception\UnsupportedFormatException
     * @expectedExceptionMessage PHP file does not return an array
     */
    public function testLoadInvalidPhp()
    {
        $this->php->load(__DIR__ . '/../mocks/fail/error.php');
    }

    /**
     * @covers                   Noodlehaus\File\Php::load()
     * @expectedException        Noodlehaus\Exception\ParseException
     * @expectedExceptionMessage PHP file threw an exception
     */
    public function testLoadExceptionalPhp()
    {
        $this->php->load(__DIR__ . '/../mocks/fail/error-exception.php');
    }

    /**
     * @covers Noodlehaus\File\Php::load
     */
    public function testLoadPhpArray()
    {
        $actual = $this->php->load(__DIR__ . '/../mocks/pass/config.php');
        $this->assertEquals('localhost', $actual['host']);
        $this->assertEquals('80', $actual['port']);
    }

    /**
     * @covers Noodlehaus\File\Php::load
     */
    public function testLoadPhpCallable()
    {
        $actual = $this->php->load(__DIR__ . '/../mocks/pass/config-exec.php');
        $this->assertEquals('localhost', $actual['host']);
        $this->assertEquals('80', $actual['port']);
    }
}
