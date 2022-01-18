<?php
namespace muuska\controller\admin;

use muuska\controller\AbstractController;
use muuska\util\App;
use muuska\asset\constants\AssetType;
use muuska\html\constants\ButtonStyle;
use muuska\http\constants\RedirectionType;
use muuska\project\constants\SubAppName;
use muuska\html\constants\AlertType;
// the email classes
use muuska\mail\DefaultMail as Mail;
use muuska\mail\EmailAddress;
use muuska\mail\PHPMailerSender;
use muuska\url\UrlAccessor;


class RegisterAdminController extends AbstractController
{	
	protected function processDefault()
    {
        $this->input->getResponse()->addHeader('register', 'true');
        $createForm = true;
        $registerError = null;
        $passwordError = null;
        $passwordConfirmError = null;
        $formError = null;
        $registerValue = null;
        $stayConnected = 0;
        if($this->input->hasParam('submitted')){

            $registerValue = $this->input->getParam('register');
            $password = $this->input->getParam('password');
            $passwordConfirm = $this->input->getParam('password_confirm');
            $hash = md5( rand(0,1000) );
            $activationLink = UrlAccessor::getEmailVerificationUrl().'email='.$registerValue.'&hash='.$hash;
            $noError = true;
            if(empty($registerValue)){
                $registerError = $this->l('register is required');
                $noError = false;
            }
            if(empty($password)){
                $passwordError = $this->l('Password is required');
                $noError = false;
            }elseif((empty($passwordConfirm)) || ($password != $passwordConfirm)){
                $passwordConfirmError =$this->l('The two passwords must be the same');
                $noError = false;
            }
            if($noError){
                // Initialize the user's parameters
                $user = App::securities()->createAuthentificationModel();
                $user->setLogin($registerValue);
                $user->setPassword($this->input->getCurrentUser()->encryptPassword($password));
                $user->setHash($hash);
                $user->setActive(false);
                $user->setPreferredLang($this->input->getLang());
                $user->setSubAppName(SubAppName::BACK_OFFICE);
                // Save the new user in the database
                $this->input->getDAO(App::securities()->getAuthentificationDefinitionInstance())->add($user);
                
                /* Mail informations*/
                $to = new EmailAddress($registerValue);
                $from = new EmailAddress('muuskaframework@gmail.com', 'MUUSKA PROJECT');
                $subject = $this->l('Email verification from muuska');
                
                $body = '<html><head></head><body><h3> Merci de vous être inscrit sur Musska </h3><p>Votre compte a été créé avec success, veuillez cliquez sur le bouton ci-dessous pour activer votre compte</p><p sytle="text-align:center;"><a style="height:50px; background-color:blue; color:white; border-radius:5px; :hover{text-decoration:none, color:white}" href="'.$activationLink.'">Vérifier mon Email</a></p><p> Ou bien ouvrez le lien ci-dessous dans le navigateur de votre choix: '.$activationLink.'</p></body>';
                $mail = new Mail($subject, $to, $from);
                $mail->setHtml($body);
                var_dump($activationLink);
                // Send the email
                $sender = new PHPMailerSender('smtp');
                if($sender->send($mail)){
                    $this->result->addAlert(AlertType::SUCCESS, 'Votre compte a été créé avec succès. Un email de vérification a été envoyé à votre adresse pour l\'activation de votre compte !');
                }               
            }
            if(!$this->result->hasRedirection()){
                $createForm = true;
            }
        }
        if($createForm){
            $form = App::htmls()->createForm($this->urlCreator->createDefaultUrl());
            $form->setRenderer($this->getThemeTemplate('form/login_form'));
            $registerInput = App::htmls()->createHtmlInput('text', 'register', $registerValue, $this->l('Email'));
            $registerField = App::htmls()->createFormField('register', null, $registerInput);
            $registerField->setRenderer($this->getThemeTemplate('form/login_field'));
            $registerField->setError($registerError);
            $form->addChild($registerField);
            
            $passwordInput = App::htmls()->createHtmlInput('password', 'password', null, $this->l('Password'));
            $passwordField = App::htmls()->createFormField('password', null, $passwordInput);
            $passwordField->setRenderer($this->getThemeTemplate('form/login_field'));
            $passwordField->setError($passwordError);
            $form->addChild($passwordField);

            // Password confirm-field
            $passwordConfirmInput = App::htmls()->createHtmlInput('password', 'password_confirm', null, $this->l('Confirm your password'));
            $passwordConfirmField = App::htmls()->createFormField('password_confirm', null, $passwordConfirmInput);
            $passwordConfirmField->setRenderer($this->getThemeTemplate('form/login_field'));
            $passwordConfirmField->setError($passwordConfirmError);
            $form->addChild($passwordConfirmField);

            $submitButton = App::htmls()->createButton(App::createHtmlString($this->l('Sign up')), 'submit', null, ButtonStyle::BRAND);
            $form->setSubmit($submitButton);
            $form->setErrorText($formError);
            $this->result->setContent($form);
        }
    }
    
    /**
     * {@inheritDoc}
     * @see \muuska\controller\AbstractController::formatHtmlPage()
     */
    protected function formatHtmlPage(\muuska\controller\event\ControllerPageFormatingEvent $event, $fireFormattingEvent = true)
    {
        $title = App::createHtmlString($this->l('SignUp To Admin'), 'loginTitle');
        $event->addContentCreator($title);
        $event->setPageRenderer($this->getThemeTemplate('page/login_admin'));
        $this->input->getTheme()->createHtmlImage('fsfsfsf');
        $this->addThemeAsset(AssetType::CSS, 'login-3.css');
        parent::formatHtmlPage($event, false);
    }
    
    protected function getBackUrl() {
        ;
    }
}