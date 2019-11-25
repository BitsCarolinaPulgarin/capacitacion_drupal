<?php 

/**
* @file
* contains \Drupal\bits_pages\Controller\BitsPagesController
*/

namespace Drupal\bits_database\Controller;

/**
 * 
 */

use Drupal;
use Drupal\node\Entity\Node;
use Drupal\Core\Controller\ControllerBase;


class BitsdatabaseCtr  extends ControllerBase
{
	
	public function test(){
		return array(
	    	'#type' => 'markup',
	    	'#markup' => t('Módulo Bits database')
		);
	}

}