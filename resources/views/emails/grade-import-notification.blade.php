<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo Điểm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .footer {
            font-size: 0.9em;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Thông Báo Điểm</h1>
    <p>Xin chào <strong>{{ $student_name }}</strong>,</p>

    <div class="details">
        <p>Dưới đây là điểm của bạn:</p>
        <p><strong>Mã sinh viên:</strong> {{ $student_code }}</p>
        <p><strong>Họ và tên:</strong> {{ $student_name }}</p>
        <p><strong>Điểm chuyên cần:</strong> {{ $attendance_score }}</p>
        <p><strong>Điểm giữa kỳ:</strong> {{ $midterm_score }}</p>
        <p><strong>Điểm cuối kỳ:</strong> {{ $final_score }}</p>
        <p><strong>Điểm trung bình:</strong> {{ $average_of_subject }}</p>
    </div>

    <div class="footer">
        Cảm ơn bạn đã học tập chăm chỉ.<br>
        Chúc bạn thành công trong học tập!
    </div>
</div>
</body>
</html>

