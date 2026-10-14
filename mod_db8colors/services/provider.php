<?php

/**
 * @package     mod_db8colors
 * @author      Peter Martin, https://db8.nl
 * @copyright   Copyright (C) 2015-2026 Peter Martin. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Extension\Service\Provider\Module;
use Joomla\CMS\Extension\Service\Provider\ModuleDispatcherFactory;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

return new class () implements ServiceProviderInterface {
    /**
     * Registers the service provider with a DI container.
     *
     * @param   Container  $container  The DI container.
     *
     * @return  void
     *
     * @since   1.1.0
     */
    public function register(Container $container): void
    {
        $container->registerServiceProvider(new ModuleDispatcherFactory('\\Db8\\Module\\Db8colors'));
        $container->registerServiceProvider(new Module());
    }
};
