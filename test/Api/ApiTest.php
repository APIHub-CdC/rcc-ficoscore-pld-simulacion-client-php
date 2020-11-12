<?php

namespace RCCFSPLD\Simulacion\MX\Client;

use \GuzzleHttp\Client;

use \RCCFSPLD\Simulacion\MX\Client\Configuration;
use \RCCFSPLD\Simulacion\MX\Client\ApiException;
use \RCCFSPLD\Simulacion\MX\Client\ObjectSerializer;
use \RCCFSPLD\Simulacion\MX\Client\Api\RCCFSPLDApi as Instance;
use \RCCFSPLD\Simulacion\MX\Client\Model\CatalogoEstados;
use \RCCFSPLD\Simulacion\MX\Client\Model\PersonaPeticion;
use \RCCFSPLD\Simulacion\MX\Client\Model\DomicilioPeticion;        

class ApiTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $config = new Configuration();
        $config->setHost('the_url');
        $client = new Client();
        $this->apiInstance = new Instance($client, $config);
        $this->x_api_key = "your_x_api_key";
        $this->x_full_report = 'false';
    }

    public function testGetReporte()
    {
        $estado = new CatalogoEstados();
        $nacionalidad = new CatalogoEstados();
        $request = new PersonaPeticion();
        $domicilio = new DomicilioPeticion();

        $request->setApellidoPaterno("SESENTAYDOS");
        $request->setApellidoMaterno("PRUEBA");
        $request->setApellidoAdicional(null);
        $request->setPrimerNombre("JUAN");
        $request->setSegundoNombre(null);
        $request->setFechaNacimiento("1965-08-09");
        $request->setRfc("SEPJ650809JG1");
        $request->setCurp(null);
        $request->setNacionalidad("MX");
        $request->setResidencia(null);
        $request->setEstadoCivil(null);
        $request->setSexo(null);
        $request->setClaveElectorIfe(null);
        $request->setNumeroDependientes(null);
        $request->setFechaDefuncion(null);

        $domicilio->setDireccion("PASADISO ENCONTRADO 58");
        $domicilio->setColoniaPoblacion("MONTEVIDEO");
        $domicilio->setDelegacionMunicipio("GUSTAVO A MADERO");
        $domicilio->setCiudad("CIUDAD DE MÉXICO");
        $domicilio->setEstado($estado::CDMX);
        $domicilio->setCp("07730");
        $domicilio->setFechaResidencia(null);
        $domicilio->setNumeroTelefono(null);
        $domicilio->setTipoDomicilio(null);
        $domicilio->setTipoAsentamiento(null);
        $request->setDomicilio($domicilio);

        try {
            $result = $this->apiInstance->getReporte($this->x_api_key, $request, $this->x_full_report);
            print_r($result);
            $this->assertTrue($result->getFolioConsulta()!==null);

            return $result->getFolioConsulta();
        } catch (Exception $e) {
            echo 'Exception when calling ApiTest->testGetReporte: ', $e->getMessage(), PHP_EOL;
        }
    } 

   /**
     * @depends testGetReporte
     */    
    public function testGetConsultas($folioConsulta)
    {
        if($this->x_full_report == "false") {
            try {
                $result = $this->apiInstance->getConsultas($folioConsulta, $this->x_api_key);
                print_r($result);
                $this->assertTrue($result->getConsultas()!==null);
            } catch (Exception $e) {
                echo 'Exception when calling ApiTest->testGetConsultas: ', $e->getMessage(), PHP_EOL;
            }
        } else {
            print_r("x_full_report inicializado en true");
        }
    }


    /**
     * @depends testGetReporte
     */
    public function testGetCreditos($folioConsulta)
    {
        if($this->x_full_report == "false") {
            try {
                $result = $this->apiInstance->getCreditos($folioConsulta, $this->x_api_key);
                print_r($result);
                $this->assertTrue($result->getCreditos()!==null);
            } catch (Exception $e) {
                echo 'Exception when calling ApiTest->testGetCreditos: ', $e->getMessage(), PHP_EOL;
            }
        } else {
            print_r("x_full_report inicializado en true");
        }        
    }

    /**
     * @depends testGetReporte
     */
    public function testGetDomicilios($folioConsulta)
    {
        if($this->x_full_report == "false") {
            try {
                $result = $this->apiInstance->getDomicilios($folioConsulta, $this->x_api_key);
                print_r($result);
                $this->assertTrue($result->getDomicilios()!==null);
            } catch (Exception $e) {
                echo 'Exception when calling ApiTest->testGetDomicilios: ', $e->getMessage(), PHP_EOL;
            }
        } else {
            print_r("x_full_report inicializado en true");
        }          
    }

    /**
     * @depends testGetReporte
     */
    public function testGetEmpleos($folioConsulta)
    {
        if($this->x_full_report == "false") {
            try {
                $result = $this->apiInstance->getEmpleos($folioConsulta, $this->x_api_key);
                print_r($result);
                $this->assertTrue($result->getEmpleos()!==null);
            } catch (Exception $e) {
                echo 'Exception when calling ApiTest->testGetEmpleos: ', $e->getMessage(), PHP_EOL;
            }
        } else {
            print_r("x_full_report inicializado en true");
        }          
    }

    /**
     * @depends testGetReporte
     */
    public function testGetScores($folioConsulta)
    {
        if($this->x_full_report == "false") {
            try {
                $result = $this->apiInstance->getScores($folioConsulta, $this->x_api_key);
                print_r($result);
                $this->assertTrue($result->getScores()!==null);
            } catch (Exception $e) {
                echo 'Exception when calling ApiTest->testGetScores: ', $e->getMessage(), PHP_EOL;
            }
        } else {
            print_r("x_full_report inicializado en true");
        }         
    }
 
    /**
     * @depends testGetReporte
     */
    public function testGetMensajes($folioConsulta)
    {
        if($this->x_full_report == "false") {
            try {
                $result = $this->apiInstance->getMensajes($folioConsulta, $this->x_api_key);
                print_r($result);
                $this->assertTrue($result->getMensajes()!==null);
            } catch (Exception $e) {
                echo 'Exception when calling ApiTest->testGetMensajes: ', $e->getMessage(), PHP_EOL;
            }
        } else {
            print_r("x_full_report inicializado en true");
        }         
    }    
}