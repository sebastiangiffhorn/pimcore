<?php


namespace Pimcore\Bundle\PimcoreBundle\Routing\Loader;

use Sensio\Bundle\FrameworkExtraBundle\Routing\AnnotatedRouteControllerLoader as BaseAnnotatedRouteControllerLoader;

/**
 * Normalizes autogenerated admin routes to pimcore_admin_ and pimcore_api_ prefixes
 */
class AnnotatedRouteControllerLoader extends BaseAnnotatedRouteControllerLoader
{
    /**
     * @inheritDoc
     */
    protected function getDefaultRouteName(\ReflectionClass $class, \ReflectionMethod $method)
    {
        $routeName = parent::getDefaultRouteName($class, $method);

        $replacements = [
            'pimcore_pimcoreadmin_rest_'  => 'pimcore_api_rest_',
            'pimcore_pimcoreadmin_admin_' => 'pimcore_admin_',
            'pimcore_pimcoreadmin_'       => 'pimcore_admin_',
        ];

        $routeName = str_replace(
            array_keys($replacements),
            array_values($replacements),
            $routeName
        );

        return $routeName;
    }
}