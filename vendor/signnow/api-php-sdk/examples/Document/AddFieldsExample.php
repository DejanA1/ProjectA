<?php
declare(strict_types = 1);

namespace Examples\Document;

use Examples\BaseExample;
use SignNow\Api\Entity\Document\Document;
use SignNow\Api\Entity\Document\Field\InitialsField;
use SignNow\Api\Entity\Document\Field\SignatureField;
use SignNow\Api\Entity\Document\Field\TextField;
use SignNow\Api\Entity\Document\Upload;

// use \ReflectionException;
// use JMS\Serializer\SerializerBuilder;
// use SignNow\Api\Entity\FreeForm\Invite;
// use SignNow\Api\Entity\FreeForm\InviteResponse;

use SignNow\Api\Entity\Document\FieldExtract;
use SignNow\Api\Entity\Invite\Recipient;
use SignNow\Api\Entity\Invite\Response;

// freedom invite
// use JMS\Serializer\SerializerBuilder;
// use ReflectionException;
// use SignNow\Api\Entity\FreeForm\Invite;
// use SignNow\Api\Entity\FreeForm\InviteResponse;

// Pure invite
use SignNow\Api\Entity\Invite\Invite;
use JMS\Serializer\Annotation as Serializer;
use SignNow\Rest\Entity\Entity;
use SignNow\Rest\EntityManager\Annotation\HttpEntity;
use SignNow\Rest\EntityManager\Annotation\ResponseType;


/**
 * Class AddFieldsExample
 *
 * @package Examples\Document
 */
class AddFieldsExample extends BaseExample
{
    /**
     * @var array
     */
    protected $requiredParameters = [];
    // protected $requiredParameters = ['document_id:'];
    
    /**
     * @return mixed|object
     *
     * @throws \ReflectionException
     * @throws \SignNow\Rest\EntityManager\Exception\EntityManagerException
     */
    public function execute()
    {
        /************Upload document *********************/
        $file_path = "http://contractors10.com/url-to-signNow/ORDER FORM BLANK.pdf";
        $doc = new Upload(new \SplFileInfo($file_path));
        $document = $this->entityManager->create($doc);

        if(isset($_GET['email'])) $email = $_GET['email']; else $email = "";
        if(isset($_GET['fax'])) $fax = $_GET['fax']; else $fax = "";
        if(isset($_GET['BusinessName'])) $BusinessName = $_GET['BusinessName']; else $BusinessName = "";
        if(isset($_GET['Address'])) $Address = $_GET['Address']; else $Address = "";
        if(isset($_GET['city'])) $city = $_GET['city']; else $city = "";
        if(isset($_GET['state'])) $state = $_GET['state']; else $state = "";
        if(isset($_GET['zip'])) $zip = $_GET['zip']; else $zip = "";
        if(isset($_GET['phone'])) $phone = $_GET['phone']; else $phone = "";
        if(isset($_GET['website'])) $website = $_GET['website']; else $website = "";
        if(isset($_GET['transaction'])) $transaction = $_GET['transaction']; else $transaction = "";

        /****************Prefill *****************/
        $signature = (new SignatureField())
            ->setName('Please sign here')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(true)
            ->setHeight(20)
            ->setWidth(100)
            ->setX(325)
            ->setY(435);
        $text_transaction = (new TextField())
            ->setName('text_transaction')
            ->setLabel('text_transaction')
            ->setPrefilledText($transaction)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(23)
            ->setWidth(100)
            ->setX(280)
            ->setY(90);
        $text_return_business = (new TextField())
            ->setName('text_return_business')
            ->setLabel('text_return_business')
            ->setPrefilledText($BusinessName)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(23)
            ->setWidth(170)
            ->setX(15)
            ->setY(128);
        $text_return_address = (new TextField())
            ->setName('text_return_address')
            ->setLabel('text_return_address')
            ->setPrefilledText($Address)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(23)
            ->setWidth(170)
            ->setX(15)
            ->setY(151);
        $text_return_city = (new TextField())
            ->setName('text_return_city')
            ->setLabel('text_return_city')
            ->setPrefilledText($city." ".$state." ".$zip)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(23)
            ->setWidth(170)
            ->setX(15)
            ->setY(175);
        $text_verify_BusinessName = (new TextField())
            ->setName('text_verify_BusinessName')
            ->setLabel('text_verify_BusinessName')
            ->setPrefilledText($BusinessName)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(23)
            ->setWidth(170)
            ->setX(15)
            ->setY(411);
        $text_verify_Address = (new TextField())
            ->setName('text_verify_Address')
            ->setLabel('text_verify_Address')
            ->setPrefilledText($Address)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(23)
            ->setWidth(170)
            ->setX(15)
            ->setY(435);
        $text_verify_city = (new TextField())
            ->setName('text_verify_city')
            ->setLabel('text_verify_city')
            ->setPrefilledText($city." ".$state." ".$zip)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(23)
            ->setWidth(170)
            ->setX(15)
            ->setY(458);
        $text_phone = (new TextField())
            ->setName('text_phone')
            ->setLabel('text_phone')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(23)
            ->setWidth(170)
            ->setX(15)
            ->setY(522);

        $text_print_name = (new TextField())
            ->setName('text_print_name')
            ->setLabel('text_print_name')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(23)
            ->setWidth(130)
            ->setX(306)
            ->setY(469);
        $text_date = (new TextField())
            ->setName('text_date')
            ->setLabel('text_date')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(23)
            ->setWidth(108)
            ->setX(465)
            ->setY(469);
        $text_business = (new TextField())
            ->setName('text_business')
            ->setLabel('text_business')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(15)
            ->setWidth(175)
            ->setX(100)
            ->setY(560);
        $text_website = (new TextField())
            ->setName('text_website')
            ->setLabel('text_website')
            ->setPrefilledText($website)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(15)
            ->setWidth(222)
            ->setX(55)
            ->setY(579);
        
        $text_email = (new TextField())
            ->setName('text_email')
            ->setLabel('text_email')
            ->setPrefilledText($email)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(15)
            ->setWidth(225)
            ->setX(55)
            ->setY(600);
        $text_tollfree = (new TextField())
            ->setName('text_tollfree')
            ->setLabel('text_tollfree')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(15)
            ->setWidth(220)
            ->setX(60)
            ->setY(622);
        $text_spec_1 = (new TextField())
            ->setName('text_spec_1')
            ->setLabel('text_spec_1')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(30)
            ->setWidth(272)
            ->setX(306)
            ->setY(538);
        $text_spec_2 = (new TextField())
            ->setName('text_spec_2')
            ->setLabel('text_spec_2')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(30)
            ->setWidth(272)
            ->setX(306)
            ->setY(561);
        $text_spec_3 = (new TextField())
            ->setName('text_spec_3')
            ->setLabel('text_spec_3')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(30)
            ->setWidth(272)
            ->setX(306)
            ->setY(584); 
        $text_spec_4 = (new TextField())
            ->setName('text_spec_4')
            ->setLabel('text_spec_4')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(30)
            ->setWidth(272)
            ->setX(306)
            ->setY(607);                               
        $document->setFields([
            $signature,
            $text_transaction,
            $text_return_business,
            $text_return_address,
            $text_return_city,
            $text_verify_Address,
            $text_verify_BusinessName,
            $text_verify_city,
            $text_business,
            $text_website,
            $text_email,
            $text_tollfree,
            $text_spec_1,
            $text_spec_2,
            $text_spec_3,
            $text_spec_4,
            $text_print_name,
            $text_date
        ]);

        //update document with prefilled data
        $this->entityManager->update($document);
        $documentId = $document->getId();
        
        $to[] = new Recipient(
            $this->arguments['to'],
            "signer",
            $this->arguments['roleId'] ?? '',
            $this->arguments['order'] ?? 1
        );
        $cc = [];
        $fieldInvite = new Invite($this->arguments['from'], $to, $cc);
        
        $result = $this->entityManager->create($fieldInvite, ['documentId' => $documentId]);
        $this->entityManager->delete($document, ['id' => $documentId]);
        if($result->getStatus() == "success")
            echo "Send is successed";
        else
            echo "Send is denied";
    }
}
