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
        $file_path = "..\ORDER FORM BLANK.pdf";
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
        if(isset($_GET['delete'])) $delete_en = $_GET['delete']; else $delete_en = false;

        $cur_date = getdate();
        $date_string = $cur_date['mon']."/".$cur_date['mday']."/".$cur_date['year'];
        /****************Prefill *****************/
        $signature = (new SignatureField())
            ->setName('Please sign here')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(true)
            ->setHeight(20)
            ->setWidth(200)
            ->setX(325)
            ->setY(435);
        $text_transaction = (new TextField())
            ->setType("text")
            ->setName('text_transaction')
            ->setLabel('Cannot edit')
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
            ->setLabel('Business')
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
            ->setLabel('address')
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
            ->setLabel('city')
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
            ->setLabel('business')
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
            ->setLabel('address')
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
            ->setLabel('city')
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
            ->setLabel('phone')
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
            ->setLabel('Full Name')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(true)
            ->setHeight(23)
            ->setWidth(130)
            ->setX(306)
            ->setY(469);
        $text_date = (new TextField())
            ->setType('text')
            ->setName('text_date')
            ->setLabel('date')
            ->setPrefilledText($date_string)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(23)
            ->setWidth(108)
            ->setX(465)
            ->setY(471);
        $text_business = (new TextField())
            ->setName('text_business')
            ->setLabel('Type Business Category')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(true)
            ->setHeight(11)
            ->setWidth(175)
            ->setX(100)
            ->setY(566);
        $text_website = (new TextField())
            ->setName('text_website')
            ->setLabel('website')
            ->setPrefilledText($website)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(11)
            ->setWidth(222)
            ->setX(55)
            ->setY(585);
        
        $text_email = (new TextField())
            ->setName('text_email')
            ->setLabel('email')
            ->setPrefilledText($email)
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(11)
            ->setWidth(225)
            ->setX(55)
            ->setY(606);
        $text_tollfree = (new TextField())
            ->setName('text_tollfree')
            ->setLabel('Toll-free Number')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(11)
            ->setWidth(220)
            ->setX(60)
            ->setY(626);
        $text_spec_1 = (new TextField())
            ->setName('text_spec_1')
            ->setLabel(' ')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(25)
            ->setWidth(272)
            ->setX(306)
            ->setY(538);
        $text_spec_2 = (new TextField())
            ->setName('text_spec_2')
            ->setLabel(' ')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(25)
            ->setWidth(272)
            ->setX(306)
            ->setY(561);
        $text_spec_3 = (new TextField())
            ->setName('text_spec_3')
            ->setLabel(' ')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(25)
            ->setWidth(272)
            ->setX(306)
            ->setY(584); 
        $text_spec_4 = (new TextField())
            ->setName('text_spec_4')
            ->setLabel(' ')
            ->setPrefilledText('')
            ->setPageNumber(0)
            ->setRole('signer')
            ->setRequired(false)
            ->setHeight(25)
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
            $email,
            "signer",
            $this->arguments['roleId'] ?? '',
            $this->arguments['order'] ?? 1
        );
        $cc = [];
        $fieldInvite = new Invite("info@yplmedia.com", $to, $cc);
        
        $result = $this->entityManager->create($fieldInvite, ['documentId' => $documentId]);
        if($delete_en)
            $this->entityManager->delete($document, ['id' => $documentId]);
        if($result->getStatus() == "success")
            echo "The Revision Form has been Sent";
        else
            echo "The Revision Form has been not Sent";
    }
}
