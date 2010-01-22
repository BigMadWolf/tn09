<?php

/**
 * Actions du module eyLanguageActions.
 */
class eyLanguageActions extends eyBaseAdminActions
{
  /**
   * Executes list action.
   *
   * @param sfWebRequest $request A request object
   */
  public function executeList(sfWebRequest $request)
  {
    parent::executeList($request);

    $extraVars = $this->widgetTable->getOption('row_template_extra_vars');
    $extraVars = array_merge($extraVars, array('count' => $this->widgetPager->getOption('pager')->getNbResults()));
    $this->widgetTable->setOption('row_template_extra_vars', $extraVars);

    $this->setTemplate('list');
  }

  /**
   * Ex�cute l'action permettant l'�dition d'un objet.
   *
   * Edit an object
   *
   * @param sfWebRequest $request
   */
  public function executeEdit(sfWebRequest $request)
  {
    parent::executeEdit($request);

    $request->addBreadcrumb($this->object->getLabel());
    
    // on utilise le m�me template que l'action new
    $this->setTemplate('new');
  }

  /**
   * Executes flagDefault action.
   *
   * @param sfRequest $request A request object
   */
  public function executeFlagDefault(sfWebRequest $request)
  {
    $referential = $this->getRoute()->getObject();

    if (!$this->checkEditableAcl($referential))
    {
      $this->setErrorMessage('Le r�f�rentiel ne peut �tre modifi� en raison d\'un manque de permission.');
      $this->redirect($this->getAdminConfiguration()->getOption('route_index'));
    }

    $referential->flagDefault();

    $this->redirect($this->getModuleName());
  }
  
  /**
   * Initialisation du fil d'Arianne.
   *
   */
  protected function initBreadcrumb()
  {
    parent::initBreadcrumb();

    $this->getRequest()->addBreadcrumb('R�f�rentiels');
    $this->getRequest()->addBreadcrumb(
      'Langues',
      $this->generateUrl($this->getAdminConfiguration()->getOption('route_index'))
    );
  }
}