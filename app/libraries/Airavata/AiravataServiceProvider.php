<?php namespace Airavata;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Airavata\API\AiravataClient;
use Thrift\Transport\TSocket;
use Thrift\Protocol\TBinaryProtocol;

class AiravataServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('airavata/airavata');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        //registering service provider
        $this->app['airavata'] = $this->app->share(function($app)
        {
            try{
                $transport = new TSocket(
                    Config::get('pga_config.airavata')['airavata-server'],
                    Config::get('pga_config.airavata')['airavata-port']
                );
                $transport->setRecvTimeout( Config::get('pga_config.airavata')['airavata-timeout']);
                $transport->setSendTimeout( Config::get('pga_config.airavata')['airavata-timeout']);

                $protocol = new TBinaryProtocol($transport);
                $transport->open();

                $client = new AiravataClient($protocol);

            }catch (\Exception $ex){
                var_dump($ex);
                exit;
            }

            if( is_object( $client))
                return $client;
            else
                return Redirect::to("airavata/down");
        });

        //registering alis
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Airavata', 'Airavata\Facades\Airavata');
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('airavata');
	}

}
