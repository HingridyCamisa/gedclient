@extends('adminlte::page')

@section('title', 'PDF')

@section('content_header')

   <!-- <h1><a class="btn btn-primary"  href="{{ url('admin/consultor/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
    -->
@stop

@section('content')

 <a class="btn btn-success"  href="{{ url('admin/consultor/pdf') }}"><i class="fa fa-fw fa-download"></i> </a>
 <td valign="top"><img src="{{ ('/img/imagem2.png')}}" alt="" width="150"/></td>
  <table width="100%">
    <tr>
        <td valign="top"><img src="{{asset('images/meteor-logo.png')}}" alt="" width="150"/></td>
        <td align="right">
            <h3> Almond Brokers - Corretores e Consultores de Seguro</h3>
            <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>From:</strong> Linblum - Barrio teatral</td>
        <td><strong>To:</strong> Linblum - Barrio Comercial</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Playstation IV - Black</td>
        <td align="right">1</td>
        <td align="right">1400.00</td>
        <td align="right">1400.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Metal Gear Solid - Phantom</td>
          <td align="right">1</td>
          <td align="right">105.00</td>
          <td align="right">105.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Final Fantasy XV - Game</td>
          <td align="right">1</td>
          <td align="right">130.00</td>
          <td align="right">130.00</td>
</tr>
 </tbody> 

 </table>

@stop