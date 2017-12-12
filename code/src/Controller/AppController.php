<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');


		$this->loadComponent('Auth', [
		 	'loginAction' => [ 
		 		'controller' => 'Users',// Controller process login action
		   		'action' => 'login',
		   		//Action process login action 
		   	],
		    'loginRedirect' => [
		     	'controller' => 'UsersTable', 'action' => 'logout' 
		    ],
		    'authError' => false,
		    'authenticate' => [
			    'Form' => [
			        'fields' => [ 
			         	'username' => 'email',
			       	    'password' => 'password' 
			       	],
			       	'userModel' => 'Users',
				    // 'passwordHasher' => [
		      //  	     	'className' => 'Fallback',
		      //  	    	 'hashers' => ['Legacy'] 
		      //  	    ]
		       	] 
		    ],
		       	    	  
		    'unauthorizedRedirect' => [
				'controller' => 'UsersTable',
				'action' => 'index'//,
				//'home'
			],
			'authError' => 'Did you really think you are allowed to see that?',	
		]);






		// $this->loadComponent('Auth', [
		// 'loginAction'=> 'Controller',
		// 'authenticate' => [
		// 	'Form' => [
		// 		// fields used in login form
		// 		'fields' => [
		// 			'username' => 'email',
		// 			'password' => 'password'],
		// 		 'UsersTable' => 'users',
		// 	]
		// ],
		// // login Url
		// 'loginAction' => [
		// 	'controller' => 'UsersTable',
		// 	'action' => 'login'
		// ],
		// // where to be redirected after logout  
		// 'logoutRedirect' => [
		// 	'controller' => 'UsersTable',
		// 	'action' => 'login'//,
		// 	//'home'
		// ],
		// // if unauthorized user go to an unallowed action he will be redirected to this url
		// 'unauthorizedRedirect' => [
		// 	'controller' => 'UsersTable',
		// 	'action' => 'index'//,
		// 	//'home'
		// ],
		// 'authError' => 'Did you really think you are allowed to see that?',
		// ]);
		// Allow the display action so our pages controller still works and  user can visit index and view actions.
		//$this->Auth->allow(['index','display','view']);
		
    }


	public function isAuthorized($user)
	{
		$this->Flash->error('You aren\'t allowed');
		return false;
	}
	
	public function beforeFilter(Event $event)
	{
		$this->Auth->allow(['index', 'view', 'display']);
	}
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
	 
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}


?>