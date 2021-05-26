<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Recibo</title>

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
    
  <style>
    #customers {
      border-collapse: collapse;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      text-align: left;
      background-color: #0066CC;
      color: white;
    }
  </style>

    <style type="text/css">
        table { page-break-inside:auto }
        tr    { page-break-inside:avoid; page-break-after:auto }
        thead { display:table-header-group }
        tfoot { display:table-footer-group }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 60%;">
                <h2>Amana Corretores e Consultores de Seguros, SA</h2>
                <pre>
                Aeroporto de Maputo - Terminal de Carga, Escritório Nr. 55<br>
                Nuit: 400875367<br>
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
    <h5>Recibo #{{str_pad($recibo->nu_recibo, 6, "0", STR_PAD_LEFT)}}</h5>
    <div class="box">
        <table >
            <tbody>
                <tr>
                    <th align="right" style="width: 20%;">ID Cliente:</th>
                    <td align="left" style="width: 40%;">M{{str_pad($recibo->cliente, 6, "0", STR_PAD_LEFT)}}</td>

                    <th align="right" style="width: 30%;">Nome:</th>
                    <td align="left" style="width: 20%;">{{$recibo->cliente_nome}}</td>
                </tr>
                <tr>
                    <th align="right">Telefone:</th>
                    <td align="left">{{$recibo->cliente_telefone_1}}</td>
                    
                    <th align="right">NUIT:</th>
                    <td align="left">{{$recibo->cliente_nuit}}</td>
                </tr>
                <tr>
                    <th align="right">Nr. Apólice:</th>
                    <td align="left">{{$recibo->numero_apolice}}</td>

                    <th align="right">Seguradora:</th>
                    <td align="left">{{$recibo->seguradora}}</td>
                </tr>
                <tr>
                    <th align="right">Tipo de Pagamento:</th>
                    <td align="left">{{$recibo->forma_pagamento}}</td>

                    <th align="right">Nr. Comprovativo:</th>
                    <td align="left">{{$recibo->comprovativo}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>


      <!-- Table row -->

          <table style=" width:100%; " id="customers">
            <thead>
            <tr>
              <th>Descrição</th>
              <th>Tipo de Operação</th>
              <th>Valor</th>
            
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Referente ao pagamento do aviso Nr. #{{str_pad($recibo->id, 6, "0", STR_PAD_LEFT)}}</td>
              <td>{{$recibo->operacao}}</td>
              <td>{{number_format(round($recibo->amount,2), 2, ',', ' ')}}</td>
           
            </tr>
           
            </tbody>
          </table>

      <!-- /.row -->   <br>
      <div class="row">
        <table class="table" width="100%">
            <tr>
                <th>
                Valor por extenso: {{$recibo->extenso}}.
                </th>
            </tr>
         
        </table>
      </div>
    
        <div class="row">

            <div class="box" width="50%">
                <table class="table" width="50%">
                    <tbody>
                        <tr>
                        <td width="100%">
                            <p class="lead"><strong><i class="fa fa-fw fa-cc-visa"></i>Dados Bancários</strong></p>
                        </td>
                        </tr>
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
        </div>    
      <div class="row" >
        <table class="table" width="100%" align="right">
            <tr>
                <td width="40%"></td>
                <th width="40%">
                _______________________________
                </th>
                <td width="40%"></td>
            </tr>
         
        </table>  
        <table class="table" width="100%" align="right">      
            <tr>
                <td width="43%"></td>
                <th width="">
                Assinatura
                </th>
                <td width="35%"></td>
            </tr>
         
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
