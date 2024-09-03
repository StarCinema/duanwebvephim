<style>
        .btn-outline-primary {
            background-color: #fff;
            border-color: #007bff;
            color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }

        .seat {
            margin: 2px;
        }
    </style>
<div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Tên phòng: <?= htmlspecialchars($ten_phong) ?></h2>
                <p class="card-text">Sức chứa: <?= htmlspecialchars($tong_so_ghe) ?> ghế</p>
                <p class="card-text">Trạng thái: Hoạt động</p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h3>Sơ đồ ghế</h3>
            </div>
            <div class="card-body">
                <?php 
                // Giả sử $seats là mảng chứa thông tin các ghế
                $current_row = 1;
                $row_seats = [];
                foreach ($seats as $ghe) {
                    if ($ghe['so_hang'] != $current_row) {
                        // Kết thúc hàng trước đó
                        echo '<div class="row text-center">';
                        foreach ($row_seats as $seat) {
                            echo '<div class="col p-1">';
                            echo '<button class="btn ' . htmlspecialchars($seat['class']) . '">' . htmlspecialchars($seat['ten_ghe']) . '</button>';
                            echo '</div>';
                        }
                        echo '</div>';
                        
                        // Bắt đầu hàng mới
                        $current_row = $ghe['so_hang'];
                        $row_seats = [];
                    }

                    // Xác định lớp CSS dựa trên trạng thái ghế
                    $class = 'btn-outline-primary'; // Ghế còn trống
                    if ($ghe['trang_thai'] == 1) {
                        $class = 'btn-danger'; // Ghế đã đặt
                    } else if ($ghe['trang_thai'] == 2) {
                        $class = 'btn-success'; // Ghế được chọn
                    }
                    
                    $row_seats[] = [
                        'ten_ghe' => $ghe['ten_ghe'],
                        'class' => $class
                    ];
                }

                // Hiển thị hàng cuối cùng
                if (!empty($row_seats)) {
                    echo '<div class="row text-center">';
                    foreach ($row_seats as $seat) {
                        echo '<div class="col p-1">';
                        echo '<button class="btn ' . htmlspecialchars($seat['class']) . '">' . htmlspecialchars($seat['ten_ghe']) . '</button>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="card mt-4">
        <div class="card-body">
        <p class="card-text">Số ghế trống: <?php echo $emptySeats ?></p>

        </div>
    </div>
    </div>
