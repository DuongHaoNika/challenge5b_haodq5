<x-layout>
    <header class="header">
        <h1>Challenges</h1>
    </header>

    <section class="assignments-table">
        <table class="blue-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($challenges as $challenge)
                    <tr>
                        <td>{{ $challenge->id }}</td>
                        <td>
                            @if($challenge->status === 'AC')
                                <span class="status ac">AC</span>
                            @elseif($challenge->status === 'WA')
                                <span class="status wa">WA</span>
                            @else
                                <span class="status not-attempted">--</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('submit.challenge', $challenge->id) }}" class="view-btn">Xem</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <style>
        .blue-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #f0f8ff; /* Màu xanh nhạt cho nền bảng */
        }
        
        .blue-table th {
            background-color: #1e90ff; /* Màu xanh đậm cho header */
            color: white;
            padding: 12px 15px;
            text-align: left;
        }
        
        .blue-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #d3e0f9;
            background-color: #f8fbff; /* Màu xanh rất nhạt cho ô dữ liệu */
        }
        
        .blue-table tr:hover td {
            background-color: #e6f2ff; /* Màu xanh khi hover */
        }
        
        .status {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.85em;
            font-weight: 500;
            min-width: 40px;
            text-align: center;
        }
        
        .status.ac {
            background-color: #4caf50; /* Xanh lá đậm */
            color: white;
        }
        
        .status.wa {
            background-color: #f44336; /* Đỏ */
            color: white;
        }
        
        .status.not-attempted {
            background-color: #9e9e9e; /* Xám */
            color: white;
        }
        
        .view-btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #2196f3; /* Xanh dương */
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .view-btn:hover {
            background-color: #0b7dda; /* Xanh dương đậm hơn */
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</x-layout>