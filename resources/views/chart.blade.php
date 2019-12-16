
 
 
 <div id="app">    
        <div class="col-md-6">
            <div class="card">

                <div class="panel-body">
                  <div>
                    {!! $chart->container()!!}
                 
                  </div>  
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">

                <div class="panel-body">
                  <div>
                    {!! $emidio->container()!!}
                 
                  </div>  
                </div>
            </div>
        </div>

        

    </div>


        <!--Graficos-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/frappe-charts@1.1.0/dist/frappe-charts.min.iife.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.7.0/d3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.6.7/c3.min.js"></script>



<script src="https://unpkg.com/vue"></script>
<script>
    var app = new Vue({
        el: '#app',

    });


</script>
 

{!! $chart->script() !!}
{!! $emidio->script() !!}


<style>
.card-text{
      color: #DDC728;
      font-size: 3rem;
      font-family: "bitter",Georgia,serif;
}


</style>
