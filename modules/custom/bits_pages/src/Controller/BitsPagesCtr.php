<?php 

/**
* @file
* contains \Drupal\bits_pages\Controller\BitsPagesController
*/

namespace Drupal\bits_pages\Controller;

/**
 * 
 */

use Drupal;
use Drupal\node\Entity\Node;
use Drupal\Core\Controller\ControllerBase;


class BitsPagesCtr  extends ControllerBase
{
	
	public function test(){

	
		return array(
	    	'#type' => 'markup',
	    	'#titulo' =>'',
	    	'#markup' => '<a href="/admin/structure/bits_pages">Ir al formulario</a>'
		);
	}

	public function formulario() {
	// Utilizamos el formulario
	    $form = $this->formBuilder()->getForm('Drupal\bits_pages\Form\Formulario');
	         
	// Le pasamos el formulario y demás a la vista (tema configurado en el module)
        return [
            '#theme' => 'crear_formulario',
            '#titulo' => $this->t('Formulario capacitación Drupal'),
            '#descripcion' => 'Formulario para crear una nueva empresa en Drupal 8',
            '#formulario' => $form
        ];
    }

}