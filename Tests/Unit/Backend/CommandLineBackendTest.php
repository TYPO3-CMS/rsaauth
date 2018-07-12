<?php
namespace TYPO3\CMS\Rsaauth\Tests\Unit\Backend;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Rsaauth\Backend\CommandLineBackend;

/**
 * Test case.
 */
class CommandLineBackendTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var CommandLineBackend
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = new CommandLineBackend();
    }

    /**
     * @test
     */
    public function createNewKeyPairCreatesReadyKeyPair()
    {
        $this->skipIfWindows();
        $keyPair = $this->subject->createNewKeyPair();
        if ($keyPair === null) {
            $this->markTestSkipped('KeyPair could not be generated. Maybe openssl was not found.');
        }

        $this->assertTrue($keyPair->isReady());
    }

    /**
     * @test
     */
    public function createNewKeyPairCreatesKeyPairWithDefaultExponent()
    {
        $this->skipIfWindows();
        $keyPair = $this->subject->createNewKeyPair();
        if ($keyPair === null) {
            $this->markTestSkipped('KeyPair could not be generated. Maybe openssl was not found.');
        }

        $this->assertSame(
            CommandLineBackend::DEFAULT_EXPONENT,
            $keyPair->getExponent()
        );
    }

    /**
     * @test
     */
    public function createNewKeyPairCalledTwoTimesReturnsSameKeyPairInstance()
    {
        $this->skipIfWindows();
        $this->assertSame(
            $this->subject->createNewKeyPair(),
            $this->subject->createNewKeyPair()
        );
    }

    /**
     * @test
     */
    public function doesNotAllowUnserialization()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionCode(1531336156);

        $subject = new CommandLineBackend();
        $serialized = serialize($subject);
        unserialize($serialized);
    }

    /**
     * @test
     */
    public function unsetsPathsOnUnserialization()
    {
        try {
            $subject = $this->getAccessibleMock(CommandLineBackend::class);
            $subject->_set('opensslPath', 'foo');
            $subject->_set('temporaryDirectory', 'foo');
            $serialized = serialize($subject);
            unserialize($serialized);
        } catch (\RuntimeException $e) {
            $this->assertNull($subject->_get('opensslPath'));
            $this->assertNull($subject->_get('temporaryDirectory'));
        }
    }

    protected function skipIfWindows()
    {
        if (TYPO3_OS === 'WIN') {
            $this->markTestSkipped(
                'This test is not available on Windows as auto-detection of openssl path will fail.'
            );
        }
    }
}
