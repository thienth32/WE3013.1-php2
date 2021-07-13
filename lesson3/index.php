<?php
    // k chấp nhận class hoặc tên hàm bị trùng tên
    // => tạo namespace & chia các class về namespace phù hợp
    // namespace không gian tên (phạm vi) tính từ khi bắt đầu 1 từ khóa namespace 
    // cho đến khi gặp namespace tiếp theo
    require_once './controllers/a.php';
    require_once './models/a.php';
    use Controllers\A as ControlerA;
    use Models\A as ModelA;
    $x = new ControlerA();
    $y = new ModelA();
    var_dump($x, $y);



?>