<?php
declare(strict_types=1);

namespace Mlopez\Trm;

use SoapClient;

class Trm
{
    private const HOST ='https://www.superfinanciera.gov.co';
    private const WSDL = self::HOST.'/SuperfinancieraWebServiceTRM/TCRMServicesWebService/TCRMServicesWebService?wsdl';

    /**
     * @throws \SoapFault
     */
    public function call(string $date): array
    {
        try {
            require_once 'lib/nusoap.php';

            $date = $date ?? date('Y-m-d');

            $client = new soapclient(self::WSDL, [
                'soap_version' => SOAP_1_1,
                'trace' => 1,
                'location' => self::HOST . '/SuperfinancieraWebServiceTRM/TCRMServicesWebService/TCRMServicesWebService',
            ]);

            $response = $client->queryTCRM(['tcrmQueryAssociatedDate' => $date]);
            return get_object_vars($response->return);

        } catch (\SoapFault $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }
}
