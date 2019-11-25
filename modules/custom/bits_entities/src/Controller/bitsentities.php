<?php 

/**
* @file
* contains \Drupal\bits_pages\Controller\BitsPagesController
*/

namespace Drupal\bits_entities\Controller;

/**
 * 
 */

use Drupal;
use Drupal\node\Entity\Node;
use Drupal\Core\Controller\ControllerBase;


class bitsentities  extends ControllerBase
{
	
	public function test(){
		return array(
	    	'#type' => 'markup',
	    	'#markup' => t('Módulo Bits Entities')
		);
	}

}