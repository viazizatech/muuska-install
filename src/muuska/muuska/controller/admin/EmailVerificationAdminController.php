<?php
namespace muuska\controller\admin;

use muuska\controller\AbstractController;
use muuska\util\App;
use muuska\http\constants\RedirectionType;
use muuska\constants\operator\Operator;
use muuska\html\constants\AlertType;

class EmailVerificationAdminController extends AbstractController
{	
    // Configuration of the url parameters
    protected function initParamResolver(){
        $parsers = array(
            App::controllers()->createDefaultControllerParamParser('email', true),
            App::controllers()->createDefaultControllerParamParser('hash', true)
        );
        $this->paramResolver = App::controllers()->createDefaultControllerParamResolver($this->input, $this->result, $parsers);
    }

	protected function processDefault()
    {   
        // Activate the user
        $email = $this->paramResolver->getParam('email')->getValue();
        $hash = $this->paramResolver->getParam('hash')->getValue();
        $userDao = $this->input->getDAO(App::securities()->getAuthentificationDefinitionInstance());
        $selectionConfig = $this->input->createSelectionConfig();
        $selectionConfig->setRestrictionFieldParams('login', $email, Operator::EQUALS);
        $selectionConfig->setRestrictionFieldParams('hash', $hash, Operator::EQUALS);
        $user = $userDao->getUniqueModel($selectionConfig);
        if($user){
            $userDao->activate($user);
            // Redirect the user to the login page
            $redirection = App::https()->createDynamicRedirection(RedirectionType::LOGIN);
            $this->result->setRedirection($redirection);
        }else{
            $this->result->addAlert(AlertType::WARNING, 'Utilisateur introuvable, veuillez lire le mail qui vous a été envoyé !');
        }
        
    }
}