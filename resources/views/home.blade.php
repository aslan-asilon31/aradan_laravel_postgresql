@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<a href="/home-export-pdf"  type="button" class="btn btn-sm btn-danger" style="" data-toggle="tooltip" title="Export PDF" >
  <i class="fas fa-file-pdf" ></i>
</a>
<a href="/product-excel" type="button" class="btn btn-sm btn-warning"  data-toggle="tooltip" title="Export Excel">
  <i class="fas fa-file-excel" style="color:white;"></i>
</a>
<a href="/product-csv" type="button" class="btn btn-sm btn-info" data-toggle="tooltip" title="Export csv" >
  <i class="fas fa-file-csv"></i>
</a>

        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">CPU Traffic</span>
                  <span class="info-box-number">
                    10
                    <small>%</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">41,410</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
  
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
  
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Sales Today</span>
                  <span class="info-box-number">760</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">New Members</span>
                  <span class="info-box-number">2,000</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
  
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Recapitulation Report Sales</h5>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-smol" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group">
                      <button type="button" class="btn btn-smol dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                        <a href="#" class="dropdown-item">Something else here</a>
                        <a class="dropdown-divider"></a>
                        <a href="#" class="dropdown-item">Separated link</a>
                      </div>
                    </div>
                    <button type="button" class="btn btn-smol" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
  
                      <div class="">
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-chart-pie mr-1"></i>
                              
                              <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                  <li class="nav-item">
                                    <a class="nav-link active" href="#today-chart" data-toggle="tab">Today</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#week-chart" data-toggle="tab">week</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#month-chart" data-toggle="tab">month</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#q1-chart" data-toggle="tab">Q1</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#q2-chart" data-toggle="tab">Q2</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#q3-chart" data-toggle="tab">Q3</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#q4-chart" data-toggle="tab">Q4</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#6-month-chart" data-toggle="tab">6 month</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#year-chart" data-toggle="tab">this year</a>
                                  </li>
                                </ul>
                              </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="today-chart" style="position: relative; height: 300px;">
                                    <canvas id="todayChart"></canvas>
                                 </div>
                                <div class="chart tab-pane" id="week-chart" style="position: relative; height: 300px;">
                                    this week chart
                                </div>
                                <div class="chart tab-pane" id="month-chart" style="position: relative; height: 300px;">
                                    this month chart
                                </div>
                                <div class="chart tab-pane" id="6-month-chart" style="position: relative; height: 300px;">
                                    6 month chart
                                </div>
                                <div class="chart tab-pane" id="1-year-chart" style="position: relative; height: 300px;">
                                    this year chart
                                </div>
                              </div>
                            </div><!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                      </div>
                      <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                      <p class="text-center">
                        <strong>Goal Completion</strong>
                      </p>
  
                      <div class="progress-group">
                        Add Products to Cart
                        <span class="float-right"><b>160</b>/200</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" style="width: 80%"></div>
                        </div>
                      </div>
                      <!-- /.progress-group -->
  
                      <div class="progress-group">
                        Failed Purchase
                        <span class="float-right"><b>310</b>/800</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-danger" style="width: 75%"></div>
                        </div>
                      </div>
  
                      <!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Complete Purchase</span>
                        <span class="float-right"><b>480</b>/800</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-success" style="width: 60%"></div>
                        </div>
                      </div>
  
                      <!-- /.progress-group -->
                      <div class="progress-group">
                        Send Inquiries
                        <span class="float-right"><b>250</b>/500</span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-warning" style="width: 50%"></div>
                        </div>
                      </div>
                      <!-- /.progress-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                        <h5 class="description-header">$35,210.43</h5>
                        <span class="description-text">TOTAL REVENUE</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                        <h5 class="description-header">$10,390.90</h5>
                        <span class="description-text">TOTAL COST</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">$24,813.53</h5>
                        <span class="description-text">TOTAL PROFIT</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block">
                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">1200</h5>
                        <span class="description-text">GOAL COMPLETIONS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->


          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
        
                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Orders</h3>
        
                        <div class="card-tools">
                            <button type="button" class="btn btn-smol" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-smol" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Item</th>
                                        <th>Status</th>
                                        <th>Popularity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>iPhone 6 Plus</td>
                                        <td><span class="badge badge-danger">Delivered</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="badge badge-info">Processing</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>iPhone 6 Plus</td>
                                        <td><span class="badge badge-danger">Delivered</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Added Products</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-smol" data-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-smol" data-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img class="mr-3" src="dist/img/default-50x50.gif" alt="Product Image">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">Samsung TV</h5>
                                    <span class="badge badge-warning">$1800</span>
                                    <p>
                                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                                    </p>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3" src="dist/img/default-50x50.gif" alt="Product Image">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">Bicycle</h5>
                                    <span class="badge badge-info">$700</span>
                                    <p>
                                        26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                    </p>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3" src="dist/img/default-50x50.gif" alt="Product Image">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">Xbox One</h5>
                                    <span class="badge badge-danger">$350</span>
                                    <p>
                                        Xbox One Console Bundle with Halo Master Chief Collection.
                                    </p>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3" src="dist/img/default-50x50.gif" alt="Product Image">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">PlayStation 4</h5>
                                    <span class="badge badge-success">$399</span>
                                    <p>
                                        PlayStation 4 500GB Console (PS4)
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary">View All Products</a>
                    </div>
                </div>
            </div>
            


        </div>
        
  

         

          
@stop

@section('css')
 
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- recapitulation sales chart  --}}
<script>

//   Today chart 
const ctx = document.getElementById('todayChart');
$.ajax({
  url: "{{ url('products') }}",
  type: "GET",
  dataType: "json",
  success: function(response) {
    const data = response.data;
    const groupedData = {}; // Objek untuk menyimpan data yang digabungkan

    // Gabungkan data berdasarkan category_name
    data.forEach(product => {
      const categoryName = product.category_name;
      const stock = product.stock;

      if (groupedData[categoryName]) {
        // Jika label sudah ada, tambahkan stock
        groupedData[categoryName] += stock;
      } else {
        // Jika label belum ada, inisialisasi dengan stock
        groupedData[categoryName] = stock;
      }
    });

    // Ekstraksi label dan data dari groupedData
    const labels = Object.keys(groupedData);
    const stock = Object.values(groupedData);
    
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: '# Jumlah Product dan stock hari ini',
          data: stock, // Data penjualan berdasarkan category (contoh data statis)
          borderWidth: 2,
          borderColor: 'purple'
        }]
      },
      options: {
        scales: {
          y: {
            display: true,
            title: {
              display: true,
              text: 'Stock' // Label untuk sumbu Y
            },
            // ticks: {
            //   callback: function(value, index, values) {
            //     let ampm = value < 12 ? 'AM' : 'PM';
            //     if (value === 0 || value === 12) {
            //       return '12 ' + ampm;
            //     } else {
            //       return (value % 12) + ' ' + ampm;
            //     }
            //   }
            // }
          },
          x: {
            display: true,
            title: {
              display: true,
              text: 'Categories' // Label untuk sumbu X
            }
          }
        },
        tooltips: {
          enabled: true, // Matikan tooltip bawaan
        }
      },
      onClick: function(event, elements) {
        if (elements && elements.length > 0) {
          var dataIndex = elements[0].index;
          console.log('Klik pada indeks data:', dataIndex);
        }
      }
    });
  }
});


  
//   End Today chart 


</script>
@stop
