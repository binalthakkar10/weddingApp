<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.



$configArray =  array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Wedoo',

	'preload'=>array('log'),
 	'defaultController'=>'index',


// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.models.User.*',
		'application.web.*',
		'application.components.*',
		'ext.giix-components.*', // giix components
		'application.modules.rights.*', 
		'application.modules.rights.components.*', // Correct paths if necessary.
		'ext.slajaxtabs.*', // giix components
		'application.modules.wedding.*',
		'application.modules.wedding.components.*',
		'application.extensions.fckeditor.FCKEditorWidget.*',
		'application.extensions.yii-mail.*',
		'application.helpers.*',		
		'application.extensions.inx.*',
		'application.extensions.EPhotoValidator.*',
		'application.extensions.CJuiDateTimePicker.CJuiDateTimePicker',
		'application.extensions.phpmailer.JPhpMailer',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			//'password'=>'mmpandey',
			'password'=>'admin',
			'generatorPaths' => array(
				'ext.giix-core', // giix generators
),
			'ipFilters'=>array('127.0.0.1','::1'),
),
		'rights'=>array( 'install'=>true, // Enables the installer. 
						),
		'admin',
		'wedding',	
		'api',
						
// uncomment the following to enable the Gii tool
/*
 'gii'=>array(
 'class'=>'system.gii.GiiModule',
 'password'=>'Enter Your Password Here',
 ),
 */
),
	//'sourceLanguage'    =>'en_US',
	//'language'          =>'en_US',
	// application components
	'components'=>array(
		'admin'=>array(
	        'allowAutoLogin'=>true,
			'autoUpdateFlash'=>true, 
	        'class'=>'AdminRWebUser', 	
	        'loginUrl' => array('/admin/login'),
			'fullname' => '',
		), 
		'wedding'=>array(
	        'allowAutoLogin'=>true,
			'autoUpdateFlash'=>true, 
	        'class'=>'WeddingRWebUser', 	
	        'loginUrl' => array('/wedding/index'),
		),
		
		'user'=>array(
	        'allowAutoLogin'=>true,
			'autoUpdateFlash'=>true, 
	        'class'=>'UserRWebUser', 	
			'class'=>'RWebUser', //k
	        'loginUrl' => array('/user/login'),
		),
		'authManager'=>array( //k
		      		'class'=>'RDbAuthManager',     // Provides support authorization item sorting. 
		),
		'email'=>array(
        'class'=>'application.extensions.email.Email',
        'delivery'=>'php', //Will use the php mailing function.  
        //May also be set to 'debug' to instead dump the contents of the email into the view
    	),
		// uncomment the following to enable URLs in path-format
		'mail' => array(
		        'class' => 'application.extensions.yii-mail.YiiMail',
		        'transportType'=>'smtp', /// case sensitive!
		        'transportOptions'=>array(
		            'host'=>'mail.inheritx.com',
		            'username'=>'client1@inheritx.com',
		            'password'=>'client@123',
		            'port'=>'26',
					//'encryption'=>'ssl',
		        ),
		        'viewPath' => 'application.views.mail',
		        'logging' => true,
		        'dryRun' => false,
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
    		'showScriptName'=>false,
    		'rules'=>array(
				'admin/'			=>'admin/index/index',
				'admin/login'		=>'admin/index/login',
				'admin/logout'		=>'admin/index/logout',
				'admin/<controller:\w+>/<action:\w+>'=>'admin/<controller>/<action>',
    	
    	
    			'wedding/'			=>'wedding/index/index',
				'wedding/login'	=>'wedding/login',
				'wedding/logout'	=>'wedding/index/logout',
				'wedding/<controller:\w+>/<action:\w+>'=>'wedding/<controller>/<action>',    				
),
),
		
// uncomment the following to use a MySQL database
//'db'=>getDbConfig(),

		'errorHandler'=>array(
									// use 'site/error' action to display errors
								    'errorAction'=>'index/error',
								),
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
					'class'=>'CFileLogRoute',
					'categories'=>'linkedin',
					'logfile'=>'linkedin.log'
				),
				array(
					'class'=>'CFileLogRoute',
					'categories'=>'sync',
					'logfile'=>'sync.log'
				),
),
),

		'CURL' =>array(
			'class' => 'application.extensions.curl.Curl',
//you can setup timeout,http_login,proxy,proxylogin,cookie, and setOPTIONS
),

'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'/opt/local/bin'),
        ),
),

// application-level parameters that can be accessed
// using Yii::app()->params['paramName']
	'params'=>array(
// this is used in contact page
		'adminEmail'=>'binalthakkar@hotmail.com',
),
);

// Database Configuration

if($_SERVER['SERVER_NAME']=='localhost') { //localhost -dev setting
	$configArray['components']['db'] = array(
			'connectionString' => 'mysql:host=localhost;dbname=wedoo',
			'emulatePrepare' => true,
			'username' => 'root', 
			'password' => '',
			'charset' => 'utf8',
	);
}else {// demo server setting - inxserver
	$configArray['components']['db'] = array(
			'connectionString' => 'mysql:host=localhost;dbname=wedoo',
			'emulatePrepare' => true,
			'username' => 'root', 
			'password' => '',
			'charset' => 'utf8',
	);
}
return $configArray;