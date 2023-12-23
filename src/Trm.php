<?php
declare(strict_types=1);

namespace Mlopez\Trm;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Trm
{
    private const HOST ='https://www.superfinanciera.gov.co';
    private const WSDL = self::HOST.'/SuperfinancieraWebServiceTRM/TCRMServicesWebService/TCRMServicesWebService?wsdl';

    public function call($date)
    {
        $client = new Client();

        $headers = $this->header();

        $body = $this->body($date);

        $request = new Request('POST', self::WSDL, $headers, $body);
        $res = $client->sendAsync($request)->wait();

        $xml = $res->getBody()->getContents();

        print_r($xml);
    }

    private function header(): array
    {
        return [
            'Content-Type' => 'text/xml'
        ];
    }
    private function body($date): string
    {
        return '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
                xmlns:act="http://action.trm.services.generic.action.superfinanciera.nexura.sc.com.co/">
                <soapenv:Header/>
                <soapenv:Body>
                <act:queryTCRM>
                <tcrmQueryAssociatedDate>'. $date .'</tcrmQueryAssociatedDate>
                </act:queryTCRM>
                </soapenv:Body>
                </soapenv:Envelope>';
    }
}
