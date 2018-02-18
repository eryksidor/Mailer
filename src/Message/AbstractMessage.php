<?php
/*
 * (c) Eryk Sidor<eryksidor1403@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CodeLab\Bundle\MailerBundle\Message;

use DateTimeInterface;
use Swift_Mime_ContentEncoder;
use Symfony\Component\Validator\Validation;


/**
 * Class AbstractSwiftMessageBuilder
 * Description of abstract message prepared for send. Here are provided simple validation.
 *
 * @package CodeLab\Bundle\MailerBundle\Message
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
class AbstractMessage extends \Swift_Message
{

    /**
     * @var array of errors
     */
    private $errors;

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
    }

    /**
     * @param MessageError $messageError
     */
    private function addError(MessageError $messageError): void
    {
        $this->errors[] = $messageError;
    }

    /**
     * @return bool
     */
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param mixed $addresses
     * @param null $name
     * @return $this
     */
    public function setTo($addresses, $name = null)
    {
        try {
            return parent::setTo($addresses, $name);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param mixed $addresses
     * @param null $name
     * @return $this
     */
    public function setBcc($addresses, $name = null)
    {
        try {
            return parent::setBcc($addresses, $name);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param mixed $body
     * @param null $contentType
     * @param null $charset
     * @return $this
     */
    public function setBody($body, $contentType = null, $charset = null)
    {
        try {
            return parent::setBody($body, $contentType, $charset);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $boundary
     * @return $this
     */
    public function setBoundary($boundary)
    {
        try {
            return parent::setBoundary($boundary);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param mixed $addresses
     * @param null $name
     * @return $this
     */
    public function setCc($addresses, $name = null)
    {
        try {
            return parent::setCc($addresses, $name);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $charset
     * @return $this
     */
    public function setCharset($charset)
    {
        try {
            return parent::setCharset($charset);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }

    }

    /**
     * @param array $children
     * @param null $compoundLevel
     * @return $this
     */
    public function setChildren(array $children, $compoundLevel = null)
    {
        try {
            return parent::setChildren($children, $compoundLevel);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setContentType($type)
    {
        try {
            return parent::setContentType($type);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param DateTimeInterface $dateTime
     * @return $this
     */
    public function setDate(DateTimeInterface $dateTime)
    {
        try {
            return parent::setDate($dateTime);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param bool $delsp
     * @return $this
     */
    public function setDelSp($delsp = true)
    {
        try {
            return parent::setDelSp($delsp);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        try {
            return parent::setDescription($description);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param Swift_Mime_ContentEncoder $encoder
     * @return $this
     */
    public function setEncoder(Swift_Mime_ContentEncoder $encoder)
    {
        try {
            return parent::setEncoder($encoder);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $format
     * @return $this
     */
    public function setFormat($format)
    {
        try {
            return parent::setFormat($format);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param array|string $addresses
     * @param null $name
     * @return $this
     */
    public function setFrom($addresses, $name = null)
    {
        try {
            return parent::setFrom($addresses, $name);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param $field
     * @param $model
     * @return bool
     */
    public function setHeaderFieldModel($field, $model)
    {
        try {
            return parent::setHeaderFieldModel($field, $model);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param $field
     * @param $parameter
     * @param $value
     * @return bool
     */
    public function setHeaderParameter($field, $parameter, $value)
    {
        try {
            return parent::setHeaderParameter($field, $parameter, $value);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        try {
            return parent::setId($id);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param int $length
     * @return $this
     */
    public function setMaxLineLength($length)
    {
        try {
            return parent::setMaxLineLength($length);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param $level
     */
    public function setNestingLevel($level)
    {
        try {
            parent::setNestingLevel($level);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param int $priority
     * @return $this
     */
    public function setPriority($priority)
    {
        try {
            return parent::setPriority($priority);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param array $addresses
     * @return $this
     */
    public function setReadReceiptTo($addresses)
    {
        try {
            return parent::setReadReceiptTo($addresses);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param mixed $addresses
     * @param null $name
     * @return $this
     */
    public function setReplyTo($addresses, $name = null)
    {
        try {
            return parent::setReplyTo($addresses, $name);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setReturnPath($address)
    {
        try {
            return parent::setReturnPath($address);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $address
     * @param null $name
     * @return $this
     */
    public function setSender($address, $name = null)
    {
        try {
            return parent::setSender($address, $name);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        try {
            return parent::setSubject($subject);
        } catch (\Swift_RfcComplianceException $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

}