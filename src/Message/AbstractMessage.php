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

/**
 * Class AbstractSwiftMessageBuilder
 * Description of abstract message prepared for send. Here are provided simple validation.
 *
 * @author Eryk Sidor <eryksidor1403@gmail.com>
 */
abstract class AbstractMessage extends \Swift_Message
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
     */
    public function setTo($addresses, $name = null)
    {
        try {
            parent::setTo($addresses, $name);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param mixed $addresses
     * @param null $name
     */
    public function setBcc($addresses, $name = null)
    {
        try {
            parent::setBcc($addresses, $name);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param mixed $body
     * @param null $contentType
     * @param null $charset
     */
    public function setBody($body, $contentType = null, $charset = null)
    {
        try {
            parent::setBody($body, $contentType, $charset);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $boundary
     */
    public function setBoundary($boundary)
    {
        try {
            parent::setBoundary($boundary);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param mixed $addresses
     * @param null $name
     */
    public function setCc($addresses, $name = null)
    {
        try {
            parent::setCc($addresses, $name);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $charset
     */
    public function setCharset($charset)
    {
        try {
            parent::setCharset($charset);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }

    }

    /**
     * @param array $children
     * @param null $compoundLevel
     */
    public function setChildren(array $children, $compoundLevel = null)
    {
        try {
            parent::setChildren($children, $compoundLevel);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $type
     */
    public function setContentType($type)
    {
        try {
            parent::setContentType($type);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param DateTimeInterface $dateTime
     */
    public function setDate(DateTimeInterface $dateTime)
    {
        try {
            parent::setDate($dateTime);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param bool $delsp
     */
    public function setDelSp($delsp = true)
    {
        try {
            parent::setDelSp($delsp);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        try {
            parent::setDescription($description);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param Swift_Mime_ContentEncoder $encoder
     */
    public function setEncoder(Swift_Mime_ContentEncoder $encoder)
    {
        try {
            parent::setEncoder($encoder);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        try {
            parent::setFormat($format);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param array|string $addresses
     * @param null $name
     */
    public function setFrom($addresses, $name = null)
    {
        try {
            parent::setFrom($addresses, $name);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param $field
     * @param $model
     */
    public function setHeaderFieldModel($field, $model)
    {
        try {
            parent::setHeaderFieldModel($field, $model);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param $field
     * @param $parameter
     * @param $value
     */
    public function setHeaderParameter($field, $parameter, $value)
    {
        try {
            parent::setHeaderParameter($field, $parameter, $value);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        try {
            parent::setId($id);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param int $length
     */
    public function setMaxLineLength($length)
    {
        try {
            parent::setMaxLineLength($length);
        } catch (\Exception $exception) {
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
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        try {
            parent::setPriority($priority);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param array $addresses
     */
    public function setReadReceiptTo($addresses)
    {
        try {
            parent::setReadReceiptTo($addresses);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param mixed $addresses
     * @param null $name
     */
    public function setReplyTo($addresses, $name = null)
    {
        try {
            parent::setReplyTo($addresses, $name);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $address
     */
    public function setReturnPath($address)
    {
        try {
            parent::setReturnPath($address);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $address
     * @param null $name
     */
    public function setSender($address, $name = null)
    {
        try {
            parent::setSender($address, $name);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        try {
            parent::setSubject($subject);
        } catch (\Exception $exception) {
            self::addError(new MessageError($exception->getMessage(), __FUNCTION__));
        }
    }

}