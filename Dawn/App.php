<?php

namespace Dawn;

class App
{
    protected $appName;
    protected $config;
    protected $basePath;
    protected $serviceProviders = [];

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->appName = $config['app name'];
        $this->basePath = $config['base'];
    }

    public function bootstrap()
    {
        $this->registerServiceProviders();

        return $this;
    }

    public function registerServiceProviders()
    {
        foreach ($this->config['service providers'] as $key => $serviceProviderClass) {
            $serviceProvider = (new $serviceProviderClass($this))->register();
        }
    }

    public function bootServiceProviders()
    {
        foreach ($this->serviceProviders as $serviceProvider) {
            $serviceProvider->boot();
        }
    }

    public function run()
    {
        $this->serviceProviders['router']->start();
    }

    public function bind(string $serviceProviderName, $serviceProvider)
    {
        if (empty($serviceProviderName)) {
            return null;
        }

        $this->serviceProviders[$serviceProviderName] = $serviceProvider;

        return $this->serviceProviders[$serviceProviderName];
    }

    public function get(string $serviceProviderName)
    {
        return $this->serviceProviders[$serviceProviderName];
    }

    public function connection()
    {
        return $this->get('connection');
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getServiceProviders()
    {
        return $this->serviceProviders;
    }

    public function setServiceProviders(array $serviceProviders)
    {
        foreach ($serviceProviders as $key => $value) {
            if (empty($key) || !is_object($value)) {
                return false;
            }
        }

        $this->serviceProviders = $serviceProviders;

        return $this->serviceProviders;
    }
}