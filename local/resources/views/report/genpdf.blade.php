<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/img/ic/favicon@2x.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel=”stylesheet”>
    <title>รายงานเบิกอุปกรณ์</title>
</head>

<style>
    body {
        font-family: 'sarabun', sans-serif;
        font-size: 20px;
    }

    table {
        border-collapse: collapse;
    }
</style>

<body>
    <h2 align="center">รายงานการเบิกอุปกรณ์</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>รหัสการเบิก</th>
                <th>รูป</th>
                <th>ชื่ออุปกรณ์</th>
                <th>จำนวนเบิก</th>
                <th>คนที่เบิก</th>
                <th>วันที่-เวลา</th>
                <th>สถานะ</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($order as $value)
            @php
            $equipment = DB::table('equipment')->where('id', $value->equ_id)->first();
            $user = DB::table('members')->where("id", "=", $value->m_id)->first();
            $file = asset('local/public/image/'.$equipment->path.''.$equipment->picture.'');
            switch (Util::CheckValue($value, 'oder_status')) {
            case 'Y':
            $oder_status = "อนุมัติ";
            break;
            case 'N':
            $oder_status = "ไม่อนุมัติ";
            break;
            case 'W':
            $oder_status = "รออนุมัติ";
            break;
            }
            @endphp
            <tr>
                <td>{{$i}}</td>
                <td><img src="{{ $file }}" width="50px"></td>
                <td>{{$equipment->equ_name}}</td>
                <td>{{$value->oder_total}}</td>
                <td>{{$user->m_name}} ({{$user->m_username}})</td>
                <td>{{date("d/m/Y", strtotime($value->oder_date))}}</td>
                <td>
                    <p class='text-success'>{{$oder_status}}</p>
                </td>
            </tr>
            @php $i++; @endphp
            @endforeach
        </tbody>
    </table>
</body>
</html>
