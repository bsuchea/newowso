<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>កំណត់បង្ហាញរឿង</title>
    <style>
        body{
            font-family: "Khmer", "Khmer OS Battambang", "Khmer OS Siemreap";
            font-size: 17px
        }

        #p1{
            width: 800px;
            height: 1100px;
            background: url("/img/d.png");
            background-repeat: no-repeat;
            background-size: 800px 1100px;
            margin-top: 25px;
        }
        .font-head{
            font-family: "Khmer OS Muol Light", "Khmer OS Muol";
        }
        span{
            position: absolute;
        }
.namekh {
    top: 255px;
    left: 189px;
}
.bus_type {
    top: 227px;
    left: 355px;
}
.bus_type2 {
    top: 315px;
    left: 450px;
}

.ser_home {
    top: 379px;
    left: 611px;
}
.ser_street {
    top: 379px;
    left: 702px;
}
.ser_group {
    top: 408px;
    left: 338px;
}
.ser_village {
    top: 408px;
    left: 425px;
}
.ser_commune {
    top: 408px;
    left: 610px;
}
.namekh2 {
    top: 348px;
    left: 445px;
}
.brand {
    top: 1480px;
    left: 370px;
}
.t7, .t8 , .t9, .t10 {
    font-family: "Khmer", "Khmer OS Battambang", "Khmer OS Siemreap";
    position: absolute;
    font-size: 15px;
    border: none;
    background: none;
    text-align: center;
    width: 430px;
    height: 25px;
    left: 345px;
}
.t8{
    top: 861px;
}
.t9 {
    top: 889px;
}
.t7 {
    top: 913px;
    font-family: "Khmer OS Muol Light", "Khmer OS Muol";
}
.t10 {
    top: 1020px;
    width: 230px;
    height: 25px;
    left: 500px;
    font-weight: bold;
}

@media print {

  @page {
      size: A4 portrait;
  }

}

    </style>
</head>
<body>
    <div id="p1">

        <span class="bus_type"> វិស័យ{{ $sec->namekh }} </span>
        <span class="namekh">{{ dateKh($tran->date_in) }} របស់លោក/លោកស្រី {{ $cus->namekh }} </span>
        <span class="bus_type2">{{ $ser->business_type }} </span>
        <span class="namekh2"> {{ $cus->namekh }} </span>
        <span class="ser_home">{{ $ser->home }}</span>
        <span class="ser_street">{{ $ser->street }}</span>
        <span class="ser_group">{{ $ser->group }}</span>
        <span class="ser_village">{{ $vil2->namekh }} </span>
        <span class="ser_commune">{{ $com2->namekh }} </span>
        <input class="t8" id="t8" value="{{ $sec->lunar_date }}" >
        <input type="text" value="ក្រុងបាត់ដំបង {{ $sec->date }}" class="t9">
        <input type="text" value="មន្ដ្រីទទួលបន្ទុក" class="t7">

        <input type="text" value="{{ $sec->in_charge_namekh }}" class="t10">

    </div>

    <script src="/js/taskpane.js"></script>

    <script type="application/javascript">
        // var today = document.getElementById('t8').value;
        // var selectedDate = new Date(today.split("/")[2],(parseInt(today.split("/")[1])-1), today.split("/")[0] );
        // var solarText = new LunarText().getKhmerLunarString(selectedDate);
        //
        // document.getElementById('t8').value = solarText;

        window.onload = function() { window.print(); };
        window.onafterprint = function () { window.close(); }
    </script>
</body>
</html>
