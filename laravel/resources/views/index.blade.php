@extends('layout.app')
@section('content')

<div class='d-flex justify-content-around flex-wrap align-items-center'>
  <div class='d-flex justify-center mt-2 flex-nowrap align-items-end' style='flex-basis: 30%'>
    <table class='table-sm table-bordered'>
      <form>
      <caption style='caption-side: top'><small></small></caption>
        <tr>
          <td class='text-center bg-dark text-light'>day</td>
        </tr>
        <tr>
          <td class='text-center bg-dark text-light' style='border-top: 2px solid'>week</td>
        </tr>
        <tr>
          <td class='bg-dark text-light' style='border-top: 2px solid' nowrap><input type='radio' id='r20' name='period' value="20">month</td>
        </tr>
        <tr>
          <td class='bg-dark text-light' style='border-top: 2px solid' nowrap><input type='radio' id='r60' name='period' value="60">quarter</td>
        </tr>
        <tr>
          <td class='bg-dark text-light' style='border-top: 2px solid' nowrap><input type='radio' id='r125' name='period' value="125" checked="checked">half-year</td>
        </tr>
        <tr>
          <td class='bg-dark text-light' style='border-top: 2px solid' nowrap><input type='radio' id='r250' name='period' value="250">year</td>
        </tr>
        <tr>
          <td class='bg-dark text-light' style='border-top: 2px solid' nowrap><input type='radio' id='r1000' name='period' value="1000">4 years</td>
        </tr>
        <tr>
          <td class='bg-dark text-light' style='border-top: 2px solid' nowrap><input type='radio' id='r5000' name='period' value="5000">20 years</td>
        </tr>
      </form>
    </table>
    <table class='table-sm'>
      <tr>
        <th class='px-2 text-center bg-dark text-light font-weight-normal' id='vix' v-bind:title="message">VIX</th>
        <th class='px-2 text-center bg-warning text-secondary' id='bse' v-bind:title='message'>BSE</th>
        <th class='px-2 text-center bg-warning text-light font-weight-bold font-italic text-lowercase' id='ibov' v-bind:title='message'>IBOV</th>
        <th class='px-2 text-center bg-info text-dark' id='ixic' v-bind:title="message">IXIC</th>
        <th class='px-2 text-center bg-info text-dark'>S&P500</th>
        <th class='px-2 text-center bg-info text-dark' id='rut' v-bind:title="message">RUT</th>
        <th class='px-2 text-center bg-info text-dark'>DAX</th>
		    <th class='px-2 text-center bg-info text-warning' id='szse' v-bind:title='message'>SZSE </th>
        <th class='px-2 text-center bg-info text-warning' id='sse' v-bind:title='message'>SSE</th>
        <th class='px-2 text-center bg-dark text-light font-weight-bold font-italic'>Wheat</th>
        <th class='px-2 text-center bg-dark text-light font-weight-bold font-italic'>WTI</th>
        <th class='px-2 text-center bg-dark text-light font-weight-bold font-italic'>Copper</th>
        <th class='px-2 text-center bg-dark text-light'>Gold</th>
        <th class='px-2 text-center bg-dark text-light font-weight-normal' id='ust' v-bind:title="message">UST</th>
      </tr>
      @foreach ($chartTickers as $ticker)
      <tr>
          <td class='change-tnx text-right' style='border-right: 2px solid black'>
            {{ $ticker->dif_vix }}
          </td>
          <td class='change text-right' style='border-top: 2px solid black'>
            {{ $ticker->dif_bsesn }}
          </td>
		   <td class='change text-right' style='border-top: 2px solid black'>
            {{ $ticker->dif_bvsp }}
          </td>
		  <td class='change text-right' style='border-top: 2px solid black'>
            {{ $ticker->dif_ixic }}
          </td>
          <td class='change text-right' style='border-top: 2px solid black'>
            {{ $ticker->dif_gspc }}
          </td>
          <td class='change text-right' style='border-top: 2px solid black'>
            {{ $ticker->dif_rut }}
          </td>
          <td class='change text-right' style='border-top: 2px solid black'>
            {{ $ticker->dif_gdaxi }}
          </td>
		  <td class='change text-right' style='border-top: 2px solid black'>
            {{ $ticker->dif_sz }}
          </td>
          <td class='change text-right' style='border-top: 2px solid black'>
            {{ $ticker->dif_ss }}
          </td>
          <td class='change text-right' style='border-top: 2px solid black'>
            {{ $ticker->dif_wheat }}
          </td>
          <td class='change text-right' style='border-top: 2px solid black'>
            {{ $ticker->dif_wti }}
		  </td>
          <td class='change text-right' style='border-top: 2px solid black'>
            {{ $ticker->dif_cop }}
          </td>
          <td class='change text-right' style='border-top: 2px solid black; border-right: 2px solid black'>
            {{ $ticker->dif_gold }}
          </td>
          <td class='change-invert text-right'>
            {{ $ticker->dif_tnx }}
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  
  <div class='flex-wrap'>
    <span class="d-flex justify-content-center text-secondary"><small>(from finance.yahoo.com)</small></span>
    <span class="d-flex justify-content-center mt-2">
      <span class='mx-1 border border-primary rounded p-1'>
        <select id="data1" class='mr-1'>
          <option value="vix">VIX</option>
          <option value="bsesn">S&P BSE SENSEX</option>
          <option value="ixic">NASDAQ Composite</option>
          <option value="bvsp">IBOVESPA</option>
          <option value="rut">Russell 2000</option>
          <option value="gspc">S&P500</option>
          <option value="sz">Shenzhen Component</option>
          <option value="gdaxi">DAX</option>
          <option value="ss">SSE Composite</option>
          <option value="wheat">Wheat</option>
          <option value="wti">WTI</option>
          <option value="cop">Copper</option>
          <option value="gold">Gold</option>
          <option value="wti_gold">Wti/Gold</option>
          <option value="wheat_gold">Wheat/Gold</option>
          <option value="cop_gold">Copper/Gold</option>
          <option selected value="tnx">Treasury Yield 10 Years</option>
        </select>
        <select id="data2" class='mr-1'>
          <option value="vix">VIX</option>
          <option value="bsesn">S&P BSE SENSEX</option>
          <option value="ixic">NASDAQ Composite</option>
          <option value="bvsp">IBOVESPA</option>
          <option value="rut">Russell 2000</option>
          <option value="gspc">S&P500</option>
          <option value="sz">Shenzhen Component</option>
          <option value="gdaxi">DAX</option>
          <option value="ss">SSE Composite</option>
          <option value="wheat">Wheat</option>
          <option value="wti">WTI</option>
          <option value="cop">Copper</option>
          <option value="gold">Gold</option>
          <option value="wti_gold">Wti/Gold</option>
          <option value="wheat_gold">Wheat/Gold</option>
          <option selected value="cop_gold">Copper/Gold</option>
          <option value="tnx">Treasury Yield 10 Years</option>
        </select>
        <input type="submit" value="Show" id='button0'>
      </span>
      <span class='mx-1 border border-primary rounded p-1'>
        <input type="button" id="animation-button" value='Start'>
        <input type="range" id="animation-speed" value='300' min="100" max="1000" class='ml-1'>
      </span>
    </span>
    <canvas id="line-chart0" width="1400" height="600"></canvas>
  </div>
  <div class='flex-wrap mt-2'>
    <span class="d-flex justify-content-center">
      <select id="data-avg" class='mr-1'>
        <option value="vix">VIX</option>
        <option value="bsesn">S&P BSE SENSEX</option>
        <option value="ixic">NASDAQ Composite</option>
        <option value="bvsp">IBOVESPA</option>
        <option value="rut">Russell 2000</option>
        <option value="gspc">S&P500</option>
        <option value="sz">Shenzhen Component</option>
        <option value="gdaxi">DAX</option>
        <option value="ss">SSE Composite</option>
        <option value="wheat">Wheat</option>
        <option value="wti">WTI</option>
        <option value="cop">Copper</option>
        <option selected value="gold">Gold</option>
        <option value="wti_gold">Wti/Gold</option>
        <option value="wheat_gold">Wheat/Gold</option>
        <option value="cop_gold">Copper/Gold</option>
        <option value="tnx">Treasury Yield 10 Years</option>
      </select>      
      <input type="submit" value="Show" id='button-avg'>
    </span>   
    <canvas id="line-chart-avg" width="1400" height="600"></canvas>
  </div>
    <div class='d-flex'>
      <div class='d-flex'>
        <canvas id="line-chart1" width="700" height="450"></canvas>
      </div>
      <div class='d-flex'>
        <canvas id="line-chart2" width="700" height="450"></canvas>
      </div>
    </div>
    <div class='d-flex' style='margin-bottom: 100px'>
      <div class='d-flex'>
        <canvas id="line-chart3" width="700" height="450"></canvas>
      </div>
      <div class='d-flex'>
        <canvas id="line-chart4" width="700" height="450"></canvas>
      </div>
    </div>
    <div class="d-flex justify-content-center fixed-bottom">
      <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style='max-width: 1500px; flex-basis: 1500px;'>
        <div class="toast-body">
          <div class='d-flex justify-content-around'>
            <span class='border border-primary rounded p-1'>Range
              <input type="number" id="period-input" name="periodNum" value="250" min="2" max="5000" step="50" size='4'>
              <label><input type='radio' id='r20' name='period' value="20">month</label>
              <label><input type='radio' id='r60' name='period' value="60">quarter</label>
              <label><input type='radio' id='r125' name='period' value="125" checked="checked">half-year</label>
              <label><input type='radio' id='r250' name='period' value="250">year</label>
              <label><input type='radio' id='r1000' name='period' value="1000">4 years</label>
              <label><input type='radio' id='r5000' name='period' value="5000">20 years</label>
            </span>
            <span class='ml-1 border border-primary rounded p-1' class='mr-2'>Offset 
              <input type="number" id="offset-input" value='0' min="0" max="4500" step="100" size='4'>
              <span> to </span>
              <span id="dateOffsetOutput"></span>
            </span>
            <span class='mx-1 border border-primary rounded p-1'>Level of VIX
              <input type="number" id="level-vix" value='23' min="0" max='100' size='4'>
            </span>
            <div class='border border-primary rounded p-1'>
              <label>Correlation: <input type='radio' id='w5' name='win' value="5">week</label>
              <label><input type='radio' id='w20' name='win' value="20">month</label>
              <label><input type='radio' id='w60' name='win' value="60" checked="checked">quarter</label>
              <label><input type='radio' id='w125' name='win' value="125">half-year</label>
              <label><input type='radio' id='w250' name='win' value="250">year</label>
              <label><input type='radio' id='w500' name='win' value="500">2 years</label>
              <input type="number" id="correlation-input" value='60' min="5" max='5000' class='ml-2' size='4' step="50">
            </div>
          </div>
        </div>
      </div>
     </div>
    <script type="text/javascript">
      let received_data = {!! json_encode($tickers5000) !!};
    </script>
    <script src="{{asset('index.js')}}"></script>
  </div>
</div>
@endsection

