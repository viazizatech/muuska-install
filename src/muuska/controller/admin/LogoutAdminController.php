<?php
namespace muuska\controller\admin;

use muuska\controller\AbstractController;
use muuska\http\constants\RedirectionType;
use muuska\util\App;

class LogoutAdminController extends AbstractController
{	
	protected function processDefault()
    {
        // Logout the current user
        $currentUser = $this->input->getCurrentUser();
        $currentUser->logOut($this->input->getRequest(), $this->input->getResponse(), $this->input->getVisitorInfoRecorder());
        // Back the user to the Home Page
        $redirection = App::https()->createDynamicRedirection(RedirectionType::HOME);
        $this->result->setRedirection($redirection);

    }
}