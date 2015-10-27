# Auth plugin para CakePHP

Em desenvolvimento, ainda não testado!

## Instalação

Você pode instalar este plugin no seu CakePHP 3 usando [composer](http://getcomposer.org).

Para instalar rode o comando:

```
composer require cakephp-brasil/auth
```

Para ativar adicione a seguinte linha no fim do seu arquivo **config/bootstrap.php**.

```
Plugin::load('Auth', ['bootstrap' => false, 'routes' => true]);
```

## Uso

Para criar a tabela de usuários:

```
bin/cake migrations migrate -p Auth
```

Para ativar a autenticação:

	public function initialize()
	{
	    parent::initialize();
	    $this->loadComponent('Auth', [
	    	//para usar o action e view do plugin
	        'loginAction' => [
	            'controller' => 'Users',
	            'action' => 'login',
	            'plugin' => 'Auth'
	        ],
	        'authError' => 'A mensagem de erro ao autenticar?',
	        'authenticate' => [
	            'Form' => [
	            	//para autenticar usando email
	                'fields' => ['username' => 'email']
	            ]
	        ]
	    ]);
	}

Se quiser autenticar usando Facebook altere o **authenticate** `Form` para `Facebook` e adicione o Storage do plugin, desta forma:

	public function initialize()
	{
	    parent::initialize();
	    $this->loadComponent('Auth', [
	    	//para usar o action e view do plugin
	        'loginAction' => [
	            'controller' => 'Users',
	            'action' => 'login',
	            'plugin' => 'Auth'
	        ],
	        'authError' => 'A mensagem de erro ao autenticar?',
	        'authenticate' => [
	            'Facebook' => [
	            	//para autenticar usando email
	                'fields' => ['username' => 'email']
	            ]
	        ],
        'storage' => 'Auth.Session'
	    ]);
	}

A autenticação via formulário continua funcionando, mas agora você também tem a possibilidade de se autenticar usando o Facebook.