<?php
namespace App\Controller\Manager;

use App\Controller\AppController;
use GuzzleHttp\Client;
use Cake\Cache\Cache;
use GuzzleHttp\Exception\ConnectException;
use Goutte\Client as Goutte;
/**
 * Requirements Controller
 *
 * @property \App\Model\Table\RequirementsTable $Requirements
 */
class RequirementsController extends AppController
{

    public function openMedicament()
    {
        if($this->request->is('ajax'))
        {
            if($this->request->is('get'))
            {
                $cis_code = $this->request->query['cis_code'];

                if(Cache::read($cis_code,'medicament')===false)
                {
                    //then in open medicament api
                    $client = new Client(['base_uri'=>'https://open-medicaments.fr/api/v1/medicaments/']);
                    try 
                    {
                           $result = $client->request('GET',$cis_code,['timeout'=>60]);

                            if($result->getStatusCode()=='200')
                            {
                                $headers = $result->getBody();
                                $response= $headers->getContents();

                                 //Instantiate a crawler for getting notice
                                $client_notice = new Client(['timeout'=>60]);
                                $goutte_client = new Goutte();
                                try
                                {
                                    $goutte_client->setClient($client_notice);
                                    $result_notice =$goutte_client->request('GET','http://base-donnees-publique.medicaments.gouv.fr/affichageDoc.php?specid='.$cis_code.'&typedoc=N');
                                    
                                    $notice = $result_notice->filter('#contentDocument')->each(function($node){
                                        return $node->html();
                                    });

                                    $response = json_decode($response);
                                    $response->notice=$notice;
                                    $response = json_encode($response);

                                    if($response==="[]")
                                        $response = 'ko';
                                    else
                                        Cache::write($cis_code,$response,'medicament');

                                } catch (Exception $e) 
                                {
                                    $response = 'down';
                                }

                            }
                            else
                            {
                                $response = 'down';
                            }

                    } catch (ConnectException $e) 
                    {
                        $response = 'down';
                    }

                }
                else
                {
                    $response = Cache::read($cis_code,'medicament');
                }

                echo $response;
                exit();
            }
        }
    }



}
