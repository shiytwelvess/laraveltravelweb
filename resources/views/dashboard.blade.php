@extends('share.master_page')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="dateRangePicker"><h6>Chọn khoảng ngày:</h6></label>
            <input class="form-control" type="tex>t" id="dateRangePicker" name="dateRangePicker">
            <button class="btn btn-primary" onclick="showChart()">Xem biểu đồ</button>
        </div>
        <div>
            <label for="chartType"><h6>Loại biểu đồ</h6></label>
            <select class="form-control" id="chartType" name="chartType">
                <option value="bar">Cột</option>
                <option value="line">Đường</option>
            </select>
        </div>
    </div>
</div>
{{-- <div class="form-group">
    <label for="dateRangePicker">Chọn khoảng ngày:</label>
    <input class="form-control" type="text" id="dateRangePicker" name="dateRangePicker">
    <button class="btn btn-primary" onclick="showChart()">Xem biểu đồ</button>
</div>
<div>
    <label for="chartType">Loại biểu đồ:</label>
    <select id="chartType" name="chartType">
        <option value="bar">Cột</option>
        <option value="line">Đường</option>
    </select>
</div> --}}
<div>
    <canvas id="monthlyRevenueChart"></canvas>
</div>
<div>
    <p id="totalRevenue"><h5><strong> Tổng doanh thu:</strong></h5></p>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<script>

    var invoices = {!! json_encode($invoices) !!};


    function showChart() {
        var dateRange = $('#dateRangePicker').val();
        var startDate = moment(dateRange.split(' - ')[0], 'DD/MM/YYYY').toDate();
        var endDate = moment(dateRange.split(' - ')[1], 'DD/MM/YYYY').toDate();
        var chartType = $('#chartType').val();

        var filteredInvoices = invoices.filter(function(invoice) {
            var invoiceDate = moment(invoice.created_at).startOf('day').toDate();
            return moment(invoiceDate).isBetween(startDate, endDate, 'day', '[]') && invoice.trangThai == 1;
        });


        var revenueByDay = {};


        var totalRevenue = 0;
        filteredInvoices.forEach(function(invoice) {
            var date = new Date(invoice.created_at);
            var day = date.getDate();

            if (revenueByDay[day]) {
                revenueByDay[day] += parseFloat(invoice.tongTien);
            } else {
                revenueByDay[day] = parseFloat(invoice.tongTien);
            }

            totalRevenue += parseFloat(invoice.tongTien);
        });


        var days = Object.keys(revenueByDay);
        var revenue = Object.values(revenueByDay);


        var ctx = document.getElementById('monthlyRevenueChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: chartType,
            data: {
                labels: days,
                datasets: [{
                    label: 'Doanh thu',
                    data: revenue,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 500000,
                            max: 20000000,
                            callback: function(value, index, values) {
                                if (value === 0) {
                                    return value;
                                }
                                if (value >= 1000000) {
                                    return (value / 1000000) + 'M';
                                }
                                if (value >= 1000) {
                                    return (value / 1000) + 'K';
                                }
                                return value;
                            }
                        }
                    }
                }
            }
        });


        $('#totalRevenue').text('Tổng doanh thu: ' + totalRevenue.toFixed(2) + ' đ');
    }

    $('#dateRangePicker').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY',
            separator: ' - ',
            applyLabel: 'Áp dụng',
            cancelLabel: 'Hủy',
            fromLabel: 'Từ',
            toLabel: 'Đến',
            customRangeLabel: 'Tùy chọn',
            weekLabel: 'W',
            daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
            monthNames: [
                'Tháng 1',
                'Tháng 2',
                'Tháng 3',
                'Tháng 4',
                'Tháng 5',
                'Tháng 6',
                'Tháng 7',
                'Tháng 8',
                'Tháng 9',
                'Tháng 10',
                'Tháng 11',
                'Tháng 12'
            ],
            firstDay: 1
        },
        opens: 'left',
        autoUpdateInput: false
    });


    $('#dateRangePicker').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });
</script>
@endsection
