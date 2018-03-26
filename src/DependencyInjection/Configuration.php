<?php

namespace CodeLab\Bundle\MailerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('mailer');

        $rootNode
            ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode("resend_interval")->defaultValue(5)->end()
                    ->scalarNode("default_send_from")->defaultValue('')->end();

        return $treeBuilder;
    }
}
