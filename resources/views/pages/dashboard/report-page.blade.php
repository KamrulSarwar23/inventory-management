@extends('layout.sidenav-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 m-auto mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4>Sales Report</h4>
                        <label class="form-label mt-2">Date From</label>
                        <input id="FormDate" type="date" class="form-control"/>
                        <label class="form-label mt-2">Date To</label>
                        <input id="ToDate" type="date" class="form-control"/>
                        <button onclick="SalesReport()" class="btn mt-3 bg-info text-light text-bold">Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>

    function SalesReport() {
        let FormDate = document.getElementById('FormDate').value;
        let ToDate = document.getElementById('ToDate').value;
        if(FormDate.length === 0 || ToDate.length === 0){
            errorToast("Date Range Required !")
        }else{
            window.open('/sales-report/'+FormDate+'/'+ToDate);
        }
    }

</script>
