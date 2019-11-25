<?php 

/**
* @file
* contains \Drupal\bits_pages\Controller\BitsPagesController
*/

namespace Drupal\bits_users\Controller;

/**
 * 
 */

use Drupal;
use Drupal\node\Entity\Node;
use Drupal\Core\Controller\ControllerBase;


class bitsUsersCtr  extends ControllerBase
{
	
	public function test(){
		$user_id = \Drupal::currentUser()->id();
      	$user = \Drupal\user\Entity\User::load($user_id);
      	$LastLogin = \Drupal::currentUser()->getLastAccessedTime();
		$fecha = date( "Y-m-d", strtotime($LastLogin));

      	$datos = array(
      		'id' => $user_id,
      		'Usuario' => $user->name->value, 
      		'Roles' =>\Drupal::currentUser()->getRoles()[1],
      		'Email' =>  $user->mail->value,
      		'LastLogin' => $fecha,

      	);

      	foreach ($datos as $key => $value) {
            drupal_set_message($key . ': ' . $value);
        }

      	return array(
	    	'#type' => 'markup',
	    	'#markup' => t('Módulo BITS Users')
		);

      	

		
	}
}