<?php defined('ABSPATH') or die;

namespace Core\App;

use Exception;

class AppInstance
{
    protected $container = [
        'config' => null,
        'baseFile' => null,
        'basePath' => null,
    ];

    public function __construct($baseFile, $config)
    {
        $this->config = $config;
        $this->baseFile = $baseFile;
        $this->basePath = dirname($baseFile);
        $this->bootstrapWith($this->getProviders());
    }

    public function bootstrapWith($providers)
    {
        foreach ($providers as $provider) {
            $instances[] = $instance = (new $provider($this));
            if (method_exists($instance, 'booting')) {
                $instance->booting($this);
            }
        }

        if (isset($instances)) {
            foreach ($instances as $instance) {
                if (method_exists($instance, 'booted')) {
                    $instance->booted($this);
                }
            }
        }
    }

    public function getProviders()
    {
        $providers = $this->config->get('providers');

        if (is_admin()) {
            unset($providers['public']);
        } else {
            unset($providers['admin']);
        }

        return call_user_func_array('array_merge', $providers);
    }

    public function activating()
    {
        register_activation_hook(
            $this->baseFile,
            $this->parseHandler(func_get_args())
        );
    }

    public function addAjaxAction($action, $handler, $isNoPriv = false)
    {   
        $ajaxAction = $isNoPriv ? 'wp_ajax_nopriv_' : 'wp_ajax_';

        $this->addAction($ajaxAction.$action, $this->parseHandler($handler));
    }

    public function addAction($action, $handler, $priority = 10, $numParams = 1)
    {
        add_action(
            $action,
            $this->parseHandler($handler),
            $priority = 10,
            $numParams = 1
        );
    }

    public function addShortCode($shortCode, $handler)
    {
        add_shortcode($shortCode, $this->parseHandler($handler));
    }

    public function parseHandler($args)
    {
        $args = is_array($args) ? $args : func_get_args();

        if (is_callable($args[0])) {
            return $args[0];
        } elseif (is_string($args[0])) {
            if (strpos($args[0], '@')) {
                list($class, $method) = explode('@', $args[0]);
                $instance = new $class;
                return [$instance, $method];
            } elseif (strpos($args[0], '::')) {
                list($class, $method) = explode('::', $args[0]);
                return [$class, $method];
            }
        } else {
            return $args;
        }
    }

    public function __get($key)
    {
        if (isset($this->container[$key])) {
            return $this->container[$key];
        }
    }

    public function __set($key, $value)
    {
        $this->container[$key] = $value;
    }
}
