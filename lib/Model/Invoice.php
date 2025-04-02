<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class Invoice extends AbstractModel
{
    public $_id;
    public $date;
    public $currency;
    public $state;
    public $number;
    public $comment;
    public $notes;
    public $company_name;
    public $company_email;
    public $company_address;
    public $company_address_end;
    public $company_zip_code;
    public $company_city;
    public $company_country_code;
    public $company_phone;
    public $company_has_tva_franchise;
    public $company_nic;
    public $company_siren;
    public $company_naf_ape;

    public $client_civility;
    public $client_contact;
    public $client_name;
    public $client_address;
    public $client_address_complement;
    public $client_zip_code;
    public $client_city;
    public $client_country;
    public $client_professional;
    public $client_email;
    public $client_phone;
    public $client_mobile;


    public $delivery_contact;
    public $delivery_name;
    public $client_tva;
    public $delivery_address;
    public $delivery_address_end;
    public $delivery_zip_code;
    public $delivery_city;
    public $delivery_country;
    public $delivery_phone;
    public $delivery_email;

    public $invoice_lines;

    public $shipping_method;
    public $shipping_total_ht;
    public $shipping_tva_rate;

    public $payments;

    public $documentModel;

    public $discount_total_ht;

    public function __construct($data = [])
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number): void
    {
        $this->number = $number;
    }


    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    public function getCompanyName()
    {
        return $this->company_name;
    }

    public function setCompanyName($company_name): void
    {
        $this->company_name = $company_name;
    }

    public function getCompanyEmail()
    {
        return $this->company_email;
    }

    public function setCompanyEmail($company_email): void
    {
        $this->company_email = $company_email;
    }

    public function getCompanyAddress()
    {
        return $this->company_address;
    }

    public function setCompanyAddress($company_address): void
    {
        $this->company_address = $company_address;
    }

    public function getCompanyAddressEnd()
    {
        return $this->company_address_end;
    }

    public function setCompanyAddressEnd($company_address_end): void
    {
        $this->company_address_end = $company_address_end;
    }

    public function getCompanyZipCode()
    {
        return $this->company_zip_code;
    }

    public function setCompanyZipCode($company_zip_code): void
    {
        $this->company_zip_code = $company_zip_code;
    }

    public function getCompanyCity()
    {
        return $this->company_city;
    }

    public function setCompanyCity($company_city): void
    {
        $this->company_city = $company_city;
    }

    public function getCompanyCountryCode()
    {
        return $this->company_country_code;
    }

    public function setCompanyCountryCode($company_country_code): void
    {
        $this->company_country_code = $company_country_code;
    }

    public function getClientCivility()
    {
        return $this->client_civility;
    }

    public function setClientCivility($client_civility): void
    {
        $this->client_civility = $client_civility;
    }

    public function getClientContact()
    {
        return $this->client_contact;
    }

    public function setClientContact($client_contact): void
    {
        $this->client_contact = $client_contact;
    }

    public function getClientAddress()
    {
        return $this->client_address;
    }

    public function setClientAddress($client_address): void
    {
        $this->client_address = $client_address;
    }

    public function getClientAddressComplement()
    {
        return $this->client_address_complement;
    }

    public function setClientAddressComplement($client_address_complement): void
    {
        $this->client_address_complement = $client_address_complement;
    }

    public function getClientZipCode()
    {
        return $this->client_zip_code;
    }

    public function setClientZipCode($client_zip_code): void
    {
        $this->client_zip_code = $client_zip_code;
    }

    public function getClientCity()
    {
        return $this->client_city;
    }

    public function setClientCity($client_city): void
    {
        $this->client_city = $client_city;
    }

    public function getClientCountry()
    {
        return $this->client_country;
    }

    public function setClientCountry($client_country): void
    {
        $this->client_country = $client_country;
    }

    public function getClientProfessional()
    {
        return $this->client_professional;
    }

    public function setClientProfessional($client_professional): void
    {
        $this->client_professional = $client_professional;
    }

    public function getClientName()
    {
        return $this->client_name;
    }

    public function setClientName($client_name): void
    {
        $this->client_name = $client_name;
    }

    public function getDeliveryContact()
    {
        return $this->delivery_contact;
    }

    public function setDeliveryContact($delivery_contact): void
    {
        $this->delivery_contact = $delivery_contact;
    }

    public function getDeliveryName()
    {
        return $this->delivery_name;
    }

    public function setDeliveryName($delivery_name): void
    {
        $this->delivery_name = $delivery_name;
    }

    public function getClientTva()
    {
        return $this->client_tva;
    }

    public function setClientTva($client_tva): void
    {
        $this->client_tva = $client_tva;
    }

    public function getDeliveryAddress()
    {
        return $this->delivery_address;
    }

    public function setDeliveryAddress($delivery_address): void
    {
        $this->delivery_address = $delivery_address;
    }

    public function getDeliveryAddressEnd()
    {
        return $this->delivery_address_end;
    }

    public function setDeliveryAddressEnd($delivery_address_end): void
    {
        $this->delivery_address_end = $delivery_address_end;
    }

    public function getDeliveryZipCode()
    {
        return $this->delivery_zip_code;
    }

    public function setDeliveryZipCode($delivery_zip_code): void
    {
        $this->delivery_zip_code = $delivery_zip_code;
    }

    public function getDeliveryCity()
    {
        return $this->delivery_city;
    }

    public function setDeliveryCity($delivery_city): void
    {
        $this->delivery_city = $delivery_city;
    }

    public function getDeliveryCountry()
    {
        return $this->delivery_country;
    }

    public function setDeliveryCountry($delivery_country): void
    {
        $this->delivery_country = $delivery_country;
    }

    public function getDeliveryPhone()
    {
        return $this->delivery_phone;
    }

    public function setDeliveryPhone($delivery_phone): void
    {
        $this->delivery_phone = $delivery_phone;
    }

    public function getDeliveryEmail()
    {
        return $this->delivery_email;
    }

    public function setDeliveryEmail($delivery_email): void
    {
        $this->delivery_email = $delivery_email;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state): void
    {
        $this->state = $state;
    }

    public function getInvoiceLines()
    {
        return $this->invoice_lines;
    }

    public function setInvoiceLines($invoice_lines): void
    {
        $this->invoice_lines = $invoice_lines;
    }

    public function getShippingTotalHt()
    {
        return $this->shipping_total_ht;
    }

    public function setShippingTotalHt($shipping_total_ht): void
    {
        $this->shipping_total_ht = $shipping_total_ht;
    }

    public function getShippingTvaRate()
    {
        return $this->shipping_tva_rate;
    }

    public function setShippingTvaRate($shipping_tva_rate): void
    {
        $this->shipping_tva_rate = $shipping_tva_rate;
    }

    public function getPayments()
    {
        return $this->payments;
    }

    public function setPayments($payments): void
    {
        $this->payments = $payments;
    }

    public function getDocumentModel()
    {
        return $this->documentModel;
    }

    public function setDocumentModel($documentModel): void
    {
        $this->documentModel = $documentModel;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function setNotes($notes): void
    {
        $this->notes = $notes;
    }

    public function getCompanyPhone()
    {
        return $this->company_phone;
    }

    public function setCompanyPhone($company_phone): void
    {
        $this->company_phone = $company_phone;
    }

    public function getCompanyHasTvaFranchise()
    {
        return $this->company_has_tva_franchise;
    }

    public function setCompanyHasTvaFranchise($company_has_tva_franchise): void
    {
        $this->company_has_tva_franchise = $company_has_tva_franchise;
    }

    public function getCompanyNic()
    {
        return $this->company_nic;
    }

    public function setCompanyNic($company_nic): void
    {
        $this->company_nic = $company_nic;
    }

    public function getCompanySiren()
    {
        return $this->company_siren;
    }

    public function setCompanySiren($company_siren): void
    {
        $this->company_siren = $company_siren;
    }

    public function getCompanyNafApe()
    {
        return $this->company_naf_ape;
    }

    public function setCompanyNafApe($company_naf_ape): void
    {
        $this->company_naf_ape = $company_naf_ape;
    }

    public function getShippingMethod()
    {
        return $this->shipping_method;
    }

    public function setShippingMethod($shipping_method): void
    {
        $this->shipping_method = $shipping_method;
    }

    public function setId($id): void
    {
        $this->_id = $id;
    }

    public function getDiscountTotalHt()
    {
        return $this->discount_total_ht;
    }

    public function setDiscountTotalHt($discount_total_ht): void
    {
        $this->discount_total_ht = $discount_total_ht;
    }
}