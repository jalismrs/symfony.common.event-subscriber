<?php
declare(strict_types = 1);

namespace Jalismrs\Symfony\Common;

use Symfony\Component\Console\Style\SymfonyStyle;
use UnexpectedValueException;

/**
 * Class ConsoleEventHandlerAbstract
 *
 * @package Jalismrs\Symfony\Common
 */
abstract class ConsoleEventSubscriberAbstract extends
    EventSubscriberAbstract
{
    /**
     * style
     *
     * @var \Symfony\Component\Console\Style\SymfonyStyle|null
     */
    private ?SymfonyStyle $style = null;
    
    /**
     * getStyle
     *
     * @return \Symfony\Component\Console\Style\SymfonyStyle
     */
    public function getStyle() : SymfonyStyle
    {
        if ($this->style === null) {
            throw new UnexpectedValueException(
                'style has not been set'
            );
        }
        
        return $this->style;
    }
    
    /**
     * setStyle
     *
     * @param \Symfony\Component\Console\Style\SymfonyStyle $style
     *
     * @return void
     *
     * @codeCoverageIgnore
     */
    public function setStyle(
        SymfonyStyle $style
    ) : void {
        $this->style = $style;
    }
    
    /**
     * isActive
     *
     * @return bool
     *
     * @codeCoverageIgnore
     */
    public function isActive() : bool
    {
        return parent::isActive()
            &&
            $this->style !== null;
    }
}
