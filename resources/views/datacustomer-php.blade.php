<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1 class="text-center mb-4">MERBIS SMD MEETINGROOM</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Meeting Room</th>
            <th>Customer</th>
            <th>Request</th>
            <th>Date</th>
            <th>Time</th>
            <th>Created</th>
         </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->meetingroom }}</td>
            <td>{{ $row->customer }}</td>
            <td>{{ $row->request }}</td>
            <td>{{ $row->date }}</td>
            <td>{{ $row->time }}</td>
            <td>{{ $row->created_at->format('d M Y') }}</td>
        </tr>
        @endforeach

    </table>

</body>

</html>
