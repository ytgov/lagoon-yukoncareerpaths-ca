<?php

namespace Drupal\gyocf_visualization\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the action entity edit forms.
 */
class ActionForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New action %label has been created.', $message_arguments));
        $this->logger('gyocf_visualization')->notice('Created new action %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The action %label has been updated.', $message_arguments));
        $this->logger('gyocf_visualization')->notice('Updated action %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.gyocf_action.canonical', ['gyocf_action' => $entity->id()]);

    return $result;
  }

}
