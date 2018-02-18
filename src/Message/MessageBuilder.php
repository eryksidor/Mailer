<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Message;

use Symfony\Component\Validator\Validation;


/**
 * Class AbstractSwiftMessageBuilder
 * Description of message which can be send by mailer. Here are added validation for default message methods.
 *
 * @package CodeLab\Bundle\MailerBundle\Message
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
class AbstractSwiftMessageBuilder extends \Swift_Message
{
    /**
     * @var \Symfony\Component\Validator\Validator\ValidatorInterface
     */
    private $validator;

    /**
     * AbstractSwiftMessageBuilder constructor.
     * @param null|string $subject
     * @param null|string $body
     * @param null|string $contentType
     * @param null|string $charset
     */
    public function __construct(?string $subject = null, ?string $body = null, ?string $contentType = null, ?string $charset = null)
    {
        parent::__construct($subject, $body, $contentType, $charset);
        $this->validator = Validation::createValidator();

    }


    public function setTo($addresses, $name = null)
    {
        try {
            return parent::setTo($addresses, $name);
        } catch (\Exception $exception) {
            dump($exception);
            die;
        }
    }


}