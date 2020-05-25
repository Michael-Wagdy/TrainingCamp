<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet">

  </head>

  <body>
<div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h2 class="display-3">Offer Details</h2>
    
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Departial Time</th>
                    <th>Arrival Time</th>
                    <th>Ticket Number</th>
                    <th>Transportation</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($offer->details as $detail)
                  @endforeach
                  <tr>
                    <td>{{ $detail->from }}</td>
                    <td>{{ $detail->to }}</td>
                    <td>{{ date('l , F d , Y h:i A', strtotime($detail->departial_time)) }}</td>
                    <td>{{ date('l , F d , Y h:i A', strtotime($detail->arrival_time)) }}</td>
                    <td>{{ $detail->ticket_number }}</td>
                    <td>{{ $detail->transportation }}</td>
                  </tr>
                </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    </div>        
    </body>