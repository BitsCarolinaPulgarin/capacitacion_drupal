<?php
namespace Drupal\bits_pages\Form;
 
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;
use Drupal\node\Entity\User;
 
 
class Formulario extends FormBase {
    

    public function getFormId() {
        // Nombre del formulario
        return 'crear_formulario';
    }
 

    public function buildForm(array $form, FormStateInterface $form_state) {
        
      $user_id = \Drupal::currentUser()->id();
      $user = \Drupal\user\Entity\User::load($user_id);

       // Definimos los campos
        $form['titulo'] = [
            '#type'     => 'textfield',
            '#title'    => t('Titulo'),
            '#required' => TRUE,
            '#maxlength' => 30,
            '#minlength' => 5
        ];
         
        $form['user_name'] = [
            '#type'     => 'textfield',
            '#title'    =>  t('Nombre de usuario'),
            '#required' => TRUE,
            '#default_value' => $user->name->value
            
        ];
 
        $form['email'] = [
          '#type' => 'email',
          '#title' => t('Email'),
          '#required' => TRUE,
          '#default_value' => $user->mail->value
        ];
        
        $form['submit'] = [
            '#type'  => 'submit',
            '#value' =>  t('Guardar'),
        ];
        return $form;
    }
 

    public function validateForm(array &$form, FormStateInterface $form_state) {
        
        $user_id = \Drupal::currentUser()->id();
        $user = \Drupal\user\Entity\User::load($user_id);

        // Hacemos las validaciones necesarias
        if (empty($form_state->getValue('titulo'))) {

            $form_state->setErrorByName('titulo', $this->t('Campo requerido'));
        }

        if (empty($form_state->getValue('user_name'))) {
            $form_state->setErrorByName('user_name', $this->t('Campo requerido'));
        }



        if(!empty($user_id)){

          if($form_state->getValue('user_name') != $form['user_name']['#default_value'] ){
                $form_state->setErrorByName('user_name', $this->t('El nombre de usuario no puede ser modificado'));
          }

        }

        if (empty($form_state->getValue('email'))) {
            $form_state->setErrorByName('user_name', $this->t('Campo requerido'));
        }
    }
 

    public function submitForm(array &$form, FormStateInterface $form_state) {
        
        $user_id = \Drupal::currentUser()->id();

        $fields = array('title' => $form_state->getValue('titulo'), 
                  'username' => $form_state->getValue('user_name'),
                  'uid' =>  is_null($user_id) ? 0 : $user_id,
                  'email' => $form_state->getValue('email'),
                  'ip' =>$_SERVER["REMOTE_ADDR"],
                  'timestamp' => date('Y-m-d H:m:s')
        );

        db_insert('bits_pages')->fields($fields)->execute();

        // Mostrar resultados al enviar el formulario en un mensaje de drupal
        foreach ($form_state->getValues() as $key => $value) {
            drupal_set_message($key . ': ' . $value);
        }
    }
}
