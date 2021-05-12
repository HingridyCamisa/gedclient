<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Aviso de Cobrança</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .invoice h4 {
            margin-left: 15px;
        }
        .invoice h5 {
            margin-left: 15px;
        }
        .information {
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        .box {
              width: 100%;
              height: auto;
              margin: 5px;
              border: 1px solid ;
        }


    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 60%;">
                <h2>Amana Correctores e Consultores de Seguros, SA</h2>
                <pre>
                Aeroporto de Maputo - Terminal de Carga, Escritório Nr. 55<br>
                Nuit: 400875367
                Cell: (+258) 87 100 009 8<br>
                Fixo: (+258) 21 087 442<br>
                Email: info@amanaseguros.co.mz<br>
                Data: {{ date('d-M-Y') }}
                Estado: Aviso de Cobrança
                <br>
                Maputo, Moçambique
                <br />
                </pre>


            </td>
            <td align="center">
                
            </td>
            <td align="right" style="width: 40%;">
                <img src="{{asset('/img/amana2.png')}}"   alt="logo" width="200" height="100">
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h5>Aviso de Cobrança #{{str_pad($avisosDB[0]->id, 6, "0", STR_PAD_LEFT)}}</h5>
    <div class="box">
        <table width="100%">
            <tbody>
                <tr>
                    <th align="right" style="width: 20%;">Segurado/ Insured:</th>
                    <td align="left" style="width: 40%;">{{$avisosDB[0]->cliente->cliente_nome}}</td>

                    <th align="" style="width: 30%;">Seguradora:</th>
                    <td align="left" style="width: 20%;">{{$avisosDB[0]->Contrato->seguradora->nome_seguradora}}</td>
                </tr>
                <tr>
                    <th align="right">Endereço:</th>
                    <td align="left">{{$avisosDB[0]->cliente->cliente_endereco}}</td>
                    
                    <th align="">Nr. Apólice:</th>
                    <td align="left">{{$avisosDB[0]->Contrato->numero_apolice}}</td>
                </tr>
                <tr>
                    <th align="right">País:</th>
                    <td align="left">{{$avisosDB[0]->cliente->client_country_city->country_name}}</td>
                  
                    <th align="">Periodicidade de Pagamento:</th>
                    <td align="left">{{$avisosDB[0]->Contrato->periodicidade_pagamento }}</td>
                </tr>
                <tr>
                    <th align="right">Localidade / City:</th>
                    <td align="left">{{$avisosDB[0]->cliente->client_country_city->state_name}}</td>
                  
                    <th align="">Periodo de Seguro de:</th>
                    <td align="left">{{date('d-m-Y',strtotime($avisosDB[0]->Contrato->data_inicio))}}</td>
                </tr>
                <tr>
                    <th align="right">NUIT/ Tax payer Nr:</th>
                    <td align="left">{{$avisosDB[0]->cliente->cliente_nuit}}</td>
                   
                    <th align="">Periodo de Seguro até:</th>
                    <td align="left">{{date('d-m-Y',strtotime($avisosDB[0]->Contrato->data_proximo_pagamento))}}</td>
                </tr>
                <tr>
                    <th align="right">Nr. Cliente:</th>
                    <td align="left">M{{str_pad($avisosDB[0]->cliente->id, 6, "0", STR_PAD_LEFT)}}</td>
                
                    <th align="">Dias Cobertos:</th>
                    <td align="left">{{\Carbon\Carbon::parse($avisosDB[0]->Contrato->data_inicio)->diffInDays(\Carbon\Carbon::parse($avisosDB[0]->Contrato->data_proximo_pagamento))}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>


      <!-- Table row -->
      <div class="box">
          <table   class="" width="100%" align="left" >
                <thead>
                <tr>
                  <th width="5%">Nº</th>
                  <th width="10%">Data Fim de Seguro</th>
                  <th width="30%">Descrição</th>
                  <th width="10%">Pagamento</th>
                  <th width="25%">Seguradora</th>
                  <th width="20%">Valor</th>
                
                </tr>
                </thead>
                <tbody>
                @php($t=0)
                @php($t1=0)
                @php($t2=0)
                @php($t3=0)
                @php($t4=0)
                @foreach($avisosDB as $key => $aviso)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{date('d-m-Y',strtotime($aviso->aviso_data))}}</td>
                  <td>{{$aviso->Contrato->detalhes_item_segurado}}</td>
                  <td>{{$aviso->Contrato->periodicidade_pagamento}}</td>
                  <td>{{$aviso->Contrato->seguradora->nome_seguradora}}</td>
                  <td>{{number_format(round($aviso->aviso_amount,2), 2, ',', ' ')}} MTN</td>
                  @php($t=$aviso->aviso_amount+$t)
                  @php($t1=$aviso->premio_simples+$t1)
                  @php($t2=$aviso->custo_admin+$t2)
                  @php($t3=$aviso->imposto_selo+$t3)
                  @php($t4=$aviso->sobre_taxa+$t4)
                </tr>

                @endforeach
                </tbody>
              <tfoot>
                <tr class="table-danger">
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>Total</th>
                  <th>{{number_format(round($t,2), 2, ',', ' ')}} MTN</th>
                  </tr>
              </tfoot>
          </table>
    </div>
      <!-- /.row -->
      <br>
      <table width="100%" style="margin: 5px">
          <tbody>
              <tr>
                  <td width="50%">
                     
                    <div class="box">
                      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;  margin: 5px">
                        Nos termos dos Artigos 124ᵒ 128ᵒ  do Decreto-
                        Lei Nº 1 de 2010 de 31 de Dezembro o prémio de duração do contrato de seguro é devido por inteiro, sem prejuizo de poder ser fraccionado para efeitos de pagamento
                        primeira fracção deste, é devido na data da celebração do contrato. As fracções seguintes do prémio inicial, o prémio de anuidades subsequentes e as sucessivas fracções
                      </p>
                    </div> 
                  </td>
                  <td width="50%" align="right" >
                        <table class="table" width="100%">
                          <tbody>
                          <tr>
                            <th align="right" style="width: 50%;">Prémio líquido / Net premium:</th>
                            <td align="right" style="width: 50%;">{{number_format(round($t1,2), 2, ',', ' ')}} MTN</td>
                          </tr>
                          <tr>
                            <th align="right"  style="width: 50%;">Encargos / Administration:</th>
                            <td align="right" style="width: 50%;">{{number_format(round($t2,2), 2, ',', ' ')}} MTN</td>
                          </tr>
                          <tr>
                            <th align="right"  style="width: 50%;">Selos / Stamps:</th>
                            <td align="right" style="width: 50%;">{{number_format(round($t3,2), 2, ',', ' ')}} MTN</td>
                          </tr>
                          <tr>
                            <th align="right"  style="width: 50%;">Sobretaxa / Subcharge:</th>
                            <td align="right" style="width: 50%;">{{number_format(round($t4,2), 2, ',', ' ')}} MTN</td>
                          </tr>
                          <tr class="table-danger">
                            <th align="right" style="width: 50%;">Total:</th>
                            <td align="right" style="width: 50%;"><b>{{number_format(round(($t1+$t2+$t3+$t4),2), 2, ',', ' ')}} MTN</b></td>
                          </tr>
                        </tbody>
                      </table> 
                  </td>
              </tr>
          </tbody>
      </table>
      <br>
      <div class="box" width="50%">
      <table class="table" width="50%">
          <tbody>
              <tr>
                  <th>Banco:</th>
                  <td> BIM</td>
              </tr>
              <tr>
                  <th>Titular:</th>
                  <td>Amana Seguros, SA </td>
             </tr>
             <tr>
                  <th>Conta:</th>
                  <td>415522102 (MZN)</td>
             </tr>
             <tr>
                  <th>NIB:</th>
                  <td>00010000041552210257</td>
              </tr>
          </tbody>
      </table>
      </div>



<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} - All rights reserved. 
            </td>
            <td align="right" style="width: 50%;">
                Processado por AMANA Software
            </td>
        </tr>

    </table>
</div>
</body>
</html>
